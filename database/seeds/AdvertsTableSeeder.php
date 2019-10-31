<?php

use Illuminate\Database\Seeder;

class AdvertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $image = ['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCjC7jkTjXU0vbEn8Jh0ZddLCIoMq8PfClOPoQfOR7ua7szzaO', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9vZ9GoVOtOS_7WFxerLOOFOHlsjG3vt-bzosngPhxDNiQDtgG', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSebMUg7ckOlfuODyyszdOyjJ_PIGSVW3xDRWlbM3CCN0mP3xVReQ'];
       for ($i = 146; $i < 156; $i++){
//          DB::table('adverts')->delete();
       $randomTitle = Str::random(15);
       DB::table('adverts')->insert([
          'title' => 'name' . $randomTitle . $i,
          'content' => ('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.'),
          'image' => Arr::random($image),
          'active' => rand(0,1),
          'price' => rand(10, 95),
          'user_id' => rand(20, 28),
          'city_id' => rand(2, 10),
          'cat_id' => rand(501,502),
          'slug' => 'name' . $randomTitle . $i,
          'counter' => rand(0, 100),
       ]);
      };
    }
}
