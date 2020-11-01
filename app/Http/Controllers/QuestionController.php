<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class QuestionController
 * @package App\Http\Controllers
 */
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        return response()->json(Question::paginate(1));
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
     * @api question-update
     * @url http://127.0.0.1:8000/api/question-update
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateQuestion(Request $request)
    {
        if (empty($request->id)) return response()->json("Please provide question id.");

        $question = Question::find($request->id);
        if (isset($question)) {
            if (isset($request->question_type_id)) $question->question_type_id = $request->question_type_id;
            if (isset($request->name)) $question->name = $request->name;
            if (isset($request->description)) $question->description = $request->description;
            $question->save();

            return response()->json($question->wasChanged() ? "Question updated successfully." : "Nothing to update.");
        } else {
            return response()->json("Question not found.");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Question $question
     * @return Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Question $question
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Question $question
     * @return Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
