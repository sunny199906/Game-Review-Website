<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    //
    public function list()
    {
        $game = Game::first();
        return view('home', ['game'=>$game]);
    }
}
