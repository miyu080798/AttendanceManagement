<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class RegisterController extends Controller
{
    public function store(
        RegisterRequest $request,
        CreatesNewUsers $creator,
        StatefulGuard $guard
    )
    {
        $user = $creator->create($request->validated());

        $guard->login($user);

        return redirect('/attendance');
    }
}
