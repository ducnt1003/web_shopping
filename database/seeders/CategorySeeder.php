<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        Category::create([
            'name' => 'Summer Clothes',
            'description' => 'She’s here…Summer 2021!',
            'parent_id' => '0',
            'tax' => '10',
            'unit' => 'chiếc',
            'photo' => '/template/web/images/shop/category/category-1.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Category::create([
            'name' => 'Winter Clothes',
            'description' => 'Discover the beauty of winter.',
            'parent_id' => '0',
            'tax' => '10',
            'unit' => 'chiếc',
            'photo' => '/template/web/images/shop/category/category-2.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Category::create([
            'name' => 'Accessories',
            'description' => 'Be the Inspiration',
            'parent_id' => '0',
            'tax' => '10',
            'unit' => 'chiếc',
            'photo' => '/template/web/images/shop/category/category-3.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Category::create([
            'name' => 'Short',
            'description' => 'She’s here…Summer 2021!',
            'parent_id' => '1',
            'tax' => '10',
            'unit' => 'Cái',
            'photo' => 'https://onoff.vn/blog/wp-content/uploads/2019/03/Qu%E1%BA%A7n-short-nam-kaki.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Category::create([
            'name' => 'T-Shirt',
            'description' => 'She’s here…Summer 2021!',
            'parent_id' => '1',
            'tax' => '10',
            'unit' => 'Cái',
            'photo' => 'https://assets.hermes.com/is/image/hermesproduct/h-embroidered-t-shirt--072025HA02-worn-2-0-0-1000-1000_b.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Category::create([
            'name' => 'Shoes',
            'description' => 'She’s here…Summer 2021!',
            'parent_id' => '3',
            'tax' => '20',
            'unit' => 'Đôi',
            'photo' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/47112d0a-dc23-4b74-876c-b638fecf0af2/air-jordan-1-retro-high-og-shoes-a7Zzxm.png',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Category::create([
            'name' => 'Hoodie',
            'description' => 'She’s here…Summer 2021!',
            'parent_id' => '2',
            'tax' => '15',
            'unit' => 'Cái',
            'photo' => 'http://cdn.shopify.com/s/files/1/0035/1309/0115/products/Recycled-Cotton-Hoodie-Stone-1.jpg?v=1627551453',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
    }
}
