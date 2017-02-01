<?php

//namespace App;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Model::unguard();
        $this->call(PostTableSeeder::class);
    }
}

class PostTableSeeder extends Seeder{
	/*public function run(){
		App\Post::truncate();
		factory(App\Post::class, 20)->create();
	}*/

	public function run()
    {
      $faker = \Faker\Factory::create();
      
      foreach(range(1,3) as $index){
        DB::table('posts')->insert([
        'title' => $faker->sentence(mt_rand(1, 3)),
        'slug' => $faker->sentence(mt_rand(1, 3)),
        'content' => join('\n\n', $faker->paragraphs(mt_rand(3, 6))),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days')

          ]);
      }

    }

}
