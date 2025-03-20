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

    public function saveMember(Request $request)
    {
        Member::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        return redirect()->back();
    }
}
