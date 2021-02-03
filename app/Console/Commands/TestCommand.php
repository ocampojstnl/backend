<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:com {name} {num}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        // $pet = $this->ask('Ano pet mo?');
        // $this->info('Hi '.$this->argument('name') . ', ' . $this->argument('num'). ' Ang pet ko ay '. $pet);
        Company::create([
            'name' => $this->argument('name'),
            'phone' => $this->argument('num'),
        ]);

        $this->info($this->argument('name') . ' created');
    }
}
