<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Post extends Controller
{
    public function listing(){
    	$data['result'] = DB::table('posts')->orderBy('id', 'desc')->get();
    	return view('admin.list', $data);
    }

    public function submit(Request $request){
    	$request->validate([
    		'title'=>'required',
    		'short_dec'=>'required',
    		'long_dec'=>'required',
    		'image'=>'required',
    		'post_date'=>'required'
    	]);

    	$data = array(
    	  'title' => $request->input('title'), 
    	  'short_dec' => $request->input('short_dec'), 
    	  'long_dec' => $request->input('long_dec'), 
    	  'post_date' => $request->input('post_date'), 
    	  'status' => 1, 
    	  'added_on' => date("Y-m-d h:i:s")
    	);
    	DB::table('posts')->insert($data);
    	$request->session()->flash('data_added', 'Data successfully added');
    	return redirect('admin/post/list');    	
    }
}
