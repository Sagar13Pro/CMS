<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'firstName' => 'sagar',
            'lastName' => 'patel',
            'email' => 'sagarpatel@mail.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);

        DB::table('admins')->insert([
            'firstName' => 'sagar',
            'lastName' => 'patel',
            'email' => 'sagarvanesa@gmail.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);

        for ($i = 0; $i < 20; $i++) {
            DB::table('usercomplaints')->insert([
                'Complaint_ID' => rand(100100, 199999),
                'foreignEmail' => 'sagarpatel@mail.com',
                'user_id' => 1,
                'Status' => 'Registered',
                'ComplaintType' => Str::random(4),
                'ComplaintCategory' => Str::random(8),
                'SubCategory' => Str::random(9),
                'AuthDept' => Str::random(4),
                'ComplaintNature' => Str::random(4),
                'District' => Str::random(7),
                'City' => Str::random(10),
                'Pincode' => rand(11111, 999999),
                'ReferenceNo' => Str::random(5),
                'ComplaintDetails' => Str::random(20),
                'ComplaintDate' => '2021-01-18 23:38:21',
                'updated_at' => '2021-01-18 23:38:21',
                'remarks' => 'Not Assigned',
                'created_at' => '2021-01-18 23:38:21'
            ]);
        }
    }
}
