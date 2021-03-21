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
        // =====================================START ADMIN==============================
        DB::table('admins')->insert([
            'role' => 'Super',
            'firstName' => 'super',
            'lastName' => 'admin',
            'email' => 'super@admin.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);
        // =====================================END ADMIN============================== // 

        //=====================================START DEPT==============================
        DB::table('depts')->insert([
            'role' => 'General',
            'firstName' => 'general',
            'lastName' => 'admin',
            'email' => 'general@admin.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);
        DB::table('depts')->insert([
            'role' => 'Sub',
            'firstName' => 'sub',
            'lastName' => 'admin',
            'email' => 'sub@admin.com',
            'mobileNo' => rand(10, 10),
            'password' => Hash::make('Test@123'),
        ]);

        //========================================END DEPT=============================


        //Complaint for sagarpatel@mail.com
        $district = ["Ahmedabad", "Amreli", "Anand", "Aravalli", "Banaskantha", "Bharuch", "Bhavnagar", "Botad", "Chhota Udaipur", "Dahod", "Dang", "Devbhoomi Dwarka", "Gandhinagar", "Gir Somnath", "Jamnagar", "Junagadh", "Kachchh", "Kheda", "Mahisagar", "Mehsana", "Morbi", "Narmada", "Navsari", "Panchmahal", "Patan", "Porbandar", "Rajkot", "Sabarkantha", "Surat", "Surendranagar", "Tapi", "Vadodara", "Valsad"];
        $cities = ["Rajkot", "Dhoraji", "Gondal", "Jamkandorna", "Jasdan", "Jetpur", "Kotada Sangani", "Lodhika", "Paddhari", "Upleta", "Vinchchiya", "Himatnagar", "Idar", "Khedbrahma", "Poshina", "Prantij", "Talod", "Vadali", "Vijaynagar", "Surat", "Bardoli", "Choryasi", "Kamrej", "Mahuva", "Mandvi", "Mangrol", "Olpad", "Palsana", "Umarpada", "Chotila", "Chuda", "Dasada", "Dhrangadhra", "Lakhtar", "Limbdi", "Muli", "Sayla", "Thangadh", "Wadhwan", "Nizar", "Songadh", "Uchhal", "Valod", "Vyara", "Kukarmunda", "Dolvan", "Vadodara", "Dabhoi", "Desar", "Karjan", "Padra", "Savli", "Sinor", "Vaghodia", "Valsad", "Dharampur", "Kaprada", "Pardi", "Umbergaon", "Vapi"];

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
                'District' => $district[array_rand($district, 1)],
                'City' => $cities[array_rand($cities, 1)],
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
                'District' => $district[array_rand($district, 1)],
                'City' => $cities[array_rand($cities, 1)],
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
