<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Major::create([
            'name' => 'TKRO'
         
        ]) ;
        
        Major::create([
            'name' => 'PPLG'
         
        ]) ;

        Major::create([
            'name' => 'TKJT'
         
        ]) ;

        Major::create([
            'name' => 'TFLM'
         
        ]) ;
    }
}
