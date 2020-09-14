<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Http\Requests\StoreUsersRequest;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $users = User::orderBy('created_at','desc')->paginate(5);
        return view('users.index')->with('users',$users);
    }
    
    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      

        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $choose_role=[
            'Profesor'=>'Profesor',
            'Student'=>'Student'
        ];
        return view('users.create',compact('choose_role'));
    }

   /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        User::create($request->all());

        return redirect()->route('users.index');
    }


    public function edit($id)
    {   
        $user = User::find($id);
        
        return view('users.edit')->with("user",$user);
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
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        $user =User::find($id);
        $user->name = $request('name');
        $user->lastname = $request('lastname');
        $user->username = $request('username');
        $user->email = $request('email');
        $user->role= $request('role');
        $user->save();

        return redirect('users.index')->with('success','Ažurirali ste korisnika');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
    
        

        $user->delete();
        return redirect('/users')->with('success', 'Korisnik Izbrisan');
    }
}