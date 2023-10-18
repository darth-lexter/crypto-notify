<?php

namespace App\Console\Commands;

use App\Services\SignalCheckerService;
use Illuminate\Console\Command;

class CheckSignalsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'signals:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check active signals';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        private readonly SignalCheckerService $signalCheckerService
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->signalCheckerService->checkSignals();

        $messages = $this->signalCheckerService->getMessages();

        foreach ($messages as $message) {
            $this->info($message);
        }

        $errors = $this->signalCheckerService->getErrors();

        foreach ($errors as $error) {
            $this->error($error);
        }

        return 0;
    }
}
