<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\FeedbackFormRequest;

class FeedbackController extends Controller
{
    public function index_admin(): View {
        $feedbacks = Feedback::get();

        return view('admins/admin_feedbacks', ["feedbacks" => $feedbacks]);
    }

    public function create(FeedbackFormRequest $request) {
        try {
            Feedback::create($request->validated());
        } catch (\Throwable $th) {
            return to_route('landing')->with('error', 'Une erreur est survenue');
        }

        return to_route('landing')->with('success', 'Votre avis a été envoyé');
    }

    public function update(Request $request, Int $feedbackId) {
        $feedback = Feedback::find($feedbackId);
        $feedback->status = $request->input('status');

        $feedback->save();

        return ["data" => $feedback];
    }
}
