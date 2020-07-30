<?php

use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['id', 'name', 'email','password','phone','xaid','permision'],
            ['1', 'admin', 'admin@gmail.com','admin','','','0'],
            ['2', 'partner1', 'partner1@gmail.com','partner','','00011','1'],
            ['3', 'partner2', 'partner2@gmail.com','partner','','00010','1'],
            ['4', 'user1', 'user1@gmail.com','user','0989525671','00006','2'],
            ['5', 'user2', 'user2@gmail.com','user','0989525455','00007','2'],
            ['6', 'user3', 'user3@gmail.com','user','0989523451','00006','2']
            ];
           
            foreach($data as $key=> $val){
            DB::table('users')  ->insert(
                [
                    'id' => $data[$key][0],
                    'name' => $data[$key][1],
                    'email' => $data[$key][2],
                    'password' => $data[$key][3],
                    'phone' => $data[$key][4],
                    'xaid' => $data[$key][5],
                    'permision' => $data[$key][6],
                ]
            );
        }
    }
}
