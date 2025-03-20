<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function show()
    {
        return view('members', ['members' => Member::query()->get()]);
    }

    public function saveMember(Request $request, SaveMemberAction $action)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:members,email'
        ]);

        $action->execute($request->get('name'), $request->get('email'));

        return redirect()->back();
    }
}
