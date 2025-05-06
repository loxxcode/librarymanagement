<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view("books.index",compact("books"));
    }
    public function create(){
        return view("books.create");
    }
    public function store(Request $request){
        $request->validate([
            "isbn" => "required:unique:books",
            "book_name"=> "required",
            "publisher_name"=> "required",
            "description" => "nullable",
        ]);
        $check = Book::where([
            ['book_name', '=', $request->book_name],
            ['publisher_name', '=', $request->publisher_name],
        ])->first();
        if($check){
            return redirect("/books")->with("success","Books and Publisher is Arleady exists");
        }else{
            $book = new Book();
            $book->isbn = $request->isbn;
            $book->book_name = $request->book_name;
            $book->publisher_name = $request->publisher_name;
            $book->description = $request->description;
            $book->save();
            return redirect("/books")->with("success","Book created successfully");
        }
    }
    public function edit($id){
        $book = Book::findOrFail($id);
        return view("books.edit", compact("book"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "isbn" => "required:unique:books",
            "book_name"=> "required",
            "publisher_name"=> "required",
            "description" => "nullable",
        ]);
        $book = Book::findOrFail($id);
        $book->isbn = $request->isbn;
        $book->book_name = $request->book_name;
        $book->publisher_name = $request->publisher_name;
        $book->description = $request->description;
        $book->update();
        return redirect("/books")->with("success","Book updated successfully");
    }
    public function destroy($id){
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect("/books")->with("success","Book deleted successfully");
    }
}
