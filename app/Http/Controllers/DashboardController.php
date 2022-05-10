<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getLandingPage(){
        return view('home.landingpage');
    }

    public function getContactPage(){
        return view('home.contactus');
    }

    public function getExplorePage(Request $request){

        //Search
        if($request->input('search')){
            $pictures = Picture::where('name','like','%' .request('search'). '%')->get();
        } else{
            $pictures = Picture::all();
        }

        $users = User::all();
        $tags = Tag::all();

        return view('home.explore',compact('pictures','users','tags'));
    }

    public function getRegisterPage(){
        return view('home.register');
    }

    public function getLoginPage(){
        return view('home.login');
    }
}
