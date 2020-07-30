<?php

use Illuminate\Database\Seeder;

class RatingsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['homestay_id', 'user_id', 'name','email','phone','point','comment','status'],
            ['1', '4', '','','','5','Rất tốt','1'],
            ['1', '5', '','','','4','Khá ổn','1'],
            ['1', '0', 'Lê Duy Linh','linhduyle1998.nc@gmail.com','0388271679','5','Chất lượng','1'],
            ['1', '0', 'Vũ Thành Long','vtlong2210@gmail.com','0359989090','1','Phục vụ kém','0'],
            ['2', '4', '','','','5','Rất tốt','1'],
            ['2', '5', '','','','4','Khá ổn','1'],
            ['2', '0', 'Lê Duy Linh','linhduyle1998.nc@gmail.com','0388271679','5','Chất lượng tốt','1'],
            ['2', '0', 'Vũ Thành Long','vtlong2210@gmail.com','0359989090','1','Phục vụ kém','0'],
        ];

        foreach($data as $key=> $val){
            DB::table('ratings')->insert(
                [
                    'homestay_id' => $data[$key][0],
                    'user_id' => $data[$key][1],
                    'name' => $data[$key][2],
                    'email' => $data[$key][3],
                    'phone' => $data[$key][4],
                    'point' => $data[$key][5],
                    'comment' => $data[$key][6],
                    'status' => $data[$key][7]
                ]
            );
        }
    }
}
