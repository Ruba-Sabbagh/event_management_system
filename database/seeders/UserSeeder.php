<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'ralsabbagh',
                'email'=>'ralsabbagh@svuonline.org',
                'password'=>bcrypt('123456'),
                'first_name_eng'=>'Ruba',
                'father_name_eng'=>'Bassam',
                'last_name_eng'=>'AL Sabbagh',
                'gender'=>'Female',
                'mbl'=>'0944426818',
                'group_id'=>'2',
                'sid'=>'01010010891',
                'personal_email'=>'rubasabbagh24@gmail.com',

            ],
            [
                'name'=>'sgojel',
                'email'=>'sgojel@svuonline.org',
                'password'=>bcrypt('123456'),
                'first_name_eng'=>'Saya',
                'father_name_eng'=>'Sami',
                'last_name_eng'=>'Gojel',
                'gender'=>'Female',
                'mbl'=>'0944426818',
                'group_id'=>'3',
                'sid'=>'01010010891',
                'personal_email'=>'rubasabbagh24@gmail.com',
            ],

        ]);
    }
}
