<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExercisesFormRequest;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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


    //SELECT DISTINCT(date_format(created_at, '%Y-%m-%d')) AS day FROM exercises;

    //calculate_days/

    /**
     *
     */
    public function calculate_days(Request $request)
    {

        $currentDate = Carbon::now()->toDateString();

        $secondDate = Carbon::now()->addMonth()->toDateString(); 
       // dd($secondDate);
        
        $days = DB::select( DB::raw( "SELECT COUNT(DISTINCT(date_format(created_at, '%Y-%m-%d'))) AS days FROM exercises" ));

        $numberOfDays = $days[0]->days;

        Session::flash("message", "Number of days is: $numberOfDays");

        return redirect('/');
    }
}
