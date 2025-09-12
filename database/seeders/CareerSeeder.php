<?php

namespace Database\Seeders;

use App\Models\Career;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $careers = [
            [
                'title' => 'Digital Marketing',
                'slug' => Str::slug('Digital Marketing', '-'),
                'user_id' => '1',
                'created_at' => Carbon::now(),

            ],
            [
                'title' => 'IT Developer',
                'slug' => Str::slug('IT Developer', '-'),
                'user_id' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'IT Support',
                'slug' => Str::slug('IT Support', '-'),
                'user_id' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'Finance',
                'slug' => Str::slug('Finance', '-'),
                'user_id' => '1',
                'created_at' => Carbon::now(),
            ],
        ];
        Career::insert($careers);
    }
}
