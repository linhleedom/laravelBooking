<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
        {
            $data = [
                [   
                    'name' =>'Vu Thanh Long',
                    'email' =>'vtlong2210@gmail.com',
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'password' => bcrypt('123456') , 
                    'avatar'=>'./upload/avtar',
                    'phone'=>'0359989090',
                    'ward_id' => 'Thanh Hoa',
                    'address_detail'=>'Ha Noi', 
                    'permision'=>1,
                    'bank_number'=>'0008946123'
                ],
                [
                    'name' =>'Le Duy Linh',
                    'email' =>'duylinh@gmail.com',
                    'email_verified_at' => date('Y-m-d H:i:s'),
                    'password' => bcrypt('123456') , 
                    'avatar'=>'./upload/avtar',
                    'phone'=>'0359989090',
                    'ward_id' => 'Thanh Hoa',
                    'address_detail'=>'Ha Noi', 
                    'permision'=>1,
                    'bank_number'=>'0008946123' 
                ],
            ];
            DB::table('users')->insert($data);
        }
}
