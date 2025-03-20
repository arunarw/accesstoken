<?php

namespace App\Http\Controllers;

use App\Models\Member;

class SaveMemberAction
{
    public function execute(SaveMemberCommand $command)
    {
        Member::query()->create([
            'name' => $command->fullName,
            'email' => $command->email,
        ]);
    }
}
