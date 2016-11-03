<?php

namespace MobilityPal\Console\Commands;

use Illuminate\Console\Command;
use MobilityPal\Moves\Services\MovesUserService;
use MobilityPal\Moves\Services\MovesQueryService;

class VerifyTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mobilitypal:verify-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifies all access tokens are valid. Refreshes if needed.';

    /**
     * @var MovesUserService
     */
    private $service;

    /**
     * @var MovesUserService
     */
    private $userService;

    /**
     * @var MovesQueryService
     */
    private $queryService;


    /**
     * Create a new command instance.
     *
     * @param MovesUserService  $userService
     * @param MovesQueryService $queryService
     */
    public function __construct(MovesUserService $userService, MovesQueryService $queryService)
    {
        parent::__construct();
        $this->userService = $userService;
        $this->queryService = $queryService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->userService->verifyAllUserTokens();
        $this->info('Verification complete');

        $this->call('mobilitypal:fetch-storylines');
    }
}
