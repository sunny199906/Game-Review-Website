<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameImage;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $games = Game::all();
        
        return view('game.game-list', ['games'=>$games]);
    }

    public function search(Request $request)
    {
        //dd($request->search_game);
        $games = Game::where('game_name', 'LIKE', '%'.$request->search_game.'%')->get();
        return view('game.game-list', ['games'=>$games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('game.game-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $validatedData = $request->validate([
            'gname' => 'required',
            'des' => 'required',
            'icon_image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'banner_image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'ingame_images' => 'required',
            'ingame_images.*' => 'mimes:jpg,png,jpeg,gif,svg',
        ]);
        
        $imageName = time().'.'.$request->icon_image->extension();
        $bannerImageName = 'b'.time().'.'.$request->icon_image->extension();


        $request->icon_image->move(public_path('/game-images'), $imageName);
        $request->banner_image->move(public_path('/game-images'), $bannerImageName);

        

        $newGame = new Game;
        $newGame->game_name = $validatedData['gname'];
        $newGame->rating = 0;
        $newGame->num_of_rating = 0;
        $newGame->description = $validatedData['des'];
        $newGame->publish_date = Carbon::now();
        $newGame->icon_image = $imageName;
        $newGame->banner_image = $bannerImageName;
        $newGame->game_provider_id = Auth::id();
        $newGame->save();

        $ingame_images = [];
        if ($request->hasfile('ingame_images')){
            $count=0;
            foreach($request->file('ingame_images') as $key => $ingameImage)
            {
                $ingameImageName = $newGame->id.'-'.$count.'.'.$ingameImage->extension();  
                $ingameImage->move(public_path('/in-game-images'), $ingameImageName);
                $ingame_images[$count]= $ingameImageName;
                $count++;
            }
            
        }


        foreach ($ingame_images as $game_image) {
            $newGameImage = new GameImage;
            $newGameImage->image = $game_image;
            $newGameImage->game_id = $newGame->id;
            $newGameImage->save();
        }

        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $game_id = $game->id;
        $game_images = GameImage::where('game_id', $game_id)->get();
        $comments = Comment::where('game_id', $game_id)->get();
        
        return view('game.game-details', ['game'=>$game, 'game_images'=>$game_images, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
