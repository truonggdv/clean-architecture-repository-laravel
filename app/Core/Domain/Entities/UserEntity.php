<?php

namespace App\Core\Domain\Entities;

class UserEntity
{
    public ?int $id;
    public string $username;
    public string $email;
    public string $password;

    public function __construct(?int $id, string $username, string $email, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
}
