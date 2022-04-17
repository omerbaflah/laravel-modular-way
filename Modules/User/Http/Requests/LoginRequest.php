<?php

namespace Modules\User\Http\Requests;

use App\Helpers\ApiResponseHandler;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required','email','max:255'],
            'password' => ['required','min:6'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(ApiResponseHandler::respondWithError($validator->errors()->first(), null,Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
