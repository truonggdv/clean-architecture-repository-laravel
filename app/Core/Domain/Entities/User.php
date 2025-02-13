<?php

namespace App\Core\Domain\Entities;

class UserEntity
{
    public ?int $id;
    public string $name;
    public string $email;
    public string $password;

    public function __construct(?int $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
