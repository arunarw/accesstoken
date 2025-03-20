<?php

namespace App\Http\Controllers;

use App\Models\Member;

class DeleteMemberAction
{
    public function execute(Member $member): void
    {
        $member->delete();
    }
}
