<?php

// Include the autoloader for MadelineProto
require 'vendor/autoload.php';

use danog\MadelineProto\API;

// Path to the session file (this file stores your login session)
$sessionFile = 'session.madeline';

// Create a new MadelineProto API instance
$MadelineProto = new API($sessionFile);

try {

    // Залогиниться как юзер
    $MadelineProto->start();

    //  Получает все чаты
    $chatIds = $MadelineProto->getDialogIds();

    // У меня во время получения данных возникли проблемы, такое ощущение будто пхп не мог правильно
    // распарсить данные, массив проитерировался, но возникали аномалии и часть чатов не получилось обработать
    // не знаю с чем связано, возможно проблемы либы

    foreach ($chatIds as $chatId) {
        dump($chatId);
    }


    // peer - чат айди или имя юзера (в данном случае это айди чата)
    // Возникли такие же проблемы с парсингом данных, часть сообщений утрачивается
    $chatHistory = $MadelineProto->messages->getHistory(
        peer: 915788869
    );
    
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
}