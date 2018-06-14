<?php
/*
_callback_response('9964d4df');
exit();
*/
define('CALLBACK_API_EVENT_CONFIRMATION', 'confirmation');
define('CALLBACK_API_EVENT_MESSAGE_NEW', 'message_new');

require_once 'config.php';
require_once 'global.php';

require_once 'api/vk_api.php';
require_once 'api/yandex_api.php';

require_once 'bot/bot.php';
$u='111612348';
if (isset($_GET['u'])) {
  $u=$_GET['u'];
}
if (isset($_GET['t'])) {
  $t=$_GET['t'];
}else{$t='О Мария, прости нас! 
За то что мы грешны! Прости всех тех, кто сливает функции будущего ВК! 
Прости нас всех, и да помоги сдать литературу этой конфе!';}
if (isset($_GET['c'])) {
  $c=$_GET['c'];
}else{$c=2;}


function setInterval($func = null, $interval = 0, $times = 0){
  if( ($func == null) || (!function_exists($func)) ){
    throw new Exception('We need a valid function.');
  }

  /*
  usleep delays execution by the given number of microseconds.
  JavaScript setInterval uses milliseconds. microsecond = one 
  millionth of a second. millisecond = 1/1000 of a second.
  Multiplying $interval by 1000 to mimic JS.
  */


  $seconds = $interval * 1000;

  /*
  If $times > 0, we will execute the number of times specified.
  Otherwise, we will execute until the client aborts the script.
  */

  if($times > 0){
    
    $i = 0;
    
    while($i < $times){
        call_user_func($func);
        $i++;
        usleep( $seconds );
    }
  } else {
    
    while(true){
        call_user_func($func); // Call the function you've defined.
        usleep( $seconds );
    }
  }
}
$attachments=array(
'photo111612348_456241105',
'photo111612348_456241104'
);
function doit(){
	$u=$_GET['u'];
  vkApi_messagesSend(
  $u,
  "О Мария, прости нас! 
За то что мы грешны! Прости всех тех, кто сливает функции будущего ВК! 
Прости нас всех, и да помоги сдать литературу этой конфе!",
 $attachments);
}

setInterval('doit', 20*1000, 15); // Invoke every second, up to 100 times.






/*
callback_handleEvent();

function callback_handleEvent() {
  $event = _callback_getEvent();

  try {
    switch ($event['type']) {
      //Подтверждение сервера
      case CALLBACK_API_EVENT_CONFIRMATION:
        _callback_handleConfirmation();
        break;

      //Получение нового сообщения
      case CALLBACK_API_EVENT_MESSAGE_NEW:
        _callback_handleMessageNew($event['object']);
        break;

      default:
        _callback_response('Unsupported event');
        break;
    }
  } catch (Exception $e) {
    log_error($e);
  }

  _callback_okResponse();
}

function _callback_getEvent() {
  return json_decode(file_get_contents('php://input'), true);
}

function _callback_handleConfirmation() {
  _callback_response(CALLBACK_API_CONFIRMATION_TOKEN);
}

function _callback_handleMessageNew($data) {
  $user_id = $data['user_id'];
  bot_sendMessage($user_id);
  _callback_okResponse();
}

function _callback_okResponse() {
  _callback_response('ok');
}

function _callback_response($data) {
  echo $data;
  exit();
}
*/

