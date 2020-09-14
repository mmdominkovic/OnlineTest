<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Predmet;
use App\Post;
class PredmetiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index' , 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pred = Predmet::orderBy('created_at','desc')->paginate(4);
        return view('predmeti.index')->with('pred',$pred);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('predmeti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'ects' => 'required'
        ]);

        $pred = new Predmet;
        $pred->title = $request->input('title');
        $pred->body = $request->input('body');
        $pred->ects = $request->input('ects');
        $pred->save();

        return redirect('/predmeti')->with('success', 'Napravili ste novi predmet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pred = Predmet::find($id);
        $posts = Post::where('id',$id);
        return view('predmeti.show')->with('pred',$pred)->with('posts',$posts);
    }

    public function napraviObjavu($id)
    {
        $pred = Predmet::find($id);
        $posts = Post::where('id',$id);
        return view('predmeti.napravi')->with('pred',$pred)->with('posts',$posts);
    }

    public function objave($id)
    {
        $pred = Predmet::find($id);
        $posts = Post::where('id',$id)->orderBy('created_at','desc');
        return view('predmeti.objave')->with('pred',$pred)->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pred = Predmet::find($id);

        return view('predmeti.edit')->with('pred',$pred);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'ects' => 'required'
        ]);

        $pred = Predmet::find($id);
        $pred->title = $request->input('title');
        $pred->body = $request->input('body');
        $pred->ects = $request->input('ects');
        $pred->save();

        return redirect('/predmeti')->with('success', 'Ažurirali ste predmet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $pred = Predmet::find($id);
        
       $pred->delete();
       return redirect('/predmeti')->with('success', 'Izbrisali ste predmet');
      
    }
}
