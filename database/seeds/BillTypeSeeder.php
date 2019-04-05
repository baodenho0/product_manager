<?php

use Illuminate\Database\Seeder;

class BillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $billTypes = [
            ['name'=>'Nhập','slug'=>'nhap'],
            ['name'=>'Xuất','slug'=>'xuat']
        ];
        foreach ($billTypes as $item){
            \Illuminate\Support\Facades\DB::table('bill_types')->insert($item);
        }
    }
}
