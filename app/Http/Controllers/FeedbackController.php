<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create(Request $request) {
        $feedback = new Feedback();
        $feedback->rating = $request->input('rating');
        $feedback->pseudo = $request->input('pseudo');
        $feedback->content = $request->input('content');
        $feedback->status = 'accepted';

        $feedback->save();

        return ["data" => $feedback];
    }
}
