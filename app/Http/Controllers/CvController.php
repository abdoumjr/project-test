<?php

namespace App\Http\Controllers;

use App\cv;
use App\User;
use App\exp;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = cv::all();
        return view('cv.index',compact('cvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , User $user)
    {
        $user= auth::user();
        $cv = New cv();
        $cv->fullname = $request->input('fullname');
        $cv->user_id = $user->id;
        $cv->user_email = $user->email;
        $cv->skill = $request->input('skill');
        $cv->exp = $request->input('exp');
        if($request->hasFile('photo')){
        $cv->photo = $request->file('photo')->store('/storate/images');
      }

        $cv->save();

        return redirect('/cvs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(cv $cv)
    {
      return view('cv.show',compact('cv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function edit(cv $cv)
    {
         $this-> authorize('update',$cv);
        return view('cv.edit',compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cv $cv)
    {

          $cv->fullname =  $request->input('fullname');
          $cv->skill = $request->input('skill');
          $cv->exp = $request->input('exp');
          $cv->save();
        return redirect('/cvs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy(cv $cv)
    {
      $this-> authorize('delete',$cv);
      $cv->delete();
      return redirect('/cvs');
    }


    public function mycvs() {
      $cvs = cv::where( "user_id" ,  "=" , auth()->id())->get();
      return view('cv.mycvs',compact('cvs'));
    }


    public function getdata($id,exp $exp) {
        //$data = exp::where($exp->user_id, '=', auth()->id())->get();
       $data = User::find($id);
         return $data->exp;

    }

    public function postexp(Request $request) {

     $data = new exp;
     $data->user_id = auth()->id();
     $data->title = $request->title;
     $data->body = $request->body;
     $data->start = $request->start;
     $data->end = $request->end;
     $data->save();
    }
    public function editexp(Request $request) {
      $data = exp::find($request->id);
      $data->user_id = auth()->id();
      $data->title = $request->title;
      $data->body = $request->body;
      $data->start = $request->start;
      $data->end = $request->end;
      $data->save();
         }

    public function deletexp(Request $request,$id) {
     $data = exp::find($id);
     $data->delete();

   }



    // public function postcv(Request $request,User $user) {
    //   $data = new cv;
    //   $data->auth()->id();
    //   $data->user_email = $user->email;
    //   $data->fullname = $request->fullname;
    //   $data->skill = $request->skill;
    //   $data->exp = $request->exp;
    //   $data->photo = $request->photo->store('images');
    //   $data->save();
    // }
}
