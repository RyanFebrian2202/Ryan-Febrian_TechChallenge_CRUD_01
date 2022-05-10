<?php

namespace App\Http\Controllers;

use App\Http\Requests\PictureRequest;
use App\Models\Picture;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public function createPicture(PictureRequest $request){

        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg'
        ]);

        // File Processing
        $files = $request->file('picture');
        $fullFileName = $files->getClientOriginalName();
        $fileName = pathinfo($fullFileName)['filename'];
        $extension = $files->getClientOriginalExtension();
        $picture = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
        $files->storeAs('public/pictures/', $picture);

        // Insert into database
        Picture::create([
            'name' => $request->name,
            'picture' => $picture,
            'user_id' => Auth::user()->id,
            'tag_id' => $request->tag
        ]);

        return redirect(route('memberManage'))->with('success_msg', 'Picture berhasil ditambahkan!');
    }

    public function getUpdatePage($id){
        $picture = Picture::findOrFail($id);
        $tags = Tag::all();
        if ($picture->user_id != Auth::user()->id) {
            return abort(404);
        }
        return view('member.edit', [
            'picture' => $picture,
            'tags' => $tags
        ]);
    }

    public function updatePicture(PictureRequest $request, $id){

        $request->validate([
            'picture' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        // Kalo dia gk update gambar
        if ($request->file('picture') == null) {

            $picture = Picture::findOrFail($id);
            if ($picture->user_id != Auth::user()->id) {
                return abort(404);
            }
            $picture->update([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'tag_id' => $request->tag
            ]);

            return redirect(route('memberManage'))->with('success_msg', 'Edit berhasil!');

        } else {

            // File Processing
            $files = $request->file('picture');
            $fullFileName = $files->getClientOriginalName();
            $fileName = pathinfo($fullFileName)['filename'];
            $extension = $files->getClientOriginalExtension();
            $picture = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
            $files->storeAs('public/pictures/', $picture);

            // Update Picture to Database
            $Picture = Picture::findOrFail($id);
            if ($Picture->user_id != Auth::user()->id) {
                return abort(404);
            }

            if (Storage::exists('public/pictures/' . $Picture->picture)) {
                if($Picture->picture == 'dummy1.png' OR $Picture->picture == 'dummy2.png' OR $Picture->picture == 'dummy3.png' OR $Picture->picture == 'dummy4.png' OR $Picture->picture == 'dummy5.png' ){

                } else{
                    Storage::delete('public/pictures/' . $Picture->picture);
                }
            }

            $Picture->update([
                'picture' => $picture,
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'tag_id' => $request->tag
            ]);

            return redirect(route('memberManage'))->with('success_msg', 'Edit berhasil!');
        }
    }

    public function deletePicture($id){

        $picture = Picture::findOrFail($id);

        if ($picture->user_id != Auth::user()->id){
            return abort(404);
        }

        if (Storage::exists('public/pictures/' . $picture->picture)) {
            if($picture->picture == 'dummy1.png' OR $picture->picture == 'dummy2.png' OR $picture->picture == 'dummy3.png' OR $picture->picture == 'dummy4.png' OR $picture->picture == 'dummy5.png' ){

            } else{
                Storage::delete('public/pictures/' . $picture->picture);
            }
        }

        Picture::destroy($id);

        return redirect(route('memberManage'))->with('success_msg', 'Delete berhasil!');
    }

    public function deletePictureAdmin($id){
        $picture = Picture::findOrFail($id);

        if (Auth::user()->role != 'Admin'){
            return abort(404);
        }

        if (Storage::exists('public/pictures/' . $picture->picture)) {
            if($picture->picture == 'dummy1.png' OR $picture->picture == 'dummy2.png' OR $picture->picture == 'dummy3.png' OR $picture->picture == 'dummy4.png' OR $picture->picture == 'dummy5.png' ){

            } else{
                Storage::delete('public/pictures/' . $picture->picture);
            }
        }

        Picture::destroy($id);

        return redirect(route('adminPicture'))->with('success_msg', 'Delete berhasil!');
    }
}
