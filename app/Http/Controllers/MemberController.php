<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $members = Member::all();
        return view("members.index",compact("members"));
    }
    public function create(){
        return view("members.create");
    }
    public function store(Request $request){
        $request->validate([
            "name"=> "required",
            "role"=> "required",
        ]);
        $member = new Member();
        $member->name = $request->name;
        $member->role = $request->role;
        $member->save();
        return redirect("/members")->with("success","Members Added successfully");
    }
    public function edit($id){
        $member = Member::findOrFail($id);
        return view("members.edit", compact("member"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "name"=> "required",
            "role"=> "required",
        ]);
        $member = Member::findOrFail($id);
        $member->name = $request->name;
        $member->role = $request->role;
        $member->update();
        return redirect("/members")->with("success","Book updated successfully");
    }
    public function destroy($id){
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect("/members")->with("success","Book deleted successfully");
    }
}
