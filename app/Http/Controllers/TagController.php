<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);

        return view('dashboard.tag.index', [
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | string | unique:tags',
            'active' => 'required'
        ]);

        if(!isset($data['active']) || $data['active'] != 'on')
            $data['active'] =  false ;
        else
            $data['active'] = true;

        Tag::query()->create($data);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('tags')->ignore($tag->id)
            ],
            'active' => 'required'
        ]);

        if(!isset($data['active']) || $data['active'] != 'on')
            $data['active'] =  false ;
        else
            $data['active'] = true;

        $tag->update($data);

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back();
    }
}
