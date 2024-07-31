<?php

namespace app\services\logger;

use app\models\Log;

class DatabaseLogger extends AbstractLogger
{
    public function __construct()
    {
        $this->type = 'database';
    }

    public function send(string $message): void
    {
        $log = new Log();
        $log->message = $message;
        if (!$log->save()) {
            echo "Failed to save database Log: {$message}\n";
        } else {
            echo "Database Log saved: {$message}\n";
        }
    }
}
