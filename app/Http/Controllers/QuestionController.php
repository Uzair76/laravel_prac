<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{
    //

    public function fetchQuestions(){

        $response = Http::get('https://quizapi.io/api/v1/questions',[
            'apiKey' => 'n99sWwtu2QKIf0SvRu2AtEoRUY1lQW8JVZOlZiDo',
            'limit' => 100
        ]);
        $response=json_decode($response->body());

        foreach($response as $q){
            $quest= new Question();
            $quest->question= $q->question;
            $quest->answer_a= $q->answers->answer_a;
            $quest->answer_b= $q->answers->answer_b;
            $quest->answer_c= $q->answers->answer_c;
            // $quest->correct_answer= $q->correct_answers->;
             $quest->explanation= $q->explanation;
            $quest->save();

        }


        return $response;
    }

    public function showQuestions(){

        $data['questions']= Question::all();
        return view('show',$data);
        }
}
