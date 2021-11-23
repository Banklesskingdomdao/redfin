<?php

namespace Blk\Admin\database\seeders;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin')->insert([
            'id' => Uuid::uuid4(),
            'email' =>'admin@gmail.com',
            'password' =>'12345',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
