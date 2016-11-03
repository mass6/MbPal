<?php

namespace MobilityPal\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use MobilityPal\Moves\Services\MovesQueryService;

class FetchMovesStorylines extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mobilitypal:fetch-storylines
                            {date? : Date to be fetched YYYY-MM-DD}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches and saves Moves storylines for each active user';

    /**
     * @var MovesQueryService
     */
    private $service;


    /**
     * Create a new command instance.
     *
     * @param MovesQueryService $service
     */
    public function __construct(MovesQueryService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (! $date = $this->argument('date')) {
            $date = Carbon::yesterday()->toDateString();
        }

        if ($this->service->saveAllUsersStorylines($date)) {
            $this->info('Storylines saved.');
        } else {
            $this->info('Error fetching storylines.');
        }

    }
}
