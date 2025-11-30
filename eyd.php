<?php
/*
طراح:
T.me/SoltanBahman
گروه ایرانیان هکر:
T.me/IraniannnHacker
*/
/*=================*/
$Token = "945596749:AAGOTVESVpgOik9W22jCu3qtT5i2SOMu9pM"; //توکنتون
$taghvim = "2026-03-20"; //روز عید به تقویم انگلیسی
$saal = "1405"; //سال مورد نظر
$saat = "18:15:59"; //ساعت عید
$channel = "IraniannnHacker"; //ایدی کانالتون بدون @
$banner = "https://t.me/IraniannnHacker"; //لینک عکس کانالتون
//بخش جدید
$dayput = "بعد از ظهر جمعه"; //زمان تحویل از لحاض صبح و ظهر و شب
$dayname = "جمعه"; //نام روز هفته
$timefa = "هجده و پانزده دقیقه و پنجاه و نه ثانیه "; //زمان تحویل به فارسی
$timeshamsi = "جمعه 29 اسفند 1404 هجری شمسی مطابق با 30 رمضان 1447 هجری قمری"; //زمان شمسی
$timemiladi = "20 مارس 2026 میلادی"; //زمان میلادی
/*=================*/
define("API_KEY","$Token");
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//
$seconds = strtotime("$taghvim $saat") - time();
$days = floor($seconds / 86400);
$seconds %= 86400;
$hours = floor($seconds / 3600);
$seconds %= 3600;
$minutes = floor($seconds / 60);
$seconds %= 60;
//
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id= $message->from->id;
$text = $message->text;
$message_id = $message->message_id;
$data = $update->callback_query->data;
$inid = $update->callback_query->from->id;
$msg_id = $update->callback_query->message->message_id;
$inmsgid = $update->callback_query->inline_message_id;
if($text == "/start"){
	bot("sendMessage",[
	"chat_id"=>$chat_id,
	"text"=>"👇زمان تحویل سال $saal در تمام کشور ها 👇

🏞$dayput ساعت $timefa
⏰ $saat

🎇 $timeshamsi
🏙 : $timemiladi

〰〰〰〰〰〰〰
🚀تا سال $saal هنوز $days روز و $hours ساعت و $minutes دقیقه و $seconds ثانیه باقی مانده.

⚠️میتوانید از دکمه زیر تایمر بالا را بروز کنید یا برای دوستانتون هم این پیام رو ارسال کنید.",
	"parse_mode"=>"MarkDown",
	"reply_markup" => json_encode([
			"resize_keyboard" => true,
			"inline_keyboard" => [
					[
							["text" => "🔄به روز رسانی🔄", "callback_data" => "update"]
					],
					[
						 ["text" => "✏️ارسال به گروه يا كانال ديگر", "switch_inline_query" => ""]
					]
			]
	])
	]);
}
if($data == "update"){
	bot("answerCallbackQuery",[
		"callback_query_id"=>$update->callback_query->id,
		"text"=>"آپديت شد🔖",
	]);
	bot("editmessagetext", [
			"chat_id"=>$inid,
			"text"=>"👇زمان تحویل سال $saal در تمام کشور ها 👇

🏞$dayput ساعت $timefa
⏰ $saat

🎇 $timeshamsi
🏙 : $timemiladi

〰〰〰〰〰〰〰
🚀تا سال $saal هنوز $days روز و $hours ساعت و $minutes دقیقه و $seconds ثانیه باقی مانده.

⚠️میتوانید از دکمه زیر تایمر بالا را بروز کنید یا برای دوستانتون هم این پیام رو ارسال کنید.


طراح این ربات: @SoltanBahman",


		"message_id"=>$msg_id,
		"parse_mode"=>"MarkDown",
		"reply_markup"=>json_encode([
				"resize_keyboard"=>true,
				"inline_keyboard"=>[
						[
								["text" => "🔄به روز رسانی🔄", "callback_data" => "update"]
						],
						[
							 ["text" => "✏️ارسال به دیگران", "switch_inline_query" => ""]
						]
				]
		])
		]);
}
/*
coded by @SoltanBahman
channel @IraniannnHacker
*/
if(isset($update->inline_query)){
  bot("answerInlineQuery",[
    "inline_query_id"=>$update->inline_query->id,
    "results"=>json_encode([[
      "type"=>"article",
      "id"=>base64_encode(rand(5,555)),
      "title"=>"ارسال به اين اين گپ😃",
      "input_message_content"=>["parse_mode"=>"MarkDown","message_text"=>"👇زمان تحویل سال $saal در تمام کشور ها 👇

🏞$dayput ساعت $timefa
⏰ $saat

🎇 $timeshamsi
🏙 : $timemiladi

〰〰〰〰〰〰〰
🚀تا سال $saal هنوز $days روز و $hours ساعت و $minutes دقیقه و $seconds ثانیه باقی مانده.

⚠️میتوانید از دکمه زیر تایمر بالا را بروز کنید یا برای دوستانتون هم این پیام رو ارسال کنید."],
      "thumb_url"=>"$banner",
      "reply_markup"=>["inline_keyboard"=>[
				[
					["text"=>"🔄به روز رسانی🔄","callback_data"=>"update2"]
				],
				[
					["text"=>"✏️ارسال به دیگران","switch_inline_query"=>""]]]]
    ],[
      "type"=>"article",
      "id"=>base64_encode(rand(5,555)),
      "title"=>"كانال ما👾",
      "input_message_content"=>["parse_mode"=>"MarkDown","message_text"=>"براى ورود به كانال روى دكمه زير كليك كنيد🤒"],
      "thumb_url"=>"$banner",
      "reply_markup"=>["inline_keyboard"=>[
				[
					["text"=>"ورود به كانال🤧","url"=>"t.me/$channel"]
				],
				[
					["text"=>"✏️نشر","switch_inline_query"=>""]]]]
    ]])
  ]);
}
if($data == "update2"){
	bot("answerCallbackQuery",[
		"callback_query_id"=>$update->callback_query->id,
		"text"=>"✏️آپديت شد",
	]);
	bot("editmessagetext", [
			"text"=>"👇زمان تحویل سال $saal در تمام کشور ها 👇

🏞$dayput ساعت $timefa
⏰ $saat

🎇 $timeshamsi
🏙 : $timemiladi

〰〰〰〰〰〰〰
🚀تا سال $saal هنوز $days روز و $hours ساعت و $minutes دقیقه و $seconds ثانیه باقی مانده.

⚠️میتوانید از دکمه زیر تایمر بالا را بروز کنید یا برای دوستانتون هم این پیام رو ارسال کنید.",
		"inline_message_id"=>$inmsgid,
		"parse_mode"=>"MarkDown",
		"reply_markup"=>json_encode([
				"inline_keyboard"=>[
						[
								["text" => "🔄به روز رسانی🔄", "callback_data" => "update2"]
						],
						[
							 ["text" => "✏️ارسال به دیگران", "switch_inline_query" => ""]
						]
				]
		])
		]);
}
 ?>
/*
طراح:
T.me/SoltanBahman
گروه ایرانیان هکر:
T.me/IraniannnHacker
*/