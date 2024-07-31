<?php

namespace app\controllers;

use app\services\logger\LoggerFactory;
use Yii;
use yii\web\Controller;

class LoggerController extends Controller
{
    private LoggerFactory $loggerFactory;

    public function __construct($id, $module, $config = [])
    {
        $this->loggerFactory = new LoggerFactory(Yii::$app->params['logger']);
        parent::__construct($id, $module, $config);
    }

    /**
    • Sends a log message to the default logger.
     */
    public function log()
    {
        $logger = $this->loggerFactory->createLogger(Yii::$app->params['logger']['defaultType']);
        $logger->send("Default log message.");
    }

    /**
    • Sends a log message to a special logger.
     *
    • @param string $type
     */
    public function logTo(string $type)
    {
        $logger = $this->loggerFactory->createLogger($type);
        $logger->send("Log message to {$type} logger.");
    }

    /**
    • Sends a log message to all loggers.
     */
    public function logToAll()
    {
        $loggers = Yii::$app->params['logger']['types'];
        foreach ($loggers as $type) {
            $logger = $this->loggerFactory->createLogger($type);
            $logger->send("Log message to {$type} logger.");
        }
    }
}