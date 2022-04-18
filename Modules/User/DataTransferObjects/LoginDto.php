<?php


namespace Modules\User\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class LoginDto extends DataTransferObject
{
    /**
     * @var string
     */
    public string $email;
    /**
     * @var string
     */
    public string $password;
}

