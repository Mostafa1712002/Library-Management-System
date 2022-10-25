<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AgainCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'again';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh --seed');
        $this->info('Database refreshed');
        Artisan::call('storage:link');
        $this->info('Storage linked');
        Artisan::call('optimize:clear');
        Artisan::call('httpcache:clear');
        $this->info('Optimized');


        return 0;
    }
}
