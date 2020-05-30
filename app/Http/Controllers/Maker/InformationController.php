<?php

namespace App\Http\Controllers\Maker;

use App\Http\Controllers\Controller;
use App\Information;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Information::class,'information');
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $data = User::find(auth()->id())->quizzes;
        return view('Maker.Information.create',[
            'data' => $data
        ]);
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

        $path = $request->file('file')->store('image');

        $path = Str::of($path)->replace('image','/storage/image');

        Information::create([
            'name' => $request->name,
            'picture_url' => $path,
            'quiz_id' => $request->quiz
        ]);
        session()->flash('success',true);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Information  $information
     *
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Information  $information
     *
     */
    public function edit(Information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     *
     */
    public function update(Request $request, Information $information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Information  $information
     *
     */
    public function destroy(Information $information)
    {
        $path = Str::of($information->picture_url)->replace('/storage/','');

        $message = Storage::disk('public')->delete($path);

        $information->delete();

        session()->flash('success', $message);

        return redirect()->back();
    }

    public function validateRequest(Array $data){
        return Validator::make($data,[
            'name' => 'required|string',
            'quiz' => 'required|numeric',
            'file' => 'required|mimes:jpeg,bmp,png'
        ]);
    }
}
