<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::orderBy('created_at', 'DESC');

        $search = $request->input('name');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $data['all_category'] = $query->paginate(12);

        $data['search'] = $search;

        return view('pages.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];

        $data['editCategory'] = Category::find($id);

        return view('pages.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $data = [
            'name' => $request->name,
        ];

        $insertData = Category::where('id', $id)->update($data);

        return redirect()->route('category.list')
            ->with($insertData ? 'success' : 'error', $insertData
                ? 'category have been Update successfully'
                : 'Failed to Update category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('category.list')->with('success', 'Category and its products deleted successfully.');
    }

}
