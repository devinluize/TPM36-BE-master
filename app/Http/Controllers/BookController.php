<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function welcome(){
        $books = Book::all();
        return view('welcome', compact('books'));
        // compact -> passing data
    }

    public function store(Request $request){
//        dd(Auth::user());
        $request->validate([
            'title' => 'required|min:3',
            'author' => 'required|max:15',
            'publication_date' => 'required|date',
            'stock' => 'required|gt:10',
            'image' => 'required|mimes:png,jpg'
        ]);

        $filePath = public_path('storage/images');
        $file = $request->file('image');
        $fileName = $request->title . '-' . $request->author . '-' . $file->getClientOriginalName();
        $file->move($filePath, $fileName);

        Book::create([
            // nama atribut => $request->nama input
            'title' => $request->title,
            'author' => $request->author,
            'publication_date' => $request->publication_date,
            'stock' => $request->stock,
            'image' => $fileName,
            'category_id' => $request->category_name
        ]);

        //kita pakai model mail
        // dd(Auth::user()->password);
        Mail::to('user@gmail.com')->send(new MyEmail
        (['title'=>$request->title,'author'=>$request->author,'publication_date'=>$request->publication_date]
    ));

        return redirect(to: route('welcome'));
    }
    // -> mengakses sebuah atribut
    // => db

    public function createBook(){
        $categories = Category::all();
        return view('createBook', compact('categories'));
    }

    public function editBook($id){
        $book = Book::findOrFail($id);
        return view('editBook', compact('book'));
    }

    public function updateBook($id, Request $request){
        $book = Book::findOrFail($id);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publication_date' => $request->publication_date,
            'stock' => $request->stock,
        ]);
        return redirect(route('welcome'));
    }

    public function deleteBook($id){
        Book::destroy($id);

        // $book = Book::findOrFail($id);
        // $book->delete();
        return redirect(route('welcome'));
    }
}
