<?php

namespace App\Http\Controllers;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Unique;

class SaveMemberCommand extends Data
{
    #[MapInputName('name')]
    public string $fullName;

    #[Unique('members', 'email')]
    public string $email;
}
