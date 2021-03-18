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
            'email' => 'sagarvanesa@gmail.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);
        DB::table('users')->insert([
            'firstName' => 'shyam',
            'lastName' => 'patel',
            'email' => 'shyam@mail.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);
        //admin
        DB::table('admins')->insert([
            'firstName' => 'admin',
            'lastName' => 'admin',
            'email' => 'admin@mail.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);
        //departmental admin
        DB::table('depts')->insert([
            'firstName' => 'dept',
            'lastName' => 'admin',
            'email' => 'dept@mail.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);
        //COmplaint for sagarpatel@mail.com
        for ($i = 0; $i < 10; $i++) {
            DB::table('usercomplaints')->insert([
                'Complaint_ID' => rand(100100, 199999),
                'foreignEmail' => 'sagarvanesa@gmail.com',
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
                'ComplaintDate' => '2021-03-10',
                'updated_at' => Null,
                'remarks' => Null,
                'created_at' => '2021-03-10 23:38:21'
            ]);
        }
        //Complaint for shyam@mail.com
        for ($i = 0; $i < 10; $i++) {
            DB::table('usercomplaints')->insert([
                'Complaint_ID' => rand(100100, 199999),
                'foreignEmail' => 'shyam@mail.com',
                'user_id' => 2,
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
                'ComplaintDate' => '2021-03-10',
                'updated_at' => Null,
                'remarks' => Null,
                'created_at' => '2021-03-10 23:38:21'
            ]);
        }
    }
}
