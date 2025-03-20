<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Response;

class MemberController extends Controller
{
    public function show()
    {
        return view('members');
    }

    public function saveMember(SaveMemberCommand $command, SaveMemberAction $action)
    {
        $action->execute($command);

        return response()->json([], Response::HTTP_CREATED);
    }

    public function deleteMember(Member $member, DeleteMemberAction $deleteMemberAction)
    {
        $deleteMemberAction->execute($member);

        return response()->json([], Response::HTTP_CREATED);
    }
}
