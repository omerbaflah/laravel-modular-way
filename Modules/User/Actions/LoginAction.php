<?php

namespace Modules\User\Actions;

use Illuminate\Support\Facades\Auth;
use Modules\User\DataTransferObjects\LoginDto;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Resources\LoginResource;

class LoginAction
{
    public function __invoke(LoginRequest $request): ?LoginResource
    {
        $loginDto = new LoginDto($request->validated());

        if (Auth::attempt(['email' => $loginDto->email, 'password' => $loginDto->password])) {
            $user = Auth::user();

            $tokenResult = $user->createToken('Personal Access Token');

            $token = $tokenResult->plainTextToken;

            $user['token'] = $token;

            return LoginResource::make($user);
        }

        return null;
    }
}
