<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function memberManagePicture(Request $request){

        //Search
        if($request->input('search')){
            $pictures = Picture::where([['name','like','%' .request('search'). '%'],['user_id',Auth::user()->id]])->get();
        } else{
            $pictures = Picture::where('user_id', Auth::user()->id)->get();
        }

        $tags = Tag::all();

        return view('member.manage', compact('pictures','tags'));
    }

    public function getCreatePage(){

        $tags = Tag::all();

        return view('member.create', compact('tags'));
    }
}
