<?php

use App\Models\ChickenMenu;
use App\Models\EggMenu;
use App\Models\MeatMenu;
use App\Models\OffalMenu;
use App\Models\RiceMenu;
use App\Models\VegetableMenu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AllMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // meet menu table
        MeatMenu::insert([
            [
                'name' => 'semur',
                'created_at'    => Carbon::now()
            ],
            [
                'name' => 'rendang',
                'created_at'    => Carbon::now()
            ],
            [
                'name' => 'teriyaki',
                'created_at'    => Carbon::now()
            ],
            [
                'name' => 'BBQ',
                'created_at'    => Carbon::now()
            ]
        ]);

        // offal menu table
        OffalMenu::insert([
            [
                'name' => 'Gule',
                'created_at'    => Carbon::now()
            ],
            [
                'name' => 'tongseng',
                'created_at'    => Carbon::now()
            ],
            [
                'name' => 'sop',
                'created_at'    => Carbon::now()
            ],
            [
                'name' => 'empal gentong',
                'created_at'    => Carbon::now()
            ],
        ]);

        // egg menu table
        EggMenu::insert([
            ['name' => 'telur baladod', 'created_at'    => Carbon::now()],
            ['name' => 'telur rebus', 'created_at'    => Carbon::now()]
        ]);

        // chicken menu table
        ChickenMenu::insert([
            ['name' => 'ayam goreng', 'created_at'    => Carbon::now()],
            ['name' => 'ayam bakar', 'created_at'    => Carbon::now()]
        ]);

        // vegetale menu table
        VegetableMenu::insert([
            ['name' => 'tumis buncis', 'created_at'    => Carbon::now()],
            ['name' => 'tumis putren', 'created_at'    => Carbon::now()],
            ['name' => 'tumis mie', 'created_at'    => Carbon::now()],
            ['name' => 'tumis bihun', 'created_at'    => Carbon::now()],
        ]);

        // rice menu table
        RiceMenu::insert([
            ['name' => 'nasi putih', 'created_at'    => Carbon::now()],
            ['name' => 'nasi mandhi', 'created_at'    => Carbon::now()],
            ['name' => 'nasi kebuli', 'created_at'    => Carbon::now()],
            ['name' => 'nasi biryani', 'created_at'    => Carbon::now()],
            ['name' => 'nasi kabsah', 'created_at'    => Carbon::now()],
            ['name' => 'nasi kuning', 'created_at'    => Carbon::now()],
            ['name' => 'nasi uduk', 'created_at'    => Carbon::now()],
        ]);
    }
}
