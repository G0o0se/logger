<?php

namespace app\services\logger;

class LoggerFactory
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function createLogger($type): LoggerInterface
    {
        switch ($type) {
            case 'email':
                return new EmailLogger($this->config['email']);
            case 'database':
                return new DatabaseLogger();
            case 'file':
                return new FileLogger($this->config['logFile']);
            default:
                throw new \Exception("Unsupported logger type: {$type}");
        }
    }
}
