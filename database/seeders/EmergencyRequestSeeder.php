<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmergencyRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $total_iterations = 1500;
        $count = 0;
        $count_date = -38;

        for ($i=0; $i < $total_iterations; $i++) {
            if ($count == 50) {
                $count_date++;
                $count = 0;
            }

            \App\Models\EmergencyRequest::insert([
            'patient' => $faker->name,
            'blood' => $faker->name,
            'city'=>'Lahore',
            'state'=>'Lahore',
            'hospital'=>'jinnah',
            'contact_person'=>$faker->name,
            'contact_phone'=>$faker->e164PhoneNumber,
            'contact_email'=>$faker->email,
            'date'=>date('Y-m-d', strtotime('+'.$count_date.' day')),
            'city'=>$faker->city,
        ]);
            $count++;
        }
    }
}
