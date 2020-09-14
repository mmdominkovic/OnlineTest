<?php

namespace App\Http\Controllers;
use App\Test;
use Auth;

use App\TestOdgovor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;

class RezultatiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index' , 'show']]);
    }

    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rezultati = Test::all()->load('user');
    if ((auth()->user()->role == '')) {
      $rezultati = $rezultati->where('user_id', '=', Auth::id());
      }

        return view('rezultati.index', compact('rezultati'));
    }

    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $rezultati = TestOdgovor::where('test_id', $id)
                ->with('pitanje')
                ->with('odgovori')
                ->get()
            ;
        }

        return view('rezultati.show', compact('test', 'rezultati'));
    }
}
