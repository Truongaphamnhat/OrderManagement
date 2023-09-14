<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('users')->insert([

        //     'name' => 'Hà Trung Nghĩa',
        //     'email' => 'nghiauser@gmail.com',
        //     'password' => bcrypt('123456789'),
        //     'phone' => '0339557275',
        //     'status' => 1, // Type USER
        //     'address' => 'An Giang',
        //     'created_at' => Carbon::now()
        // ]);
        DB::table('users')->insert([
            'name' => 'Lê Trường',
            'email' => 'truong123@gmail.com',
            'password' => bcrypt('123456789'),
            'phone' => '0869888999',
            'status' => 1, // Type ADMIN
            'address' => 'Cần Thơ',
            'created_at' => Carbon::now()
        ]);

        //     'name' => 'Lê Trường',
        //     'email' => 'truong123@gmail.com',
        //     'password' => bcrypt('123456789'),
        //     'phone' => '0869888999',
        //     'status' => 1, // Type ADMIN
        //     'address' => 'Cần Thơ',
        //     'created_at' => Carbon::now()
        // ]);

        // DB::table('orders')->insert([
        //     'code_customer' => 4,
        //     'deliver' => 'Huỳnh Nhật Trường',
        //     'contact_id' => 2,// Địa chỉ văn phòng
        //     'guarantee' =>'NULL',
        //     'delivery_address'=> 'Cầu Đỏ - Vĩnh Lộc - Hồng Dân - Bạc Liêu',
        //     'payments' => 'Thanh toán khi nhận hàng',
        //     'delivery_time'=>  Carbon::now(),
        //     'order_date' => Carbon::now(),
        //     'note'=>'NULL',
        //     'status'=> 1,
        //     'user_id' => 1,// Thuộc user nào tạo

        //     'created_at' => Carbon::now()
        // ]);


          DB::table('status_order')->insert([
            'name' => 'Chờ xử lý',
            
            'created_at' => Carbon::now()
        ]);
        DB::table('status_order')->insert([
            'name' => 'Đang xử lý',
            
            'created_at' => Carbon::now()
        ]);
        DB::table('status_order')->insert([
            'name' => 'Đã xử lý',
            
            'created_at' => Carbon::now()
        ]);
        DB::table('status_order')->insert([
            'name' => 'Đang giao',
            
            'created_at' => Carbon::now()
        ]);
        DB::table('status_order')->insert([
            'name' => 'Đã giao',
            
            'created_at' => Carbon::now()
        ]);
        // DB::table('status_order')->insert([
        //     'id'=>'0',
        //     'name' => 'Hủy đơn',
            
        //     'created_at' => Carbon::now()
        // ]);

    }
}
