<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $testGame1 = new Game();
        $testGame1->game_name = 'Epic Chef';
        $testGame1->rating = 0;
        $testGame1->num_of_rating = 0;
        $testGame1->publish_date = Carbon::now();
        $testGame1->icon_image = '1650327637.jpg';
        $testGame1->banner_image = 'b1650327637.jpg';
        $testGame1->game_provider_id = 2;
        $testGame1->description = 'Epic Chef is a story-driven adventure game flavoured with life-sim farming, and
        crafting elements, blended together into one delicious dish via an interactive cooking
        experience - all
        served with a side of humour and elaborate cast of characters inspired by classics such as
        Mister
        Ajikko, or the writing of Sir Terry Pratchett. Grab your spatula and start on your journey to
        become...
        Epic Chef!';
        $testGame1->save();

        $testGame2 = new Game();
        $testGame2->game_name = 'God of War';
        $testGame2->rating = 0;
        $testGame2->num_of_rating = 0;
        $testGame2->publish_date = Carbon::now();
        $testGame2->icon_image = '1650327675.jpg';
        $testGame2->banner_image = 'b1650327675.jpg';
        $testGame2->game_provider_id = 2;
        $testGame2->description = 'Kratos is a father again. As mentor and protector to Atreus, a son determined to earn his respect, he is forced to deal with and control the rage that has long defined him while out in a very dangerous world with his son.  His vengeance against the Gods of Olympus behind him, Kratos now lives in the realm of Norse deities and monsters.  It’s in this harsh, unforgiving world that he must fight to survive, and not only teach his son to do the same… but also prevent him from repeating the Ghost of Sparta’s bloodstained mistakes.';
        $testGame2->save();

        $testGame3 = new Game();
        $testGame3->game_name = 'Poppy Playtime';
        $testGame3->rating = 0;
        $testGame3->num_of_rating = 0;
        $testGame3->publish_date = Carbon::now();
        $testGame3->icon_image = '1650327698.jpg';
        $testGame3->banner_image = 'b1650327698.jpg';
        $testGame3->game_provider_id = 2;
        $testGame3->description = 'You must stay alive in this horror/puzzle adventure. Try to survive the vengeful toys waiting for you in the abandoned toy factory. Use your GrabPack to hack electrical circuits or nab anything from afar. Explore the mysterious facility... and dont get caught.';
        $testGame3->save();

        $testGame4 = new Game();
        $testGame4->game_name = 'Elden Ring';
        $testGame4->rating = 0;
        $testGame4->num_of_rating = 0;
        $testGame4->publish_date = Carbon::now();
        $testGame4->icon_image = '1650327722.jpg';
        $testGame4->banner_image = 'b1650327722.jpg';
        $testGame4->game_provider_id = 2;
        $testGame4->description = 'Rise, Tarnished, and be guided by grace to brandish the power of the Elden Ring and become an Elden Lord in the Lands Between.  In the Lands Between ruled by Queen Marika the Eternal, the Elden Ring, the source of the Erdtree, has been shattered.  Marika offspring, demigods all, claimed the shards of the Elden Ring known as the Great Runes, and the mad taint of their newfound strength triggered a war: The Shattering. A war that meant abandonment by the Greater Will.  And now the guidance of grace will be brought to the Tarnished who were spurned by the grace of gold and exiled from the Lands Between. Ye dead who yet live, your grace long lost, follow the path to the Lands Between beyond the foggy sea to stand before the Elden Ring.';
        $testGame4->save();

        //Game::factory()->count(4)->create();
    }
}
