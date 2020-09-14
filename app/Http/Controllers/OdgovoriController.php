<?php

namespace App\Http\Controllers;

use App\Odgovori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsOptionsRequest;
use App\Http\Requests\UpdateQuestionsOptionsRequest;

class OdgovoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index' , 'show']]);
    }

    /**
     * Display a listing of QuestionsOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $odgovori = Odgovori::all();

        return view('odgovori.index', compact('odgovori'));
    }

    /**
     * Show the form for creating new QuestionsOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'pitanja' => \App\Pitanja::get()->pluck('question_text', 'id'),
        ];

        return view('odgovori.create', $relations);
    }

    /**
     * Store a newly created QuestionsOption in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsOptionsRequest $request)
    {
      $odgovori=  Odgovori::create($request->all());

        return redirect()->route('odgovori.index');
    }


    /**
     * Show the form for editing QuestionsOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'pitanja' => \App\Pitanja::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $odgovori = Odgovori::findOrFail($id);

        return view('odgovori.edit', compact('odgovori') + $relations);
    }

    /**
     * Update QuestionsOption in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsOptionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsOptionsRequest $request, $id)
    {
        $odgovori = Odgovori::findorFail($id);
        $odgovori->update($request->all());

        return redirect()->route('odgovori.index');
    }


    /**
     * Display QuestionsOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'pitanja' => \App\Odgovori::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $questions_option = Odgovori::findOrFail($id);

        return view('odgovori.show', compact('questions_option') + $relations);
    }


    /**
     * Remove QuestionsOption from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionsoption = Odgovori::findOrFail($id);
        $questionsoption->delete();

        return redirect()->route('odgovori.index');
    }

    /**
     * Delete all selected QuestionsOption at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Odgovori::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
