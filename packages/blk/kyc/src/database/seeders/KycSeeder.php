<?php

namespace Blk\Kyc\database\seeders;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use App\Helpers\Uuid\UuidModel;



class KycSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kyc_types')->insert([
            [
            'id' => Uuid::uuid4(),
            'name' => 'Passport',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [   
            'id' => Uuid::uuid4(),
            'name' => 'National Card',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'id' => Uuid::uuid4(),
            'name' => 'Drivers license',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
    ]);
    }
}
