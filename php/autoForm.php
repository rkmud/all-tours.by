<?php
//Сбор данных из полей формы. 
$userAutoWhere = $_POST['userAutoWhere'];
$userAutoAdults = $_POST['userAutoAdults'];
$userAutoChildren = $_POST['userAutoChildren'];
$userAutoChildrensAge = $_POST['userAutoChildrensAge'];
$userAutoDateStart = $_POST['userAutoDateStart'];   
$userAutoDateEnd = $_POST['userAutoDateEnd'];
$userAutoDaysStart = $_POST['userAutoDaysStart'];
$userAutoDaysEnd = $_POST['userAutoDaysEnd'];
$userAutoWishes = $_POST['userAutoWishes'];
$userAutoName = $_POST['userAutoName'];
$userAutoPhone = $_POST['userAutoPhone'];
$userAutoConnection = $_POST['userAutoConnection'];

$token = "5201665122:AAGYBStTX4mOOEwIXSN9VmGgpu1N6_6YpJQ"; // Тут пишем токен
$chat_id = "-732233555"; // Тут пишем ID группы, куда будут отправляться сообщения
$sitename = "all-tours.by"; //Указываем название сайта

$arr = array(
  'АВТОТуры: Куда: ' => $userAutoWhere,
  'Количество взрослых: ' => $userAutoAdults,
  'Количество детей: ' => $userAutoChildren,
  'Возраст детей: ' => $userAutoChildrensAge,
  'Дата вылета (с): ' => $userAutoDateStart,
  'Дата вылета (по): ' => $userAutoDateEnd,
  'Количество дней (от): ' => $userAutoDaysStart,
  'Количество дней (до): ' => $userAutoDaysEnd,
  'Пожелания: ' => $userAutoWishes,
  'Имя пользователя: ' => $userAutoName,
  'Номер телефона: ' => $userAutoPhone,
  'Желаемый способ связи: ' => $userAutoConnection,
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A"; 
};

foreach($arr as $key => $value) {
  $txtMail .= $key.":".$value."\r\n";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

mail('tui.gomel@mail.ru', 'Tour', $txtMail);

?>