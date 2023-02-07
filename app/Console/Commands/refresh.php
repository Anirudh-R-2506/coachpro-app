<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class refresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes the application by clearing cache, config, route and view cache.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->info('Optimizing...');
        $this->call('optimize:clear');
        $this->info('Clearing cache...');
        $this->call('cache:clear');
        $this->info('Clearing config cache...');
        $this->call('config:clear');
        $this->info('Clearing route cache...');
        $this->call('route:clear');
        $this->info('Clearing view cache...');
        $this->call('view:clear');

        return Command::SUCCESS;
    }
}
