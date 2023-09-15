<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Application setup started...');
        
        $this->info('Migrating database...');
        Artisan::call('migrate:fresh --seed');
        $this->info('Migrating database completed.');

//        $this->info('Installing npm packages...');
//        exec('npm install --no-audit --no-update-notifier --no-fund --save-dev');
//        $this->info('Installing npm packages completed.');
//
//        $this->info('Building assets...');
//        exec('npm run dev');
//        $this->info('Building assets completed.');
//
//        $this->info('Installing composer packages...');
//        exec('composer install --no-interaction --no-dev --prefer-dist');
//        $this->info('Installing composer packages completed.');

        $this->info('Clearing Optimizations...');
        Artisan::call('optimize:clear');
        $this->info('Clearing Optimizations completed.');

//        $this->info('Optimizing...');
//        Artisan::call('optimize');
//        $this->info('Optimizing completed.');

        $this->info('Application setup successfully.');
    }

}
