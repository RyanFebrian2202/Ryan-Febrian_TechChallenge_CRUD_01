<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Picture;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function manageUserPage(Request $request){

        //Search
        if($request->input('search')){
            $users = User::where('username','like','%' .request('search'). '%')->get();
        } else{
            $users = User::all();
        }

        return view('admin.user',compact('users'));
    }

    public function deleteUser($id){

        if($id == 1){
            return redirect(route('getUserPage'));
        }

        $pictures = Picture::where('user_id', $id)->get();

        foreach($pictures as $picture){
            if (Storage::exists('public/pictures/' . $picture->picture)) {
                if($picture->picture == 'dummy1.png' OR $picture->picture == 'dummy2.png' OR $picture->picture == 'dummy3.png' OR $picture->picture == 'dummy4.png' OR $picture->picture == 'dummy5.png' ){

                } else{
                    Storage::delete('public/pictures/' . $picture->picture);
                }
            }
        }

        User::destroy($id);

        return redirect(route('getUserPage'))->with('success_msg', 'Delete berhasil!');
    }

    public function getManageTag(Request $request){

        //Search
        if($request->input('search')){
            $tags = Tag::where('name','like','%' .request('search'). '%')->get();
        } else{
            $tags = Tag::all();
        }

        return view('admin.tag', compact('tags'));
    }

    public function getCreateTag(){
        return view('admin.create');
    }

    public function getManagePicture(Request $request){

        //Search
        if($request->input('search')){
            $pictures = Picture::where('name','like','%' .request('search'). '%')->get();
        } else{
            $pictures = Picture::all();
        }

        $users = User::all();
        $tags = Tag::all();

        return view('admin.manage', compact('pictures','users','tags'));
    }
}
