<?php

namespace Blk\Request\database\seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;
use Ramsey\Uuid\Uuid;


class PropertyConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('property_conditions')->insert([
            [
            'id' => Uuid::uuid4(),
            'condition' => 'Excellent',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [   
            'id' => Uuid::uuid4(),
            'condition' => 'Fair',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'id' => Uuid::uuid4(),
            'condition' => 'Poor',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]
    ]);

    }
}
