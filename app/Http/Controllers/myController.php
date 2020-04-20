<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class myController extends Controller
{
    public function show_post()
    {
    	$post= DB::table('posts')->join('catagories', 'posts.catagory_id','catagories.id')->select('posts.*','catagories.name','catagories.tag')->simplePaginate(3);
    	return view('pages.index', compact('post'));
    }
}
