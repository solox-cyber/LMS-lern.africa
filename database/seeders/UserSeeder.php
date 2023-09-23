<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create 10 user records
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                // Add other fields as needed
            ]);

            $serialNumber = 'SN-' . $user->id;
            $user->update(['serial_number' => $serialNumber]);
        }
    }
}


