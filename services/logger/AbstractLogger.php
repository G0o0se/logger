<?php

namespace app\services\logger;

use Yii;

abstract class AbstractLogger implements LoggerInterface
{
    protected $type;

    public function sendByLogger(string $message, string $loggerType): void
    {
        if ($this->type === $loggerType) {
            $this->send($message);
        } else {
            $loggerFactory = new LoggerFactory(Yii::$app->params['logger']);
            $logger = $loggerFactory->createLogger($loggerType);
            $logger->send($message);
        }
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
