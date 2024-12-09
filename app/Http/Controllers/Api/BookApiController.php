<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        return response()->json([
            'sucess'=>true,
            'book_data'=>$books]
            ,200);
    }
    public function save(Request $request){
        $Book = New Book;

        try{
            $Book->title = $request->title;
            $Book->author = $request->author;
            $Book->publication_date = $request->publication_date;
            $Book->stock = $request->stock;
            $Book->category_id = $request->category_id;
            $Book->image = "this is file dummy";
            $Book->save();
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }

        return response()->json([
            'sucess'=>true,
            'book_data'=>$Book
        ]);
    }
    public function update($id, Request $request){
        $bookToUpdate = Book::find($id);

        //asumsi aku yang boleh diupdate cuman stock dan title

        $bookToUpdate->title = $request->title;
        $bookToUpdate->stock = $request->stock;
        $bookToUpdate->save();

        return response()->json([

            'success'=>true,
            'message'=>'book has update succesfully',
            'new_book_data'=>$bookToUpdate
        ],200);
    }
    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        return response()->json([
            'success'=>true,
            'message'=>'book has deleted succesfully'
        ],200);
    }
}
