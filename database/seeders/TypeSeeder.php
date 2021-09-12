<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();

        Type::create([
            'name_vi' => 'Bài viết',
            'name_en' => 'Posts',
            'description' => 'types'
        ]);

        Type::create([
            'name_vi' => 'Video',
            'name_en' => 'Video',
            'description' => 'types'
        ]);
    }
}
