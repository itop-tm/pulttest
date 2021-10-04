<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class AppRunCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'running app';

    /**
     * Create a new command instance.
     */
    public function __construct()
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
        $this->call('cache:clear');
        $this->call('config:cache');

        $this->call('migrate:refresh');
        $this->call('db:seed');

        $this->info('running test');

        foreach(['Auth', 'Drivers', 'Vehicles', 'Orders'] as $test) {
            $test = new Process([
                './vendor/bin/phpunit',
                "tests/Api/$test/{$test}Test.php"
            ]);
    
            $test->run();
            $this->info($test->getOutput());
        }
    }
}
