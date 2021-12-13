<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Post extends Controller
{
    public function home(){
    	$data['result'] = DB::table('posts')->orderBy('id', 'desc')->get();
    	return view('front.home', $data);
    }

    public function post($slug){
    	$data['result'] = DB::table('posts')->where('slug', $slug)->get();
    	return view('front.post', $data);
    }

    public function form_submit(Request $request){
      $contact = array(
    	'name' => $request->input('name') , 
    	'email' => $request->input('email') , 
    	'mobile' => $request->input('mobile') , 
    	'message' => $request->input('message') , 
      );

      DB::table('contacts')->insert($contact);
      $request->session()->flash('data_added', 'Form successfully completed');
    	return redirect('/contact');

    }


}
