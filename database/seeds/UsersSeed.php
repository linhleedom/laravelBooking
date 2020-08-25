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
            ['1', 'admin', 'admin@gmail.com','$2y$12$YFdLkoAqMYJ.A8IepkjGLevrf/BFlz.r73XyxFeN6d0C7L3Ovp7um','','','0'], 
            ['2', 'Vũ Thành Long', 'vtlong2210@gmail.com','$2y$12$tDZg7EbxeHDgNf9HRlRBjeTkV5T58WYEFMB9r9Z7iThB8P.5DIiUm','','','1'],
            ['3', 'Lê Duy Linh', 'leduylinh1998.nc@gmail.com','$2y$12$qGprTGI6OJ1V.R.cnIoXuetM.w9tplLPHTB1xJQYpZOYSfBI1gG/e','','','2'],
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
