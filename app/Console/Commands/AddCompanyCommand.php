<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new Company';

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
        //
        
        // $this->warn('string here');
        // $this->error('string here');
        
            // $company = Company::create([
            //     'name' => $this->argument('name'),
            //     'phone' => $this->argument('phone'),
            // ]);
            $name = $this->ask('What is the company name?:');
            $phone = $this->ask('What is the company\'s Phone number?:');

            if ($this->confirm('Are you ready to add?')) {
                    $company = Company::create([
                    'name' => $name,
                    'phone' => $phone,
                ]);
                $this->info('added');
            } else {
                $this->warn('tae tae rumba');
            }
            
            // $this->info($name);
            // $this->info($phone);
            // $this->info('Added '.$company->name);
        
    }
}
