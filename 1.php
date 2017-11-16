
if (!isset($_REQUEST)) {
    return;
}

//Строка для подтверждения адреса сервера из настроек Callback API
$confirmationToken = '3398cab7';

//Ключ доступа сообщества
$token = '6193ca127752f8a681288c89ade74cc67c504bed570bfa05734b5942a603dd7acd91f5a33386152519454';

// Secret key
$secretKey = 'dudoser322';

//Получаем и декодируем уведомление
$data = json_decode(file_get_contents('php://input'));

// проверяем secretKey
if(strcmp($data->secret, $secretKey) !== 0 && strcmp($data->type, 'confirmation') !== 0)
    return;

//Проверяем, что находится в поле "type"
switch ($data->type) {
    //Если это уведомление для подтверждения адреса сервера...
    case 'confirmation':
        //...отправляем строку для подтверждения адреса
        echo $confirmationToken;
        break;
}
