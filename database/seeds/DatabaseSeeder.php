<?php

use Illuminate\Database\Seeder;

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
        factory(App\User::class, 1)->create([
            'role' => 'admin'
        ]);
        factory(App\Question::class, 1)->create(['user_id' => 1])->each(function ($question) {
            $question->hashtags()->save(factory(App\Hashtag::class)->make());
        });
        factory(App\Comment::class, 1)->create([
            'question_id' => 1
        ]);
    }
}