<?php
session_start();
ob_start();
include "lib.php";
include "config.php";
$admin = "6766569559";
function bot($method, $datas = [])
{
  $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
  $res = curl_exec($ch);
  if (curl_error($ch)) {
    var_dump(curl_error($ch));
  } else {
    return json_decode($res);
  }
}

$replyc = json_encode([
  'resize_keyboard' => false,
  'force_reply' => true,
  'selective' => true
]);

$update = json_decode(file_get_contents('php://input'));
$efede = json_decode(file_get_contents('php://input'), true);
$message = $update->message;

//files
$text = $message->text;
$usertext = $update->message->text;
$photo = $update->message->photo;
$gif = $update->message->animation;
$video = $update->message->video;
$music = $update->message->audio;
$voice = $update->message->voice;
$sticker = $update->message->sticker;
$document = $update->message->document;

//group
$ctitle = $update->message->chat->title;
$cuname = $update->message->chat->username;
$chat_id = $update->message->chat->id;
$cid = $update->message->chat->id;
$turi = $update->message->chat->type;

$data = $update->callback_query->data;
$qid = $update->callback_query->id;
$callcid = $update->callback_query->message->chat->id;
$clid = $update->callback_query->from->id;
$callmid = $update->callback_query->message->message_id;
$gid = $update->callback_query->message->chat->id;

//user
$ufname = $update->message->from->first_name;
$uname = $update->message->from->last_name;
$ulogin = $update->message->from->username;
$user_id = $update->message->from->id;

//reply

$id = $message->reply_to_message->from->id;
$repmid = $message->reply_to_message->message_id;
$repname = $message->reply_to_message->from->first_name;
$repulogin = $message->reply_to_message->from->username;
$reply = $message->reply_to_message;
$sreply = $message->reply_to_message->text;
$mes_id = $update->message->message_id;

$mes_idd = $message->message_id;
$from_id = $message->from->id;
$mid = $message->message_id;
$amid = $message->admin->message_id;
$forid = $update->message->forward_from->message_id;
$edname = $editm->from->first_name;
$forward = $update->message->forward_from;
$editm = $update->edited_message;
$fadmin = $message->from->id;
//bu yerni o'zgartirishingiz mumkin.
$fadmin = $message->from->id;
$from = $message->from;

$new_chat_members = $message->new_chat_member->id;
$new_fname = $message->new_chat_member->first_name;
$username = $message->from->username;
$fname = $message->from->first_name;
$lname = $message->from->last_name;
$is_bot = $message->new_chat_member->is_bot;
function inlinekeyboard($i, $t, $k)
{
  bot('sendMessage', [
    'chat_id' => $i,
    'text' => "$t",
    'parse_mode' => "HTML",
    'reply_to_message_id' => $mes_id,
    'reply_markup' => json_encode([
      'inline_keyboard' => $k,
      "resize_keyboard" => true,
      'one_time_keyboard' => false,
    ])
  ]);
}

