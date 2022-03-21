<?php

use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::insert([
            [
                'name' => 'paket kambing masak',
                'is_meat' => true,
                'is_offal' => true,
                'is_egg' => false,
                'is_chicken' => false,
                'is_vegetable' => false,
                'is_rice' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'paket nasi box hemat',
                'is_meat' => true,
                'is_offal' => true,
                'is_egg' => false,
                'is_chicken' => false,
                'is_vegetable' => false,
                'is_rice' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'paket nasi box praktis',
                'is_meat' => true,
                'is_offal' => true,
                'is_egg' => true,
                'is_chickent' => false,
                'is_vegetable' => true,
                'is_rice' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'paket nasi box spesial',
                'is_meat' => true,
                'is_offal' => true,
                'is_egg' => false,
                'is_chicken' => true,
                'is_vegetable' => true,
                'is_rice' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'paket nasi box arab',
                'is_meat' => true,
                'is_offal' => true,
                'is_egg' => false,
                'is_chicken' => false,
                'is_vegetable' => false,
                'is_rice' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'paket ekonomis mewah (bento)',
                'is_meat' => true,
                'is_offal' => false,
                'is_egg' => false,
                'is_chicken' => false,
                'is_vegetable' => true,
                'is_rice' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'paket ekonomis manis (bento)',
                'is_meat' => true,
                'is_offal' => false,
                'is_egg' => false,
                'is_chicken' => true,
                'is_vegetable' => false,
                'is_rice' => true,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'paket aqiqah tumpeng',
                'is_meat' => true,
                'is_offal' => true,
                'is_egg' => true,
                'is_chicken' => false,
                'is_vegetable' => false,
                'is_rice' => true,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
