<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


use Blk\Kyc\database\seeders\KycSeeder;
use Blk\Admin\database\seeders\AdminSeeder;
use Blk\Request\database\seeders\PropertyConditionSeeder;
use Blk\Request\database\seeders\PropertyTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(KycSeeder::class);
        $this->call(PropertyConditionSeeder::class);
        $this->call(PropertyTypeSeeder::class);
    }
}