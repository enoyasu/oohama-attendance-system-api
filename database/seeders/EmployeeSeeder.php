<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=10;$i++) {
            DB::table('employees')->insert([
                'name' => 'てすと'.$i.' てすと',
                'name_kana' => 'テスト'.$i.' テスト',
                'gender' => rand(1,2),
                'age' => rand(20,50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('employee_profile')->insert([
                'emp_id' => $i,
                'h_pay' => $i.'000',
                'tel' => '00000000000',
                'address' => '東京都豊島区池袋'.$i.'-'.$i.'-'.$i,
                'birthday' => date("Y-m-d",Rand( strtotime("Jan 01 1950"), strtotime("Nov 01 2000"))),
                'memo' => 'テキストテキストテキストテキストテキストテキスト',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
