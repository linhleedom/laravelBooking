<?php
use Illuminate\Database\Seeder;

class ProvincesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            ['01TTT', 'Hà Nội'],
            ['02TTT', 'Hà Giang'],
            ['04TTT', 'Cao Bằng'],
            ['06TTT', 'Bắc Kạn'],
            ['08TTT', 'Tuyên Quang'],
            ['10TTT', 'Lào Cai'],
            ['11TTT', 'Điện Biên'],
            ['12TTT', 'Lai Châu'],
            ['14TTT', 'Sơn La'],
            ['15TTT', 'Yên Bái'],
            ['17TTT', 'Hòa Bình'],
            ['19TTT', 'Thái Nguyên'],
            ['20TTT', 'Lạng Sơn'],
            ['22TTT', 'Quảng Ninh'],
            ['24TTT', 'Bắc Giang'],
            ['25TTT', 'Phú Thọ'],
            ['26TTT', 'Vĩnh Phúc'],
            ['27TTT', 'Bắc Ninh'],
            ['30TTT', 'Hải Dương'],
            ['31TTT', 'Hải Phòng'],
            ['33TTT', 'Hưng Yên'],
            ['34TTT', 'Thái Bình'],
            ['35TTT', 'Hà Nam'],
            ['36TTT', 'Nam Định'],
            ['37TTT', 'Ninh Bình'],
            ['38TTT', 'Thanh Hóa'],
            ['40TTT', 'Nghệ An'],
            ['42TTT', 'Hà Tĩnh'],
            ['44TTT', 'Quảng Bình'],
            ['45TTT', 'Quảng Trị'],
            ['46TTT', 'Thừa Thiên Huế'],
            ['48TTT', 'Đà Nẵng'],
            ['49TTT', 'Quảng Nam'],
            ['51TTT', 'Quảng Ngãi'],
            ['52TTT', 'Bình Định'],
            ['54TTT', 'Phú Yên'],
            ['56TTT', 'Khánh Hòa'],
            ['58TTT', 'Ninh Thuận'],
            ['60TTT', 'Bình Thuận'],
            ['62TTT', 'Kon Tum'],
            ['64TTT', 'Gia Lai'],
            ['66TTT', 'Đắk Lắk'],
            ['67TTT', 'Đắk Nông'],
            ['68TTT', 'Lâm Đồng'],
            ['70TTT', 'Bình Phước'],
            ['72TTT', 'Tây Ninh'],
            ['74TTT', 'Bình Dương'],
            ['75TTT', 'Đồng Nai'],
            ['77TTT', 'Bà Rịa - Vũng Tàu'],
            ['79TTT', 'Hồ Chí Minh'],
            ['80TTT', 'Long An'],
            ['82TTT', 'Tiền Giang'],
            ['83TTT', 'Bến Tre'],
            ['84TTT', 'Trà Vinh'],
            ['86TTT', 'Vĩnh Long'],
            ['87TTT', 'Đồng Tháp'],
            ['89TTT', 'An Giang'],
            ['91TTT', 'Kiên Giang'],
            ['92TTT', 'Cần Thơ'],
            ['93TTT', 'Hậu Giang'],
            ['94TTT', 'Sóc Trăng'],
            ['95TTT', 'Bạc Liêu'],
            ['96TTT', 'Cà Mau']
        ];

        foreach($data as $key=> $val){
            DB::table('provinces')->insert(
                [
                    'matp' => $data[$key][0],
                    'name' => $data[$key][1]
                ]
                );
        }
    }
}
