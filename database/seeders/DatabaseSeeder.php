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

        /*DB::table('users')->insert([
            'firstName' => 'sagar',
            'lastName' => 'patel',
            'email' => 'sagarpatel@mail.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);*/

        DB::table('usercomplaints')->insert([
            'Complaint_ID' => 100100,
            'foreignEmail' => 'sagarpatel@mail.com',
            'Status' => 'Registered',
            'ComplaintType' => Str::random(4),
            'ComplaintCategory' => Str::random(8),
            'SubCategory' => Str::random(9),
            'AuthDept' => Str::random(4),
            'ComplaintNature' => Str::random(4),
            'District' => Str::random(7),
            'City' => Str::random(10),
            'Pincode' => 344310,
            'ReferenceNo' => Str::random(5),
            'ComplaintDetails' => Str::random(20),
            'ComplaintDate' => '2021-01-18 23:38:21',
        ]);
    }
}
