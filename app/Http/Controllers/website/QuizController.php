<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;


class QuizController extends Controller
{
    public function show(string $id)
    {
        $quiz= Quiz::findOrFail($id);
        return view('website.quizzes.show',compact('quiz'));
    }
}
