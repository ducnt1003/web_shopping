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
            'name' => 'Short',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '1',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => '/template/web/images/quan-short-10-370x370.jpg',
            'photo1' => '/template/web/images/Xam-sang-1-370x370.jpg',
            'photo2' => '/template/web/images/Xam-sang-2-370x370.jpg',
            'photo3' => '/template/web/images/Xam-sang-4-370x370.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Jogger 01',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '2',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bumshop.com.vn/wp-content/uploads/2020/11/qt047-quan-jogger-thun-nam-xanh-1-370x555.jpg',
            'photo1' => 'https://bumshop.com.vn/wp-content/uploads/2020/11/qt047-quan-jogger-thun-nam-xanh-3-370x555.jpg',
            'photo2' => 'https://bumshop.com.vn/wp-content/uploads/2020/11/qt047-quan-jogger-thun-nam-xanh-370x555.jpg',
            'photo3' => 'https://bumshop.com.vn/wp-content/uploads/2020/11/qt047-quan-jogger-thun-nam-xanh-2-370x554.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Jogger 02',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '2',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bumshop.com.vn/wp-content/uploads/2019/07/qt010-quan-jogger-thun-muoi-tieu-nam-370x555.jpg',
            'photo1' => 'https://bumshop.com.vn/wp-content/uploads/2019/07/qt010-quan-jogger-thun-muoi-tieu-nam-370x555.jpg',
            'photo2' => 'https://bumshop.com.vn/wp-content/uploads/2019/07/qt010-quan-jogger-thun-muoi-tieu-nam-1-370x555.jpg',
            'photo3' => 'https://bumshop.com.vn/wp-content/uploads/2019/07/qt010-quan-jogger-thun-muoi-tieu-nam-2-370x555.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Short 04',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '4',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bumshop.com.vn/wp-content/uploads/2021/11/quan-short-13-370x370.jpg',
            'photo1' => 'https://bumshop.com.vn/wp-content/uploads/2021/11/Camo-sang-1-370x370.jpg',
            'photo2' => 'https://bumshop.com.vn/wp-content/uploads/2021/11/Camo-sang-3-370x370.jpg',
            'photo3' => 'https://bumshop.com.vn/wp-content/uploads/2021/11/Camo-sang-4-370x370.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'T-shirt 01',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '5',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bumshop.com.vn/wp-content/uploads/2022/05/TTL963-AO-THUN-TAY-LO-DEGGREY-1-370x370.jpg',
            'photo1' => 'https://bumshop.com.vn/wp-content/uploads/2022/05/TTL963-AO-THUN-TAY-LO-DEGGREY-10-370x370.jpg',
            'photo2' => 'https://bumshop.com.vn/wp-content/uploads/2022/05/TTL963-AO-THUN-TAY-LO-DEGGREY-2-370x370.jpg',
            'photo3' => 'https://bumshop.com.vn/wp-content/uploads/2022/05/TTL963-AO-THUN-TAY-LO-DEGGREY-8-370x370.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Sweater 1',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '2',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bumshop.com.vn/wp-content/uploads/2019/12/qcsw01-mau-vang-370x370.jpg',
            'photo1' => 'https://bumshop.com.vn/wp-content/uploads/2019/11/QCSW01-3-min-370x278.jpg',
            'photo2' => 'https://bumshop.com.vn/wp-content/uploads/2019/12/qcsw01-ao-sweater-mau-vang3-370x370.jpg',
            'photo3' => 'https://bumshop.com.vn/wp-content/uploads/2019/12/qcsw01-ao-sweater-mau-vang2-370x370.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Sweater 2',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '2',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bumshop.com.vn/wp-content/uploads/2019/09/ao-sweater-tron-TRON-1-min-370x555.jpg',
            'photo1' => 'https://bumshop.com.vn/wp-content/uploads/2019/09/ao-sweater-tron-TRON-1-min-370x555.jpg',
            'photo2' => 'https://bumshop.com.vn/wp-content/uploads/2019/09/ao-sweater-tron-XANH-1-min-370x493.jpg',
            'photo3' => 'https://bumshop.com.vn/wp-content/uploads/2019/09/ao-sweater-tron-XANH-2-min-370x370.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Hoodie',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '7',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bumshop.com.vn/wp-content/uploads/2021/12/23.HOODIE-PRODBLAG-3-370x555.jpg',
            'photo1' => 'https://bumshop.com.vn/wp-content/uploads/2021/12/23.HOODIE-PRODBLAG-4-e1639125135817-370x370.jpg',
            'photo2' => 'https://bumshop.com.vn/wp-content/uploads/2021/12/23.HOODIE-PRODBLAG-2-370x555.jpg',
            'photo3' => 'https://bumshop.com.vn/wp-content/uploads/2021/12/23.HOODIE-PRODBLAG-1-370x555.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Hoodie white',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '7',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://bumshop.com.vn/wp-content/uploads/2021/11/HOODIE-SPACE-6-370x370.jpg',
            'photo1' => 'https://bumshop.com.vn/wp-content/uploads/2021/11/HOODIE-SPACE-1-370x543.jpg',
            'photo2' => 'https://bumshop.com.vn/wp-content/uploads/2021/11/HOODIE-SPACE-2-370x547.jpg',
            'photo3' => 'https://bumshop.com.vn/wp-content/uploads/2021/11/HOODIE-SPACE-4-370x409.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Leather Wallet',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '3',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://cdn.chiaki.vn/unsafe/0x900/left/top/smart/filters:quality(90)/https://chiaki.vn/upload/product/2021/12/vi-nu-cam-tay-dang-dai-taomicmic-vd245-61a741d4d20ff-01122021163516.jpg',
            'photo1' => 'https://cdn.chiaki.vn/unsafe/0x900/left/top/smart/filters:quality(90)/https://chiaki.vn/upload/product/2021/12/vi-nu-cam-tay-dang-dai-taomicmic-vd245-61a741d4dee69-01122021163516.jpg',
            'photo2' => 'https://cdn.chiaki.vn/unsafe/0x900/left/top/smart/filters:quality(90)/https://chiaki.vn/upload/product/2021/12/vi-nu-cam-tay-dang-dai-taomicmic-vd245-61ad8a0a4aa97-06122021105658.png',
            'photo3' => 'https://cdn.chiaki.vn/unsafe/0x900/left/top/smart/filters:quality(90)/https://chiaki.vn/upload/product/2021/12/vi-nu-cam-tay-dang-dai-taomicmic-vd245-61a741d531b3d-01122021163517.jpgg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        Product::create([
            'name' => 'Super Star',
            'price' => '30',
            'description' => 'Beutiful shirt',
            'category_id' => '6',
            'created_by' => '1',
            'brand_id' => '1',
            'active' => '1',
            'photo' => 'https://giayxshop.vn/wp-content/uploads/2019/10/MG_8178.jpg',
            'photo1' => 'https://giayxshop.vn/wp-content/uploads/2019/10/MG_8181-150x150.jpg',
            'photo2' => 'https://giayxshop.vn/wp-content/uploads/2019/10/MG_8180-150x150.jpg',
            'photo3' => 'https://giayxshop.vn/wp-content/uploads/2019/10/MG_8183-150x150.jpg',
            'created_at' => new \dateTime,
            'updated_at' => new \dateTime,
        ]);
        // Product::factory()
        // ->count(10)
        // ->create();
    }
}
