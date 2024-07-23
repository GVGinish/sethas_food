<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Hash; // Import the Hash facade if you're using bcrypt
use Illuminate\Support\Str; // Import the Str class if you're using it

class AdminModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_models')->insert([
            [
                'username'=>'admin',
                'email' => 'admin1@example.com',
                'phone' => '1234567890',
                'password' => Hash::make('12345'), // Use Hash::make() to hash passwords
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Add more dummy data as needed
        ]);
    }
}






