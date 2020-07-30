<?php

use Illuminate\Database\Seeder;

class BillsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['id', 'user_id', 'name','email','phone','status','payments'],
            ['1', '4', '','','','1','700000'],
            ['2', '5', '','','','1','1000000'],
            ['3', '0', 'Lê Duy Linh','linhduyle1998.nc@gmail.com','0388271679','1','700000'],
            ['4', '0', 'Vũ Thành Long','vtlong2210@gmail.com','0359989090','1','800000']
        ];

        foreach($data as $key=> $val){
            DB::table('bills')->insert(
                [
                    'id' => $data[$key][0],
                    'user_id' => $data[$key][1],
                    'name' => $data[$key][2],
                    'email' => $data[$key][3],
                    'phone' => $data[$key][4],
                    'status' => $data[$key][5],
                    'payments' => $data[$key][6],
                ]
            );
        }
    }
}
