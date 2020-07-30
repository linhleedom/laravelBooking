<?php

use Illuminate\Database\Seeder;

class ImagesBlogSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            // ['url', 'blog_id','status'],
            ['uploads/blog/img1.jpg', '1','1'],
            ['uploads/blog/img2.jpg', '1','1'],
            ['uploads/blog/img3.jpg', '1','0'],
            ['uploads/blog/img1.jpg', '1','1'],
            ['uploads/blog/img2.jpg', '2','1'],
            ['uploads/blog/img3.jpg', '2','1'],
            ['uploads/blog/img3.jpg', '2','1'],
        ];

        foreach($data as $key=> $val){
            DB::table('images_blog')->insert(
                [
                    'url' => $data[$key][0],
                    'blog_id' => $data[$key][1],
                    'status' => $data[$key][2],
                ]
            );
        }
    }
}
