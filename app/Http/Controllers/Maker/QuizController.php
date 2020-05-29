<?php

namespace App\Http\Controllers\Maker;

use App\Http\Controllers\Controller;
use App\Quiz;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Quiz::class,'quiz');
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $data = User::find(auth()->id())->quizzes()->get();
        return view('Maker.Quiz.index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('Maker.Quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $this->validateRequest($request->all())->validate();

        $slug = Str::of($request->name.auth()->user()->name.now())->slug();

        Quiz::create([
           'name' => $request->name,
           'user_id' => auth()->id(),
           'slug' =>  $slug
        ]);

        return redirect()->route('quiz.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     *
     */
    public function show(Quiz $quiz)
    {
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     *
     */
    public function edit(Quiz $quiz)
    {
        return view('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     *
     */
    public function update(Request $request, Quiz $quiz)
    {
        $this->validateRequest($request->all())->validate();

        $slug = Str::of($request->name.auth()->user()->name.now())->slug();

        $quiz->update([
           'name' => $request->name,
           'slug' =>  $slug
        ]);

        return redirect()->route('quiz.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     *
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->information()->delete();
        $quiz->delete();
    }

    public function validateRequest(Array $data){
        return Validator::make($data,[
            'name' => 'required|string'
        ]);
    }
}
