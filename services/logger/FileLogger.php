<?php

namespace app\services\logger;

class FileLogger extends AbstractLogger
{
    private $logFile;

    public function __construct($logFile)
    {
        $this->type = 'file';
        $this->logFile = $logFile;
    }

    public function send(string $message): void
    {
        $dateTime = date('Y-m-d H:i:s');
        $logMessage = "[{$dateTime}] {$message}\n";
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
        echo "File Log saved: {$logMessage}\n";
    }
}
