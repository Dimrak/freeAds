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
       for ($i = 75; $i < 123; $i++){
//          DB::table('adverts')->delete();
       $randomTitle = Str::random(15);
       DB::table('adverts')->insert([
          'title' => 'name' . $randomTitle . $i,
          'content' => ('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.'),
          'image' => ('http://topnewsherald.com/wp-content/uploads/2019/09/Global-Laboratory-Informatic-Market.jpg'),
          'active' => rand(0,1),
          'price' => rand(180, 1500),
          'user_id' => rand(20, 28),
          'city_id' => rand(2, 10),
          'cat_id' => rand(449,460),
          'slug' => 'name' . $randomTitle . $i,
          'counter' => rand(0, 100),
       ]);
      };
    }
}
