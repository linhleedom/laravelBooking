<?php

use Illuminate\Database\Seeder;

class UtiProSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['product_id', 'utilities_id'],
            ['1','1'],
            ['1','2'],
            ['1','3'],
            ['1','4'],
            ['1','5'],
            ['2','3'],
            ['2','4'],
            ['2','1'],
            ['2','2'],
        ];

        foreach($data as $key=> $val){
            DB::table('uti_pro')->insert(
                [
                    'product_id' => $data[$key][0],
                    'utilities_id' => $data[$key][1],
                ]
            );
        }
    }
}
