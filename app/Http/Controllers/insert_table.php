<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class insert_table extends Controller
{
    public function catagory_page()
    {

    	return view('pages.addCatagory');
    }

    public function insert_catagory(Request $req)
    {
    	$req->validate([
        'catagoryname' =>'required|max:255|min:3',
        'catagorytag' =>'required|max:255',
    ]);
    	$data=array();
    	$data['name']=$req->catagoryname;
    	$data['tag']=$req->catagorytag;
    	//echo "<pre>";
    	//print_r($data);
    	$in= DB::table('catagories')->insert($data);
    	return Redirect::route('allCatagory');
    }

    public function show_catagory()
    {
    	$out=DB::table('catagories')->get();
    	return view('pages.allCatagory',compact('out'));
    }
    public function view_catagory($id)
    {
    	$view=DB::table('catagories')->where('id', $id)->first();

    	//return response()->json($view);

    	return view('pages.catagoryView')->with('view', $view);
    }

    public function delete_catagory($id)
    {
    	DB::table('catagories')->where('id', $id)->delete();

    	return Redirect::route('allCatagory');
    }

    public function edit_catagory($id)
    {
    	$edit= DB::table('catagories')->where('id', $id)->first();

    	return view('pages.editCatagory', compact('edit'));
    }

    public function update_catagory(Request $request,$id)
    {
    	$data=array();
    	$data['name']=$request->catagoryname;
    	$data['tag']=$request->catagorytag;
    	//echo "<pre>";
    	//print_r($data);
    	$in= DB::table('catagories')->where('id', $id)->update($data);
    	return Redirect::route('allCatagory');
    }
}
