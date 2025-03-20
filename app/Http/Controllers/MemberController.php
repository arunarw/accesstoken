<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller
{
    public function show()
    {
        return view('members', ['members' => Member::query()->get()]);
    }

    public function saveMember(SaveMemberCommand $command, SaveMemberAction $action)
    {
        $action->execute($command);

        return redirect()->back();
    }
}
