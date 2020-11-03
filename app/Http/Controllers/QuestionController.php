<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @api question-update
     * @url http://127.0.0.1:8000/api/question-update
     *
     */
    public function updateQuestion(Request $request)
    {
        if (empty($request->id)) return response()->json("Please provide a question id.");

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
}
