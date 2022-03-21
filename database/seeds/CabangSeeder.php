<?php

use App\Models\Cabang;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabang::insert([
            [
                'nama' => 'cabang 1',
                'alamat' => 'Jl. cabang 1',
                'created_at' => Carbon::now()
            ],
            [
                'nama' => 'cabang 2',
                'alamat' => 'Jl. cabang 2',
                'created_at' => Carbon::now()
            ],
            [
                'nama' => 'cabang 3',
                'alamat' => 'Jl. cabang 3',
                'created_at' => Carbon::now()
            ],
            [
                'nama' => 'cabang 4',
                'alamat' => 'Jl. cabang 4',
                'created_at' => Carbon::now()
            ],
            [
                'nama' => 'cabang 5',
                'alamat' => 'Jl. cabang 5',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
