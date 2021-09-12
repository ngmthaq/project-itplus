<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create([
            'name_vi' => 'Tin nóng',
            'name_en' => 'Breaking News',
            'description' => 'categories'
        ]);

        Category::create([
            'name_vi' => 'Chính trị',
            'name_en' => 'Politics',
            'description' => 'categories'
        ]);

        Category::create([
            'name_vi' => 'Kinh doanh',
            'name_en' => 'Business',
            'description' => 'categories'
        ]);

        Category::create([
            'name_vi' => 'Khoa học & Công nghệ',
            'name_en' => 'Science & Technology',
            'description' => 'categories'
        ]);

        Category::create([
            'name_vi' => 'Sức khoẻ',
            'name_en' => 'Health',
            'description' => 'categories'
        ]);

        Category::create([
            'name_vi' => 'Du lịch',
            'name_en' => 'Travel',
            'description' => 'categories'
        ]);

        Category::create([
            'name_vi' => 'Thể thao',
            'name_en' => 'Sports',
            'description' => 'categories'
        ]);
    }
}
