<?php
$userFrom = $_POST['userFrom'];
$userWhere = $_POST['userWhere'];
$userAdults = $_POST['userAdults'];
$userChildren = $_POST['userChildren'];
$userChildrensAge = $_POST['userChildrensAge'];
$userDateStart = $_POST['userDateStart'];
$userDateEnd = $_POST['userDateEnd'];
$userDaysStart = $_POST['userDaysStart'];
$userDaysEnd = $_POST['userDaysEnd'];
$userStars = $_POST['userStars'];
$userFood = $_POST['userFood'];
$userBudget = $_POST['userBudget'];
$userWishes = $_POST['userWishes'];
$userName = $_POST['userName'];
$userPhone = $_POST['userPhone'];
$userConnection = $_POST['userConnection'];

$token = "5201665122:AAGYBStTX4mOOEwIXSN9VmGgpu1N6_6YpJQ";
$chat_id = "-732233555"; 
$sitename = "all-tours.by";

$arr = array(
  'Туры: Откуда: ' => $userFrom,
  'Куда: ' => $userWhere,
  'Количество взрослых: ' => $userAdults,
  'Количество детей: ' => $userChildren,
  'Возраст детей: ' => $userChildrensAge,
  'Дата вылета (с): ' => $userDateStart,
  'Дата вылета (по): ' => $userDateEnd,
  'Количество ночей (от): ' => $userDaysStart,
  'Количество ночей (до): ' => $userDaysEnd,
  'Количество звёзд в отеле: ' => $userStars,
  'Тип питания: ' => $userFood,
  'Бюджет: ' => $userBudget,
  'Пожелания: ' => $userWishes,
  'Имя пользователя: ' => $userName,
  'Номер телефона: ' => $userPhone,
  'Желаемый способ связи: ' => $userConnection,
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