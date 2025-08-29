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
                'name' => 'Telephony',
                'slug' => Str::slug('telephony', '-'),
                'created_at' => Carbon::now(),

            ],
            [
                'name' => 'Outbound Call',
                'slug' => Str::slug('Outbound Call', '-'),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Inbound Call',
                'slug' => Str::slug('Inbound Call', '-'),
                'created_at' => Carbon::now(),
            ]
        ];
        Category::insert($categories);
    }
}
