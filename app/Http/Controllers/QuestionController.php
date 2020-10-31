<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Mail\AnswerInfo;
use App\Question;
use App\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('test_tbl')->insert([
            'date_time' => date('Y-m-d H:i:s')
        ]);
//        dd(Question::doesntHave('answers')->where('created_at', '>=', date('Y-m-d H:i:s', strtotime("-24 hours")))->get());echo "success";

//        $answers = new Answer();
//        dd($answers->getLast5Answers(1));
//        Mail::to('app.answerinfo@gmail.com')->send(new AnswerInfo());

       /* QuestionType::create([
            'name' => "textarea",
            'description' => ""
        ]);
        Question::create([
            'question_type_id' => 1,
            'name' => "Who is the author of android?",
            'date' => "29-10-2020",
            'description' => "",
            'user_id' => 1
        ]);
        Answer::create([
            'name' => "Google",
            'question_id' => 1,
            'user_id' => 1
        ]);
        echo "success";*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
