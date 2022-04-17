<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DbSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run database seeder for all modules';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Seeding User Module.');

        Artisan::call('module:seed User');

        $this->info('All modules seeded successfully');
    }
}
