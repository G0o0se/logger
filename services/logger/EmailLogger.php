<?php

namespace app\services\logger;

class EmailLogger extends AbstractLogger
{
    private $email;

    public function __construct($email)
    {
        $this->type = 'email';
        $this->email = $email;
    }

    public function send(string $message): void
    {
        echo "Email to {$this->email}: {$message}\n";
    }
}
