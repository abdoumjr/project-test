<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UsersController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

     if ($user->id == auth()->id() ) {
      return view('editprofile',compact('user'));
    }
   else {
      return redirect('home');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->hasFile('photo')){
        $user->photo = $request->file('photo')->store('/storate/images');
        $user->save();
        return redirect('');
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //ok
    // }

    public function getdata($id) {
      $data = User::find($id);
      return $data;
    }

    public function editprofile($id,Request $request) {
      $data = User::find($id);
      $data->id = auth()->id();
      $data->name = $request->name;
      $data->email = $request->email;
      if($request->hasFile('photo')){
      $data->photo = $request->file('photo')->store('/storate/images');
      $data->save();
    }
  }
}
