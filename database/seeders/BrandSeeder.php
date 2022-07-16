<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->truncate();
        // Brand::factory()
        //     ->count(20)
        //     ->create();
        Brand::create([
            'name' => 'Gucci',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Gucci_logo.svg/1200px-Gucci_logo.svg.png',
        ]);
        Brand::create([
            'name' => 'Louis Vuitton',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Louis_Vuitton_logo_and_wordmark.svg/640px-Louis_Vuitton_logo_and_wordmark.svg.png',
        ]);
        Brand::create([
            'name' => 'Dolce & Gabbana',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Dolce_%26_Gabbana.svg/1200px-Dolce_%26_Gabbana.svg.png',
        ]);

    }
}
