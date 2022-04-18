<?php

namespace Modules\User\Http\Controllers\Api\v1;

use App\Helpers\ApiResponseHandler;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Actions\LoginAction;
use Modules\User\Http\Requests\LoginRequest;

class SessionsController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = (new LoginAction())($request);

        if ($user && $user['token']) {
            return ApiResponseHandler::respondWithSuccess(__('auth.success_login'), $user);
        }

        return ApiResponseHandler::respondWithError(__('auth.failed'), null, 401);
    }

    public function logout()
    {
        request()->user()->currentAccessToken()->delete();

        return ApiResponseHandler::respondWithSuccess(__('auth.logout'), null, Response::HTTP_NO_CONTENT);
    }
}
