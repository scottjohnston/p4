<?php

use Illuminate\Database\Seeder;

class EscapesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('escapes')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'name' => 'cuddle Koalas',
           'description' => 'Wild life park in Sydney where Koalas give out hugs',
           'url' => 'https://www.wildlifesydney.com.au/explore/koala-breakfasts/koala-encounters/',
           'cost' => '5500',
        ]);

      DB::table('escapes')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'name' => 'Bondi Beach',
          'description' => 'Travel to bondi beach early in the morning and catch a wave',
          'url' => 'https://en.wikipedia.org/wiki/Bondi_Beach',
          'cost' => '500',
       ]);

       DB::table('escapes')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'name' => 'Great Barrier Reef',
           'description' => 'snorkelling, scuba diving, aircraft or helicopter tours, bare boats (self-sail), glass-bottomed boat viewing, semi-submersibles and educational trips, cruise ship tours, whale watching and swimming with dolphins',
           'url' => 'http://www.greatbarrierreef.org/',
           'cost' => '100000',
        ]);

        DB::table('escapes')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'hartlies crocodile adventures',
            'description' => '2100 metres of timber boardwalks and pathways leading you on a journey of discovery through woodlands and rainforest where you can see an array of wildlife, including beautiful tropical birds, reptiles, insects and other native fauna',
            'url' => 'http://www.crocodileadventures.com/',
            'cost' => '500',
         ]);

        DB::table('escapes')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Pebbly Beach',
            'description' => 'Secluded beach south of Sydney where wild kangaroos walk up to you',
            'url' => 'http://www.tripadvisor.com.au/Attraction_Review-g529023-d544987-Reviews-Pebbly_Beach-Shoalhaven_New_South_Wales.html',
            'cost' => '500',
         ]);
    }
}
