<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    //
    public function index($id)
    {
        $company = listing::find($id);
        $user = auth()->user();
        $comment = Comment::where('company_id', $id)->get();


    return view('listings.detail',compact('company','user','comment' ));
    }

    public function store(request $request,$id )
    {
        $company = listing::find($id);
        $user = auth()->user();

        $comment = new comment();
        $comment->company = $company->title;
        $comment->company_id=$id;
        $comment->name = $user->name;
        $comment->text = request('text');
        $comment->save();


    return back();
    }


}
