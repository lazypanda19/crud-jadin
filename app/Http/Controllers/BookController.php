<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('home', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'genre' => 'required',
            'rating' => 'required',
            'description' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Book::create($validated);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('book.index')->with('success', 'Book has been saved');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view('edit', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'genre' => 'required',
            'rating' => 'required',
            'description' => 'required',
        ]);


        DB::beginTransaction();
        try {
            $book->update($validated);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('book.index')->with('success', 'Book has been saved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        DB::beginTransaction();
        try {
            $book->delete();
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e->getmessage());
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('book.index')->with('success', 'Book has been deleted');
    }
}
