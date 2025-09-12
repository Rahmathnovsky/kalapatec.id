<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Career and Culture',
                'slug' => Str::slug('Career and Culture', '-'),
                'created_at' => Carbon::now(),

            ],
            [
                'name' => 'Event and Community',
                'slug' => Str::slug('Event and Community', '-'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Insight and Knowledge',
                'slug' => Str::slug('Insight and Knowledge', '-'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Promo and Special Deal',
                'slug' => Str::slug('Promo and Special Deal', '-'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Success Stories',
                'slug' => Str::slug('Success Stories', '-'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Tips and Update',
                'slug' => Str::slug('Tips and Update', '-'),
                'created_at' => Carbon::now(),
            ]
        ];
        Category::insert($categories);
    }
}
