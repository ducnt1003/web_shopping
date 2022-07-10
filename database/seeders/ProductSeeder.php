<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        Product::create([
            'name' => 'T-shirt 01',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '1',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bizweb.dktcdn.net/100/399/392/articles/ao-thun-nam-dep-gia-re-3.jpeg?v=1622709874737',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'T-shirt 02',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '1',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bizweb.dktcdn.net/100/399/392/articles/ao-thun-nam-dep-gia-re-3.jpeg?v=1622709874737',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'T-shirt 03',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '1',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bizweb.dktcdn.net/100/399/392/articles/ao-thun-nam-dep-gia-re-3.jpeg?v=1622709874737',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'T-shirt 04',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '1',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bizweb.dktcdn.net/100/399/392/articles/ao-thun-nam-dep-gia-re-3.jpeg?v=1622709874737',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'T-shirt 05',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '1',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bizweb.dktcdn.net/100/399/392/articles/ao-thun-nam-dep-gia-re-3.jpeg?v=1622709874737',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
    }
}
