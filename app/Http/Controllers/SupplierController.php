<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::with("books")->get();
        $book = Book::all();
        return view("suppliers.index",compact("suppliers","book"));
    }
    public function create(){
        $book = Book::all();
        return view("suppliers.create", compact("book"));
    }
    public function store(Request $request){
        $request->validate([
            "book_id"=> "required",
            "supplier_name"=> "required",
            "quantity"=> "required|numeric",
            "contact_number" => "required",
        ]);
        $supplier = new Supplier();
        $supplier->book_id = $request->book_id;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->quantity = $request->quantity;
        $supplier->contact_number = $request->contact_number;
        $supplier->save();
        return redirect("/suppliers")->with("success","suppliers Added successfully");
    }
    public function edit($id){
        $supplier = Supplier::findOrFail($id);
        $book = Book::all();
        return view("suppliers.edit", compact("supplier","book"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "book_id"=> "required",
            "supplier_name"=> "required",
            "quantity"=> "required|numeric",
            "contact_number" => "required",
        ]);
        $supplier = Supplier::findOrFail($id);
        $supplier->book_id = $request->book_id;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->quantity = $request->quantity;
        $supplier->contact_number = $request->contact_number;
        $supplier->update();
        return redirect("/suppliers")->with("success","Book updated successfully");
    }
    public function destroy($id){
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect("/suppliers")->with("success","Book deleted successfully");
    }
}
