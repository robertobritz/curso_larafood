<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' =>  '1234567890' ,
            'name' => 'To no vale' ,
            'url' => 'tonovale',
            'email' =>  'roberto.britz@hotmail.com' ,
            
        ]);
    }
}
 