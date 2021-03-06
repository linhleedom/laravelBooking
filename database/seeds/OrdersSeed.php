<?php

use Illuminate\Database\Seeder;

class OrdersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['bill_id', 'product_id','date_start','date_end','status'],
            ['1', '1','2020-07-30','2020-08-02','0'],
            ['1', '2','2020-07-30','2020-08-02','0'],
            ['3', '3','2020-07-23','2020-07-25','1'],
            ['3', '5','2020-07-23','2020-07-25','1'],
            
        ];

        foreach($data as $key=> $val){
            DB::table('orders')->insert(
                [
                    'bill_id' => $data[$key][0],
                    'product_id' => $data[$key][1],
                    'date_start' => $data[$key][2],
                    'date_end' => $data[$key][3],
                    'status' => $data[$key][4]
                ]
            );
        }
    }
}
