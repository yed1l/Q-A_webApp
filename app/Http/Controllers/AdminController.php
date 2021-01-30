<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = Question::all();
        return view('admin.questions.profile',
            [
                'questions' => $request->user()->adminQuestions(),
                'question' => $questions
            ]);
    }
}