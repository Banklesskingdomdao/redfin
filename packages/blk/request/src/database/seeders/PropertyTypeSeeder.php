<?php

namespace Blk\Request\database\seeders;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('property_types')->insert([
            [
            'id' => Uuid::uuid4(),
            'type' => ' Residential',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [   
            'id' => Uuid::uuid4(),
            'type' => 'Commercial',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
    ]);

    }
}
