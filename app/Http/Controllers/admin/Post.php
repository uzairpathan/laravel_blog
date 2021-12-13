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
            'slug'=>'required|unique:posts',
    		'image'=>'required|mimes:jpg,jpeg,png',
    		'post_date'=>'required'
    	]);

    	//$image = $request->file('image')->store('uploaded_image');
    	$image = $request->file('image');
    	$ext = $image->extension();
    	$file = time().'.'.$ext;
    	$image->storeAs('/public/uploaded_image', $file);


    	$data = array(
    	  'title' => $request->input('title'), 
    	  'short_dec' => $request->input('short_dec'), 
    	  'long_dec' => $request->input('long_dec'), 
          'slug' => $request->input('slug'), 
    	  'image' => $file, 
    	  'post_date' => $request->input('post_date'), 
    	  'status' => 1, 
    	  'added_on' => date("Y-m-d h:i:s")
    	);

    	DB::table('posts')->insert($data);
    	$request->session()->flash('data_added', 'Data successfully added');
    	return redirect('admin/post/list');    	
    }

    function delete(Request $request, $id){
    	DB::table('posts')->where('id',$id)->delete();
    	$request->session()->flash('data_added', 'Data successfully deleted');
    	return redirect('admin/post/list');
    }

    function edit(Request $request, $id){
    	$data['result'] = DB::table('posts')->where('id', $id)->get();
    	return view('admin.edit',$data);
    }

    function update(Request $request, $id){
    	$request->validate([
    		'title'=>'required',
    		'short_dec'=>'required',
    		'long_dec'=>'required',
            'slug'=>'required|unique:posts',
    		'image'=>'mimes:jpg,jpeg,png',
    		'post_date'=>'required'
    	]);

    	/*$image = $request->file('image')->store('uploaded_image');
    	$image = $request->file('image');
    	$ext = $image->extension();
    	$file = time().'.'.$ext;
    	$image->storeAs('/public/uploaded_image', $file);*/


    	$data = array(
    	  'title' => $request->input('title'), 
    	  'short_dec' => $request->input('short_dec'), 
    	  'long_dec' => $request->input('long_dec'), 
          'slug' => $request->input('slug'), 
    	  'post_date' => $request->input('post_date'), 
    	  'status' => 1, 
    	  'added_on' => date("Y-m-d h:i:s")
    	);

    	DB::table('posts')->where('id', $id)->update($data);
    	$request->session()->flash('data_added', 'Data Updated successfully');
    	return redirect('admin/post/list');
    }
}
