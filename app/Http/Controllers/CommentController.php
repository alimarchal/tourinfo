<?php

namespace App\Http\Controllers;

use App\Models\Comment; // Import the Comment model
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Controller methods

    //
    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'description' => 'required|string|max:255',
        ]);

        Comment::create([
            'trip_id' => $request->trip_id,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('status', 'Comment added successfully!');
    }
}

