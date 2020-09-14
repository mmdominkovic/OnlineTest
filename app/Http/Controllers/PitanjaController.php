<?php

namespace App\Http\Controllers;

use App\Pitanja;
use App\Odgovori;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;

class PitanjaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pitanja = Pitanja::all();
        return view('pitanja.index')->with('pitanja',$pitanja);
    }

    /**
     * Show the form for creating new Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $relations =[
           'predmeti'=> \App\Predmet::get()->pluck('title','id')->prepend('Odaberi',''),

       ];
       $correct_options=[
        'option1' => 'Odgovor #1',
        'option2' => 'Odgovor #2',
        'option3' => 'Odgovor #3',
        'option4' => 'Odgovor #4',
        'option5' => 'Odgovor #5'
       ];
        return view('pitanja.create',compact('correct_options')+ $relations);
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsRequest $request)
    {

        $question = Pitanja::create($request->all());

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                Odgovori::create([
                    'pitanje_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect()->route('pitanja.index');
    }


    /**
     * Show the form for editing Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'predmeti' => \App\Predmet::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $pitanje=Pitanja::findOrFail($id);

        return view('pitanja.edit', compact('pitanje') + $relations);
    }

    /**
     * Update Question in storage.
     *
     * @param  \App\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pitanje = Pitanja::find($id);
        $pitanje->update($request->all());

        return redirect()->route('pitanja.index');
    }


    /**
     * Display Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'predmeti' => \App\Predmet::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $pitanje = Pitanja::findOrFail($id);

        return view('pitanja.show', compact('pitanje') + $relations);
    }


    /**
     * Remove Question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $pitanje = Pitanja::findOrFail($id);
        $odg=Odgovori::findOrFail($id);
        $pitanje->delete();

        return redirect()->route('pitanja.index');
        
    }

    /**
     * Delete all selected Question at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Question::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
