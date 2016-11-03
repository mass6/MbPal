<?php

namespace MobilityPal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use MobilityPal\Http\Requests;
use MobilityPal\Moves\Auth\AuthorizationResponse;
use MobilityPal\Moves\Auth\SurveySubmission;
use MobilityPal\Moves\Services\MovesUserService;
use MobilityPal\Surveys\SurveyService;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class MovesAuthController
 * @package MobilityPal\Http\Controllers
 */
class MovesAuthController extends Controller
{

    /**
     * @var MovesUserService
     */
    protected $moves;

    /**
     * @var SurveyService
     */
    private $surveyService;


    /**
     * MovesAuthController constructor.
     *
     * @param MovesUserService $moves
     * @param SurveyService    $surveyService
     */
    public function __construct(MovesUserService $moves, SurveyService $surveyService)
    {
        $this->moves = $moves;
        $this->surveyService = $surveyService;
    }


    /**
     * @param Request $request
     * @param Session $session
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(Request $request, Session $session)
    {
        if ($request->has('sid') && $request->has('savedid')) {
            $session->set('sid', $request->sid);
            $session->set('savedid', $request->savedid);
        }
        $authUrl = $this->moves->getAuthorizationUrl($session->get('sid'), $session->get('savedid'));

        return view('moves/register', ['authUrl' => $authUrl]);
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function registrationConfirmed(Request $request)
    {
        $surveySubmission = new SurveySubmission(
            $this->getSurveyIdFromQueryString($request),
            $this->getSubmissionIdFromQueryString($request)
        );

        if (! $request->code || ! $user = $this->moves->logSuccessfulRegistration(new AuthorizationResponse($request->code, $surveySubmission)) ) {
            flash()->error('We could not complete your registration at this time. Please try again.');

            return redirect()->route('moves.register');
        }

        // Remove any old survey data from session
        $request->session()->forget('sid');
        $request->session()->forget('savedid');

        return view('moves/confirmation');
    }


    /**
     * Show user page to enter email to receive invitation
     *
     * @param Request $request
     * @param Session $session
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function requestInvitation(Request $request, Session $session)
    {
        if ($request->has('sid') && $request->has('savedid')) {
            $session->set('sid', $request->sid);
            $session->set('savedid', $request->savedid);
        }

        return view('moves.request-invitation');
    }
    /**
     * Send invitation to email provided
     *
     * @param Request $request
     * @param Session $session
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendInvitation(Request $request, Session $session)
    {
        $data = [
            'email' => $request->get('email'),
            'sid' => $session->get('sid'),
            'savedid' => $session->get('savedid'),
            'surveyName' => current($this->surveyService->getLanguageProperties($session->get('sid'), ['surveyls_title']))
        ];

        $this->validate($request, [
            'email' => 'required|email'
        ]);

        Mail::send('moves.emails.invitation', ['data' => $data], function ($m) use ($data) {
            $m->from('mobilitypal@schulzeplusgrassov.com', 'MobilityPal');
            $m->to($data['email'])->subject('Your MobilityPal Invitation');
        });

        Flash::success('Your invitation email has been sent.');
        return redirect()->back();
    }


    /**
     * @param Request $request
     *
     * @return string
     */
    private function getSurveyIdFromQueryString(Request $request)
    {
        return substr($request->state, 4, strpos($request->state, '_') - 4);
    }


    /**
     * @param Request $request
     *
     * @return string
     */
    private function getSubmissionIdFromQueryString(Request $request)
    {
        return substr($request->state, strpos($request->state, '_sub') + 5);
    }

}
