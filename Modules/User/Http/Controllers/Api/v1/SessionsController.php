<?php

namespace Modules\User\Http\Controllers\Api\v1;

use App\Helpers\ApiResponseHandler;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\User\DataTransferObjects\LoginDto;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Resources\LoginResource;

class SessionsController extends Controller
{
    public function login(LoginRequest $request)
    {
        $userData = new LoginDto($request->all());

        if (Auth::attempt(['email' => $userData->email,'password' => $userData->password])) {

            $user = Auth::user();

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            $user['token'] = $token;

            return ApiResponseHandler::respondWithSuccess(__('auth.success_login'), LoginResource::make($user));
        }

        return ApiResponseHandler::respondWithError(__('auth.failed'), null, 401);
    }

    public function logout()
    {
        request()->user()->currentAccessToken()->delete();

        return ApiResponseHandler::respondWithSuccess(__('auth.logout'), null, Response::HTTP_NO_CONTENT);
    }
}
