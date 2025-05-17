<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index(){
        $borrows = Borrow::with("books")->get();
        $book = Book::all();
        $member = Member::all();
        return view("borrows.index",compact("borrows","book","member"));
    }
    public function create(){
        $book = Book::all();
        $member = Member::all();
        return view("borrows.create", compact("book", "member"));
    }
    public function store(Request $request){
        $request->validate([
            "book_id"=> "required",
            "member_id"=> "required",
            "quantity"=> "required|numeric",
            "borrow_date"=> "required",
            "return_date" => "required",
            "description"=> "nullable",
        ]);
        $borrow = new Borrow();
        $borrow->book_id = $request->book_id;
        $borrow->member_id = $request->member_id;
        $borrow->quantity = $request->quantity;
        $borrow->borrow_date = $request->borrow_date;
        $borrow->return_date = $request->return_date;
        $borrow->description = $request->description;
        $borrow->save();
        return redirect("/borrows")->with("success","Borrows Added successfully");
    }
    public function edit($id){
        $borrow = Borrow::findOrFail($id);
        $book = Book::all();
        $member = Member::all();
        return view("borrows.edit", compact("borrow","book", "member"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "book_id"=> "required",
            "member_id"=> "required",
            "quantity"=> "required|numeric",
            "borrow_date"=> "required",
            "return_date" => "required",
            "description"=> "nullable",
        ]);
        $borrow = Borrow::findOrFail($id);
        $borrow->book_id = $request->book_id;
        $borrow->member_id = $request->member_id;
        $borrow->quantity = $request->quantity;
        $borrow->borrow_date = $request->borrow_date;
        $borrow->return_date = $request->return_date;
        $borrow->description = $request->description;
        $borrow->update();
        return redirect("/borrows")->with("success","Book updated successfully");
    }
    public function destroy($id){
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        return redirect("/borrows")->with("success","Book deleted successfully");
    }
    public function report(Request $request)
    {
        $period = $request->query('period');
        $now = now();

        $query = Book::with(['suppliers', 'borrows']);

        if ($period === 'weekly') {
            $startDate = $now->copy()->startOfWeek();
            $endDate = $now->copy()->endOfWeek();
            
            $query->whereHas('suppliers', function($q) use ($startDate, $endDate) {
                $q->whereBetween('updated_at', [$startDate, $endDate]);
            })->orWhereHas('borrows', function($q) use ($startDate, $endDate) {
                $q->whereBetween('updated_at', [$startDate, $endDate]);
            });
        } 
        elseif ($period === 'monthly') {
            $startDate = $now->copy()->startOfMonth();
            $endDate = $now->copy()->endOfMonth();
            
            $query->whereHas('suppliers', function($q) use ($startDate, $endDate) {
                $q->whereBetween('updated_at', [$startDate, $endDate]);
            })->orWhereHas('borrows', function($q) use ($startDate, $endDate) {
                $q->whereBetween('updated_at', [$startDate, $endDate]);
            });
        }

        $book = $query->get();
        $borrow = Borrow::with('books', 'members')->get();
        $member = Member::with('borrows')->get();
        $supplier = Supplier::with('books')->get();
        
        return view('report', compact('book', 'borrow', 'supplier', 'member'));
    }
    public function dashboard(){
        $book = Book::all()->count();
        $member = Member::all()->count();
        $supplier = Supplier::all()->count();
        $borrow = Borrow::all()->count();
        return view('dashboard', compact(["book", "supplier", "member", "borrow"]));
    }
    public function datereport(Request $request){
        $request->validate([
            "startDate"=> "required|date",
            "endDate"=> "required|date",
        ]);
        $borrow = Borrow::with('books', 'members')
            ->whereBetween('borrow_date', [$request->startDate, $request->endDate])
            ->get();
        return view('report', compact('borrow'))->with("success", "Report from " . $request->startDate . " to " . $request->endDate);
    }
}
