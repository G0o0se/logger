<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'logger' => [
        'defaultType' => 'file',
        'email' => 'b0tt0miezz@gmail.com',
        'types' => ['email', 'database', 'file'],
        'logFile' => '@runtime/logs/app.log',
    ]
];
