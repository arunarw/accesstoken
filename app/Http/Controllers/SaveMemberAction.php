<?php

namespace App\Http\Controllers;

use App\Models\Member;

class SaveMemberAction
{
    public function execute(string $name, string $email)
    {
        Member::query()->create([
            'name' => $name,
            'email' => $email,
        ]);
    }
}