$come = file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getMe");
$deco = json_decode($come, true);
$botid = $deco["result"]["id"];
$botusername = $deco["result"]["username"];
if ($text == "/start" or substr($text, 0, 6) == "/start") {
  $ids = explode(" ",$text);
  $id = $ids[1];
  $checkfile="Admin/already/$from_id.txt";
  $balancefile="Admin/balance/$from_id.txt";

action($from_id, "typing");
  if($id !=""){
  if(file_exists($checkfile)){
      $dextwr = " hello ";
   // Message($from_id,"<b>⛔️ You Have already Started the Bot</b>");
  }else{
    file_put_contents("Admin/already/$from_id.txt","");
    file_put_contents($balancefile,"0")
;  
    $old=file_get_contents ("Admin/total/users.txt");
    file_put_contents ("Admin/total/users.txt",$old+1);
    if($from_id ==$id){Message($from_id,"❌️ You Cannot Invite Yourself");}else{
       $refuser=file_get_contents("Admin/balance/$id.txt");
    file_put_contents ("Admin/balance/$id.txt",$refuser+$per_refer);
          Message($from_id,"<b>🚀 You Wre Refered By $id</b>");
    Message($id,"<b>New Referrral $from_id +$per_refer $ </b>");
    }
  }
}else{
  if(file_exists($checkfile)){
      $dexter= "hello";
  //  Message($from_id,"<b>⛔️ You Have already Started the Bot</b>");

  }else{
   file_put_contents("Admin/already/$from_id.txt","");
    file_put_contents ($balancefile,"0");
        $old=file_get_contents ("Admin/total/users.txt");
    file_put_contents ("Admin/total/users.txt",$old+1);
  }
  }
    $adddata = "✉️";
    keyboard($from_id, $adddata, [[["text" => "✅ Retry!"]]]);    
        $msg = "<b>👋 Hey Zero 

 This Is Free Number Claim Bot 💌

• Instagram
• Telegram
• WhatsApp
• Gmail
• Snapchat
• Other

✉️ You Can Get Any Application Free Number With Lifetime OTP Service</b>";
    $keyboard = json_encode([
        "inline_keyboard" => [
            [
                ["text" => "Channel 1!", "url" => "https://t.me/DexterProONly"], ["text" => "Channel 2!", "url" => "https://t.me/OnionXNep7"]
            ], 
                            [
                                ["text" => "Channel 3!", "url" => "https://t.me/Onionx0"], ["text" => "Channel 4!", "url" => "https://t.me/Onionx0"]
                            ]
        ]
    ]);


    $photoUrl = 'https://telegra.ph/file/b87d6ebfa4d69b7797697.jpg';

    $sendMessageUrl = "https://api.telegram.org/bot" . API_KEY . "/sendPhoto";
    $parameters = [
        'chat_id' => $from_id,
        'photo' => $photoUrl,
        'caption' => $msg,
        'parse_mode' => 'HTML',
        'reply_markup' => $keyboard
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $sendMessageUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);
    
}
  if($text=='✅ Retry!'){
  action($from_id, "typing");
    $sts=joincheck($from_id, $channel);
    if(($sts=="member") || ($sts=="administrator") || ($sts=="creator")){

        $msgg= "<b>Hey $fname $lname You Are Most Welcome To Our Bot.</b>";

        keyboard($from_id, $msgg, [[["text"=>"About Bot"]]]);
        $msg = "<b>Choice Application Where You Want Free Temporary Number 📬</b>";

$keyboard = json_encode([
    "inline_keyboard" => [
        [
            ["text" => "Amazon", "callback_data" => "suicr1"],
            ["text" => "Telegram", "callback_data" => "suicr2"]
        ],
        [
            ["text" => "Instagram", "callback_data" => "suicr3"],
            ["text" => "WhatsApp", "callback_data" => "suicr4"]], 
                        [["text" => "Snapchat", "callback_data" => "suicr5"], 
                        ["text" => "Gmail", "callback_data" => "suicr6"]
        ], 
                        [["text" => "Others", "callback_data" => "suicr7"]]
    ]
]);

$sendMessageUrl = "https://api.telegram.org/bot" . API_KEY . "/sendMessage";
$parameters = [
    'chat_id' => $from_id,
    'text' => $msg,
    'parse_mode' => 'HTML',
    'reply_markup' => $keyboard
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $sendMessageUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);
    }else{
  Message($from_id,"<b>🔴 You Must Join all our channel before using my service....\n\nClick On '✅ Retry!' To Continue The Check Process. </b>");
    }
  }


          if($text =="/stats"){
        $po=file_get_contents ("Admin/total/payout.txt");
         $usrs=file_get_contents("Admin/total/users.txt");
         Message($from_id,"<b>Bot Status\n\nTotal Users-> $usrs Users</b>");
          }

if($text=="/invite"){
    $bal=file_get_contents("Admin/balance/$from_id.txt");
  Message($from_id, "<b>• Total Invite $bal/10\n\n🔎Welcome To Invite Section\n\n📇 Your Invite Link:https://t.me/$botusername?start=$from_id\n\n💴 Invite Your Friends And Earn $per_refer $</b>") ;
}

