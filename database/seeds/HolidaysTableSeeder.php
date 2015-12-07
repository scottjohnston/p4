<?php

use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = \App\User::where('name', '=', 'jill')->pluck('id');
        DB::table('holidays')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

           'user_id' => $user_id,

           'due_date' => 'I have no idea how to do this field',
           'name' => 'holiday in Sydney',
           'description' => 'travel to the other side of the world bring bring a towel there are lots of beaches',
        ]);

        $user_id = \App\User::where('name', '=', 'jill')->pluck('id');
        DB::table('holidays')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

           'user_id' => $user_id,

           'due_date' => '16/12/15',
           'name' => 'holiday in Cairns',
           'description' => 'tropical holiday at the best coral reef in the world',
        ]);

        $user_id = \App\User::where('name', '=', 'jamal')->pluck('id');
          DB::table('holidays')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

             'user_id' => $user_id,

             'due_date' => '22/12/15',
             'name' => 'Australian tour',
             'description' => 'See Australia in 4 weeks US summer holiday',
          ]);
    }
}
