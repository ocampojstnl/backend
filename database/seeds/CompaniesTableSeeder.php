<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Company::class, 3)->create([
            'name' => 'Company',
            'phone' => '123-123-1233'
        ]);
    }
}