if($text=="About Bot"){
  Message($from_id, "<b>This Bot Was Created / Developed By @SandeepKhadka7
  
  Other Commands -> 
  /stats - To Check Bot Users
  /invite - To Get Refer link</b>");
}

  function processUpdate($update) {
      if (isset($update["message"])) {
          $text = $update["message"]["text"];
          $from_id = $update["message"]["from"]["id"];

          addUser($from_id);

          if ($text == "/broadcast") {
              if ($from_id == " 6766569559") {
                  $button = [
                      [
                          'text' => 'Send Broadcast',
                          'callback_data' => 'send_broadcast'
                      ]
                  ];
                  sendInlineKeyboard($from_id, $button, "Press the button to send a broadcast message.");
              }
          } elseif (strpos($text, "/sendbroadcast ") === 0) {
              if ($from_id == " 6766569559") {
              $message = substr($text, 15);
              broadcastMessage($message);
              sendMessage($from_id, "Broadcast message sent.");
              }
          }
      } elseif (isset($update["callback_query"])) {
          $callback_data = $update["callback_query"]["data"];
          $from_id = $update["callback_query"]["from"]["id"];

          if ($callback_data == "get_otp") {
              $button = [
                  [
                      'text' => 'Hurry Up 💡',
                      'callback_data' => 'invite'
                  ]
              ];
              sendInlineKeyboard($from_id, $button, "*First Invite 10 User's For Get Free OTP 📥\n\nUse /invite Command For Complete 10 Invite*");
          } elseif ($callback_data == "invite") {
              $bal=file_get_contents("Admin/balance/$from_id.txt");
              sendMessage($from_id, "*• Total Invite $bal/10\n\n🔎Welcome To Invite Section\n\n📇 Your Invite Link:https://t.me/$botusername?start=$from_id\n\n💴 Invite Your Friends And Earn 1 $*");
          } elseif ($callback_data == "send_broadcast") {
              sendMessage($from_id, "Please send the broadcast message in the format: /sendbroadcast <message>");
          } elseif ($callback_data == "suicr1"){
              sendMessage ($from_id,"*Processing..!*");
              sendMessage ($from_id,"*Processing..!*");
              sendMessage ($from_id,"*Country Code: +91*");
              sendMessage ($from_id,"*Your Number Has Been Generated 👇*");
              $rnd = mt_rand(7000056065, 9999999990);
              $button = [
              [
              'text' => 'Get OTP 📬',
              'callback_data' => 'get_otp'
              ]
              ];
              sendInlineKeyboard($from_id, $button, "*+91" . $rnd . "*");
              
                  
          } elseif ($callback_data == "suicr2"){
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Country Code: +91*");
                sendMessage ($from_id,"*Your Number Has Been Generated 👇*");
                $rnd = mt_rand(7000056065, 9999999990);
                $button = [
                [
                'text' => 'Get OTP 📬',
                'callback_data' => 'get_otp'
                ]
                ];
                sendInlineKeyboard($from_id, $button, "*+91" . $rnd . "*");


            } elseif ($callback_data == "suicr3"){
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Country Code: +91*");
                sendMessage ($from_id,"*Your Number Has Been Generated 👇*");
                $rnd = mt_rand(7000056065, 9999999990);
                $button = [
                [
                'text' => 'Get OTP 📬',
                'callback_data' => 'get_otp'
                ]
                ];
                sendInlineKeyboard($from_id, $button, "*+91" . $rnd . "*");


            } elseif ($callback_data == "suicr4"){
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Country Code: +91*");
                sendMessage ($from_id,"*Your Number Has Been Generated 👇*");
                $rnd = mt_rand(7000056065, 9999999990);
                $button = [
                [
                'text' => 'Get OTP 📬',
                'callback_data' => 'get_otp'
                ]
                ];
                sendInlineKeyboard($from_id, $button, "*+91" . $rnd . "*");


            } elseif ($callback_data == "suicr5"){
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Country Code: +91*");
                sendMessage ($from_id,"*Your Number Has Been Generated 👇*");
                $rnd = mt_rand(7000056065, 9999999990);
                $button = [
                [
                'text' => 'Get OTP 📬',
                'callback_data' => 'get_otp'
                ]
                ];
                sendInlineKeyboard($from_id, $button, "*+91" . $rnd . "*");


            } elseif ($callback_data == "suicr6"){
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Country Code: +91*");
                sendMessage ($from_id,"*Your Number Has Been Generated 👇*");
                $rnd = mt_rand(7000056065, 9999999990);
                $button = [
                [
                'text' => 'Get OTP 📬',
                'callback_data' => 'get_otp'
                ]
                ];
                sendInlineKeyboard($from_id, $button, "*+91" . $rnd . "*");


            } elseif ($callback_data == "suicr7"){
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Processing..!*");
                sendMessage ($from_id,"*Country Code: +91*");
                sendMessage ($from_id,"*Your Number Has Been Generated 👇*");
                $rnd = mt_rand(7000056065, 9999999990);
                $button = [
                [
                'text' => 'Get OTP 📬',
                'callback_data' => 'get_otp'
                ]
                ];
                sendInlineKeyboard($from_id, $button, "*+91" . $rnd . "*");


            }

          answerCallbackQuery($update["callback_query"]["id"]);
      }
  }

  function addUser($user_id) {
      $users = getUsers();
      if (!in_array($user_id, $users)) {
          file_put_contents(USERS_FILE, $user_id . PHP_EOL, FILE_APPEND);
      }
  }

  function getUsers() {
      if (!file_exists(USERS_FILE)) {
          return [];
      }
      return array_filter(explode(PHP_EOL, file_get_contents(USERS_FILE)));
  }

  function broadcastMessage($message) {
      $users = getUsers();
      foreach ($users as $user_id) {
          if (!empty($user_id)) {
              sendMessage($user_id, $message);
          }
      }
  }

  function sendInlineKeyboard($chat_id, $button, $text) {
      $url = "https://api.telegram.org/bot" . API_KEY . "/sendMessage";
      $post_fields = [
          'chat_id' => $chat_id,
          'text' => $text,
          'parse_mode' => 'Markdown',
          'reply_markup' => json_encode(['inline_keyboard' => [$button]])
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
      $output = curl_exec($ch);
      curl_close($ch);

      return $output;
  }

  function sendMessage($chat_id, $text) {
      $url = "https://api.telegram.org/bot" . API_KEY . "/sendMessage";
      $post_fields = [
          'chat_id' => $chat_id,
          'text' => $text,
          'parse_mode' => 'Markdown'
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
      $output = curl_exec($ch);
      curl_close($ch);

      return $output;
  }

  function answerCallbackQuery($callback_query_id) {
      $url = "https://api.telegram.org/bot" . API_KEY . "/answerCallbackQuery";
      $post_fields = [
          'callback_query_id' => $callback_query_id
      ];

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
      $output = curl_exec($ch);
      curl_close($ch);

      return $output;
  }

  $update = json_decode(file_get_contents('php://input'), TRUE);
  processUpdate($update);

  ?>