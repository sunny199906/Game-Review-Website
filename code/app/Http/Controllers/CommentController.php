<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Game;
use Carbon\Carbon;

class CommentController extends Controller
{
    //
    public function postComment(Request $request){
        $validatedData = $request->validate([
            'game_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
            'content' => 'required',
        ]);

        $gameReviewed = Game::find($request->game_id);
        $gameRating = $gameReviewed->rating;
        $gameRatingNum = ($gameReviewed->num_of_rating)+1;
        $diffInRating = $request->rating-$gameRating;
        $ratingAfter = (1/$gameRatingNum)*$diffInRating;
        $gameReviewed->rating=$gameRating+$ratingAfter;
        $gameReviewed->num_of_rating=$gameRatingNum;
        $gameReviewed->save();

        $newComment = new Comment;
        $newComment->content = $request->content;
        $newComment->game_id = $request->game_id;
        $newComment->reviewer_id = $request->user_id;
        $newComment->rating = $request->rating;
        $newComment->comment_date = Carbon::now();
        $newComment->save();

        return redirect()->back();
    }

    public function editComment(Request $request){
        $validatedData = $request->validate([
            'commentId' => 'required',
            'content' => 'required',
        ]);

        $comment = Comment::find($request->commentId);
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back();
    }
}
