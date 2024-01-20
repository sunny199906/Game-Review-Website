<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testUser = new User();
        $testUser->user_type=1;
        $testUser->username='Test';
        $testUser->password=Hash::make('123456');
        $testUser->save();

        $testGameDev = new User();
        $testGameDev->user_type=2;
        $testGameDev->username='TestDev';
        $testGameDev->password=Hash::make('123456');
        $testGameDev->save();

        //User::factory()->count(2)->create();
    }
}
