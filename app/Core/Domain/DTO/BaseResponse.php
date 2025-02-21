<?php

namespace App\Core\Domain\DTO;

class BaseResponse
{
    public bool $success;
    public $data;  // Không chỉ định kiểu để hỗ trợ PHP 7.4
    public ?string $message;
    public ?int $code;

    public function __construct(bool $success, $data = null, ?string $message = null, ?int $code = null)
    {
        $this->success = $success;
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
    }

    public static function success($data = null, string $message = "Thành công", int $code = 200): self
    {
        return new self(true, $data, $message, $code);
    }

    public static function error(string $message, int $code = 400): self
    {
        return new self(false, null, $message, $code);
    }
}
