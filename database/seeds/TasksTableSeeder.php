<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = \App\user::where('name','=','jill')->pluck('id');
        DB::table('tasks')->insert([
           'user_id' => $user_id,
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'name' => 'cuddle Koalas',
           'description' => 'Wild life park in Sydney where Koalas give out hugs',
           'url' => 'https://www.wildlifesydney.com.au/explore/koala-breakfasts/koala-encounters/',
           'cost' => '5500',
        ]);
    }
}
