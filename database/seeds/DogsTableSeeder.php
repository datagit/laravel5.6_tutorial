<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('dogs')->truncate();
//        DB::table('dogs')->insert(array('name' => 'Mori solite ducunt ad germanus domus.'));
//        DB::table('dogs')->insert(array('name' => 'Inner attitudes handles most beauties.'));
//        DB::table('dogs')->insert(array('name' => 'Everyone loves the mossiness of doughnut punch enameld with hardened za\'atar.'));

        factory(MyLearnLaravel5x\Dog::class, 50)->create();
    }
}
