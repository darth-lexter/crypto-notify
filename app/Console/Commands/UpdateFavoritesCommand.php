<?php

namespace App\Console\Commands;

use App\Services\FavoritesService;
use Illuminate\Console\Command;

class UpdateFavoritesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'favorites:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update favorite symbol prices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private readonly FavoritesService $favoritesService)
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
        $this->favoritesService->update();

        $this->info("Prices successfully updated!");

        return 0;
    }
}
