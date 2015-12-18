<?php

use Illuminate\Database\Seeder;

class EscapeHolidayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //check that the models work
         $escape_id = \App\Escape::where('name', '=', 'Great Barrier Reef')->pluck('id');
         $holiday_id = \App\Holiday::where('name', '=', 'holiday in Cairns')->pluck('id');

         DB::table('escape_holiday')->insert([
         'created_at' => Carbon\Carbon::now()->toDateTimeString(),
         'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
         'escape_id' => $escape_id,
         'holiday_id' => $holiday_id,
         ]);

         $escape_id = \App\Escape::where('name', '=', 'Bondi Beach')->pluck('id');
         $holiday_id = \App\Holiday::where('name', '=', 'holiday in Sydney')->pluck('id');

         DB::table('escape_holiday')->insert([
         'created_at' => Carbon\Carbon::now()->toDateTimeString(),
         'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
         'escape_id' => $escape_id,
         'holiday_id' => $holiday_id,
         ]);

         $escape_id = \App\Escape::where('name', '=', 'cuddle Koalas')->pluck('id');
         $holiday_id = \App\Holiday::where('name', '=', 'Australian tour')->pluck('id');

         DB::table('escape_holiday')->insert([
         'created_at' => Carbon\Carbon::now()->toDateTimeString(),
         'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
         'escape_id' => $escape_id,
         'holiday_id' => $holiday_id,
         ]);

         $escape_id = \App\Escape::where('name', '=', 'Pebbly Beach')->pluck('id');
         $holiday_id = \App\Holiday::where('name', '=', 'holiday in Sydney')->pluck('id');

         DB::table('escape_holiday')->insert([
         'created_at' => Carbon\Carbon::now()->toDateTimeString(),
         'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
         'escape_id' => $escape_id,
         'holiday_id' => $holiday_id,
         ]);

         $escape_id = \App\Escape::where('name', '=', 'hartlies crocodile adventures')->pluck('id');
         $holiday_id = \App\Holiday::where('name', '=', 'holiday in Cairns')->pluck('id');

         DB::table('escape_holiday')->insert([
         'created_at' => Carbon\Carbon::now()->toDateTimeString(),
         'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
         'escape_id' => $escape_id,
         'holiday_id' => $holiday_id,
         ]);

 }
}
