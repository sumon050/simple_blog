<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class postController extends Controller
{
	public function get_catagory(Request $request)
	{
		$catagory_id= DB::table('catagories')->get();
		return view('pages.create', compact('catagory_id'));
	}
    public function insert_post(Request $request)
    {
    	
    	$request->validate([
        'title' =>'required|max:255|min:3',
        'post' =>'required',
        'image' =>'required|max:10000',
    ]);
    
    	$data = array();

    	$data['catagory_id']= $request->catagory_id;
    	$data['title']= $request->title;
    	$data['post']= $request->post;
		$image= $request->file('image'); 
		if ($image) {
		   		
		   		$img_name= hexdec(uniqid());
		   		$ext=$image->getClientOriginalExtension() ;
		   		$img_full_name= $img_name.'.'.$ext;
		   		$upload_path='images/';
		   		$img_url= $upload_path.$img_full_name;
		   		$image->move($upload_path , $img_full_name);
		   		$data['image']= $img_url;
		   		DB::table('posts')->insert($data);
		   		return Redirect::route('home');

		   	}else{
		   		DB::table('posts')->insert($data);
		   		return Redirect::route('home');
		   	}   	

    }

    public function all_post()
    {
    	$out= DB::table('posts')->join('catagories','posts.catagory_id','catagories.id')->select('posts.*','catagories.name')->get();
    	return view('post.allPost', compact('out'));
    }
    public function view_post($id)
    {
    	$view= DB::table('posts')->join('catagories','posts.catagory_id','catagories.id')->select('posts.*','catagories.name')->where('posts.id', $id)->first();
  			//return response()->jason($view);
    	return view('post.viewPost',compact('view'));
    }

    public function edit_post($id)
    {
    	$catagory_id=DB::table('catagories')->get();
    	$edit=DB::table('posts')->where('id', $id)->first();
    	return view('post.editPost', compact('catagory_id','edit'));
    }

    public function update_post(Request $request, $id)
    {
    	$request->validate([
        'title' =>'required|max:255|min:3',
        'post' =>'required|max:255',
        'image' => 'mimes:jpeg,jpg,png,gif,JPG,bmp,BMP|required|max:10000',
    ]);
    
    	$data = array();

    	$data['catagory_id']= $request->catagory_id;
    	$data['title']= $request->title;
    	$data['post']= $request->post;
		$image= $request->file('image'); 
		if ($image) {
		   		
		   		$img_name= hexdec(uniqid());
		   		$ext=$image->getClientOriginalExtension() ;
		   		$img_full_name= $img_name.'.'.$ext;
		   		$upload_path='images/';
		   		$img_url= $upload_path.$img_full_name;
		   		$image->move($upload_path , $img_full_name);
		   		$data['image']= $img_url;
		   		unlink($request->old_image);
		   		DB::table('posts')->where('id', $id)->update($data);
		   		return Redirect::route('allPost');

		   	}else{
		   		DB::table('posts')->insert($data);
		   		return Redirect::route('allPost');
		   	}   	
    }

    public function delete_post($id)
    {
    	$view= DB::table('posts')->where('id', $id)->first();
    	$image= $view->image;
    	unlink($image);
    	DB::table('posts')->where('id', $id)->delete();
    	return Redirect::route('allPost');

    }
}
