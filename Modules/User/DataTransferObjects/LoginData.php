<?php


namespace Modules\User\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class LoginData extends DataTransferObject
{
    public string $email;
    public string $password;
}

