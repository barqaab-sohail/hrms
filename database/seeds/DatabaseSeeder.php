<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        CountriesTableSeeder::class,
        LanguagesTableSeeder::class,
        document_namesTableSeeder::class,
        DesignationsTableSeeder::class,
        ]);


        DB::table('roles')->insert(['name' => 'Developer']);
        DB::table('roles')->insert(['name' => 'HR Manager']);
        DB::table('roles')->insert(['name' => 'Manager']);
        DB::table('roles')->insert(['name' => 'HR Assistant']);
        DB::table('roles')->insert(['name' => 'User']);

        DB::table('divisions')->insert(['name' => 'Power']);
        DB::table('divisions')->insert(['name' => 'Water']);
        DB::table('divisions')->insert(['name' => 'Finance']);

        DB::table('marital_status')->insert(['name' => 'Single']);
        DB::table('marital_status')->insert(['name' => 'Married']);
        DB::table('marital_status')->insert(['name' => 'Separated']);
        DB::table('marital_status')->insert(['name' => 'Widowed']);

        DB::table('blood_group')->insert(['name' => 'A+']);
        DB::table('blood_group')->insert(['name' => 'O+']);
        DB::table('blood_group')->insert(['name' => 'B+']);
        DB::table('blood_group')->insert(['name' => 'AB+']);
        DB::table('blood_group')->insert(['name' => 'A-']);
        DB::table('blood_group')->insert(['name' => 'O-']);
        DB::table('blood_group')->insert(['name' => 'B-']);
        DB::table('blood_group')->insert(['name' => 'AB-']);
        
       


        DB::table('employees')->insert([
            'first_name' => 'Sohail',
            'last_name' => 'Afzal',
            'father_name' => 'Muhammad Afzal',
            'date_of_birth' => '1976-06-08',
            'gender' => 'Male',
            'division_id' => 1,
            'employee_no' => 1011,
            'cnic' => '3520246897303',
            'religon' => 'Islam',
            'cnic_expiry' => '2020-04-02',
           
        ]);

        DB::table('users')->insert([
            'employee_id'=>1,
            'user_status'=>1,
            'email' => 'sohail.afzal@barqaab.com',
            'password' => bcrypt('Great@786'),
        ]);
        

        DB::table('educations')->insert([
            'employee_id'=>1,
            'degree_name' => 'BS-IT',
            'institute'=>'Virtual University of Pakistan',
            'level'=>'14',
            'from_month'=>'January',
            'from_year'=>'2017',
            'to_month'=>'December',
            'to_year'=>'2019',
            'total_marks'=>4.0,
            'marks_obtain'=>3.8,
            'country'=>'Pakistan',
            'grade'=>'A',
        ]);

                 
         $projects = array(
           
             array('name' => 'Overhead of the Company',
            'type'=>'Time Based',
            'client'=>'BARQAAB Consulting Services (Pvt.)',
            'commencement'=>'2000-05-09',
            'contractual_completion'=>'2030-01-01',
            'status'=>'In Progres',
            'role'=>'Independent',
            'share'=>'100'),

            array('name' => '500kV Gatti Grid Station Project',
            'type'=>'Time Based',
            'client'=>'NTDC',
            'commencement'=>'2019-01-14',
            'contractual_completion'=>'2015-01-01',
            'status'=>'In Progres',
            'role'=>'Independent',
            'share'=>'100'),

            array('name' => '500kV Neelum-Jhelum Transmission Line Project',
            'type'=>'Time Based',
            'client'=>'NTDC',
            'commencement'=>'2017-01-01',
            'contractual_completion'=>'2019-11-30',
            'status'=>'In Progres',
            'role'=>'JV Partner',
            'share'=>'35'),
           
            
            );
            
        DB::table('projects')->insert($projects);

    }

}
