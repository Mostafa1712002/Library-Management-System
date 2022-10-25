<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $index) {
            $faker = \Faker\Factory::create();
            $book = \App\Models\Book::create([
                'slug' => $faker->slug,
                'isbn' => $faker->isbn13,
                'author' => $faker->name,
            ]);

            foreach (range(1, 3) as $index) {
                $book->tags()->attach(\App\Models\Tag::inRandomOrder()->first());
            }
            foreach (range(1, 3) as $index) {
                $book->addMedia(public_path('images/test.jpg'))->toMediaCollection('media');
                \Illuminate\Support\Facades\File::copy(public_path('images/test2.jpg'), public_path('images/test.jpg'));
            }
            $book->locales()->create([
                "title" => $faker->title,
                "description" => $faker->text,
                "locale" => "en",
            ]);
            $book->locales()->create([
                "title" => $faker->title,
                "description" => $faker->text,
                "locale" => "ar",
            ]);
        }
    }
}
