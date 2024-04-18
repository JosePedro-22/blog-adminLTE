<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::paginate(10);

        return view('dashboard.category.index',
            [
                'categorias' => $categorias,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | string | unique:categories',
            'active' => 'sometimes'
        ]);

        if(!isset($data['active']) || $data['active'] != 'on')
            $data['active'] =  false ;
        else
            $data['active'] = true;

        Category::create($data);

        return  back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('categories')->ignore($category->id)
            ],
            'active' => 'sometimes'
        ]);

        if(!isset($data['active']) || $data['active'] != 'on')
            $data['active'] =  false ;
        else
            $data['active'] = true;

        $category->update($data);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
