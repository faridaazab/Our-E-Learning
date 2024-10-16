<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{

    public function index()
    {
        $feedbacks = Feedback::get();
        return view('website.feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {

            return view('website.feedbacks.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'feedback' => 'required',
        ]);

        Feedback::create($request->all());
        return redirect()->back()
            ->with('success', "Feedback \"" . $request['feedback'] . "\" created Successfully.");
    }

    public function show(string $id)
    {
        $feedback= Feedback::findOrFail($id);
        return view('website.feedbacks.show',compact('feedback'));
    }

}
