<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function start(Quiz $quiz){
        $i = -1;
        if (session('stage') == null){
            $data = $quiz->information()->orderByRaw('RAND()')->get();
            foreach ($data as $d){
                $i++;
            }
            session([
                'first' => 0,
                'second' => 1,
                'data' => $data,
                'count' => $i,
                'stage' => true
            ]);
            $i = 0;
        }

        if (session('second') > session('count')){
            $x = array();

            foreach (session('data') as $f){
                $x[$f["id"]] = $f;
            }

            return view('final',[
               'data' => $x[session('final')]
            ]);
        }elseif(session('first') > session('count')){
            $x = array();

            foreach (session('data') as $f){
                $x[$f["id"]] = $f;
            }

            return view('final',[
               'data' => $x[session('final')]
            ]);
        }else{
            return view('quiz',[
                'first' => session('data')[session('first')],
                'second' => session('data')[session('second')],
                'name' => $quiz->name
            ]);
        }
    }

    public function next(Request $request){
        $s = $request->select;
        if ($s == 'first'){

            session([
               'second' => session('second') + 1
            ]);

            if (session('second') <= session('first')){
                session([
                    'second' => session('first') + 1
                ]);
            }

            if (session('second') > session('count')) {
                session([
                    'final' => $request->id
                ]);
            }
        }else {

            session([
                'first' => session('first') + 1
            ]);

            if (session('first') <= session('second')) {
                session([
                    'first' => session('second') + 1
                ]);
            }

            if (session('first') > session('count')) {
                session([
                    'final' => $request->id
                ]);
            }
        }
        return redirect()->back();
    }

    public function reset(){
        session()->forget([
            'first','second','count','data','stage'
        ]);

        return redirect()->back();
    }
}
