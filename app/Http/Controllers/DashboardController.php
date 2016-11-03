<?php

namespace MobilityPal\Http\Controllers;

use Illuminate\Http\Request;

use MobilityPal\Http\Requests;
use MobilityPal\Moves\Services\MovesQueryService;
use MobilityPal\Surveys\SurveyService;

class DashboardController extends Controller
{

    /**
     * @var SurveyService
     */
    private $surveyService;

    /**
     * @var MovesQueryService
     */
    private $movesQueryService;


    public function __construct(SurveyService $surveyService, MovesQueryService $movesQueryService)
    {
        $this->middleware('auth');
        $this->surveyService = $surveyService;
        $this->movesQueryService = $movesQueryService;
    }

    public function index()
    {
        $activeSurveysCount = count($this->surveyService->getActiveSurveys());
        $movesRegistrations = count($this->movesQueryService->getAllUsersFromActiveSurveys());
        $movesRegistrationsToday = $this->movesQueryService->getNumberOfMovesRegistrationsToday();

        return view('dashboard', compact('activeSurveysCount', 'movesRegistrations', 'movesRegistrationsToday'));
    }


}
