<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function addTag(TagRequest $request){
        Tag::create([
            'name' => $request -> name
        ]);

        return redirect(route('getManageTag'))->with('success_msg', 'Tag berhasil ditambahkan!');
    }

    public function editTag($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.edit', [
            'tag' => $tag
        ]);
    }

    public function updateTag(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update([
            'name' => $request->name
        ]);

        return redirect(route('getManageTag'))->with('success_msg', 'Edit berhasil!');
    }

    public function deleteTag($id)
    {
        Tag::destroy($id);

        return redirect(route('getManageTag'))->with('success_msg', 'Delete berhasil!');
    }
}
