<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Page extends Controller
{
    public function listing(){
    	$data['result'] = DB::table('pages')->orderBy('id', 'desc')->get();
    	return view('admin.page.list', $data);
    }

    public function submit(Request $request){
    	$request->validate([
    		'name'=>'required',
    		'slug'=>'required',
    		'description'=>'required'
    	]);

    	$data = array(
    	  'name' => $request->input('name'), 
    	  'slug' => $request->input('slug'), 
    	  'description' => $request->input('description')
    	);

    	DB::table('pages')->insert($data);
    	$request->session()->flash('data_added', 'Page successfully added');
    	return redirect('admin/page/list');    	
    }

    function delete(Request $request, $id){
    	DB::table('pages')->where('id',$id)->delete();
    	$request->session()->flash('data_added', 'Page successfully deleted');
    	return redirect('admin/page/list');
    }

    function edit(Request $request, $id){
    	$data['result'] = DB::table('pages')->where('id', $id)->get();
    	return view('admin.page.edit',$data);
    }

    function update(Request $request, $id){
    	$request->validate([
    		'name'=>'required',
    		'slug'=>'required',
    		'description'=>'required'
    	]);

    	$data = array(
    	  'name' => $request->input('name'), 
    	  'slug' => $request->input('slug'), 
    	  'description' => $request->input('description')
    	);

    	DB::table('pages')->where('id', $id)->update($data);
    	$request->session()->flash('data_added', 'Post Updated successfully');
    	return redirect('admin/page/list');
    }
}
