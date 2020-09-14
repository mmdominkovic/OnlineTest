<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Test;
use App\TestOdgovor;
use App\Rezultati;
use App\Predmet;
use App\Pitanja;
use App\Odgovori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;

class TestoviController extends Controller
{
    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $predmeti = Predmet::inRandomOrder()->limit(10)->get();

        $pitanja = Pitanja::inRandomOrder()->limit(10)->get();
        foreach ($pitanja as &$pitanje) {
            $pitanje->odgovori = Odgovori::where('pitanje_id', $pitanje->id)->inRandomOrder()->get();
        }

      /*  
        foreach ($predmeti as $predmet) {
            if ($predmet->pitanja->count()) {
                $pitanja[$predmet->id]['predmet'] = $predmet->title;
                $pitanja[$predmet->id]['pitanja'] = $predmet->pitanja()->inRandomOrder()->first()->load('options')->toArray();
                shuffle($pitanja[$predmet->id]['pitanja']['options']);
            }
        }
        
*/
        return view('testovi.create', compact('pitanja'));
    }

    /**
     * Store a newly solved Test in storage with results.
     *
     * @param  \App\Http\Requests\StoreResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = 0;

        $test = Test::create([
            'user_id' => Auth::id(),
            'result'  => $result,
        ]);

        foreach ($request->input('pitanja', []) as $key => $pitanje) {
            $status = 0;

            if ($request->input('odgovori.'.$pitanje) != null
                && Odgovori::find($request->input('odgovori.'.$pitanje))->correct
            ) {
                $status = 1;
                $result++;
            }
            TestOdgovor::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $pitanje,
                'option_id'   => $request->input('odgovori.'.$pitanje),
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect()->route('rezultati.show', [$test->id]);
    }
}
