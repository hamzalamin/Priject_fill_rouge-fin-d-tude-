<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\category;
use App\Models\Operatuer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class operatuerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorys = category::get();
        $books = book::get();
        return view('Operatuer_funcs.addBook', compact('categorys', 'books'));
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
        // dd($request);
        $user = auth()->user()->id;
        // dd($user);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'number' => 'required',
            'price' => 'required',
            'language' => 'required',
            'writer' => 'required',
            'image' => 'required',
            'type' => 'required',
            'date' => 'required',
            'categorys_id' => 'required',
        ]);

        $imagePath = $request->file('image')->store('book_img', 'public');

        book::create([
            'name' => $request->name,
            'description' => $request->description,
            'number' => $request->number,
            'price' => $request->price,
            'language' => $request->language,
            'writer' => $request->writer,
            'image' => $imagePath,
            'type' => $request->type,
            'date' => $request->date,
            'categorys_id' => $request->categorys_id,
            'user_id' => $user,
        ]);
        return redirect()->route('bookForm')->with('success', 'book updated successfully');

        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Book $book)
    {
        //
        $categorys = category::get();
        return view('Operatuer_funcs.editBook', compact('book', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'number' => 'required',
            'price' => 'required',
            'language' => 'required',
            'writer' => 'required',
            'type' => 'required',
            'date' => 'required',
            'categorys_id' => 'required',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('book_img', 'public');
            $book->update(['image' => $imagePath]);
        }
    
        $book->update($request->all());
    
        return redirect()->route('bookForm')->with('success', 'Book updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
{
    $book->delete();

    return redirect()->route('bookForm')->with('success', 'Book deleted successfully');
}

    public function getAllBooks(){
        $books = book::get();
        return view('welcome', compact('books'));
    }
}
