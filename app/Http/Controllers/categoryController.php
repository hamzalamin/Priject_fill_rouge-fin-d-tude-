<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorys = category::get();
        return view('Admin_funcs.AddCategory', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $imagePath = $request->file('image')->store('category_img', 'public');
    
        category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
        
        return redirect()->route('CategoryForm')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
        return view('Admin_funcs.updateCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
    ]);

    $category->name = $request->name;
    $category->description = $request->description;

    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($category->image);
        $category->image = $request->file('image')->store('category_img', 'public');
    }
    $category->save();

    return redirect()->route('CategoryForm')->with('success', 'Category updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    Storage::disk('public')->delete($category->image);
    $category->delete();
    return redirect()->route('CategoryForm')->with('success', 'Category deleted successfully');
}
}
