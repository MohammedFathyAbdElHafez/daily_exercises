<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExercisesFormRequest;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ExercisesController extends Controller
{

    public function index(Request $request)
    {
        $exercises = DB::table('exercises')->get();

        return view('welcome', ['exercises' => $exercises]);
    }


    //add_exercises/

    /**
     * Add exercises to database.
     *
     */
    public function store_exercises(StoreExercisesFormRequest $request)
    {

        $validatedData = $request->validated();

        $exercise = Exercise::create($validatedData);

        Session::flash("message", "Exercise added successfully");

        return redirect('/');
    }
}
