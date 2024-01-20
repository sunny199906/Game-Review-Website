<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GameImage;

class GameImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 5; $i++) {

            for($j = 0; $j < 4; $j++) {
                $testGameImage = new GameImage();
                $testGameImage->game_id = $i;
                $testGameImage->image = $i.'-'.$j.'.jpg';
                $testGameImage->save();
            }
        }
        

        //$testGameImage1->save();
    }
}
