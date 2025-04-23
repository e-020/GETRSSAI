<?php
// بداية جلسة cURL
$ch = curl_init();

// تعيين عنوان الطلب ومفتاح API الخاص بك
$url = "https://api.openai.com/v1/chat/completions";
$api_key = " PUT CODE HERE ";

// تعيين رأس الطلب بما يتطلبه API
$headers = array(
  "Content-Type: application/json",
  "Authorization: Bearer " . $api_key
);

// تجهيز بيانات الجسم للطلب
$data = array(
  "model" => "gpt-3.5-turbo",
  "messages" => array(
    array("role" => "system", "content" => "You are a helpful assistant."),
    array("role" => "user", "content" => "هل تستطيع الترجمه من الانجليزيه الي العربيه")
  )
);

// تحويل بيانات الجسم إلى تنسيق JSON
$json_data = json_encode($data);

// تكوين إعدادات cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// إرسال الطلب
$response = curl_exec($ch);

// التحقق من وجود أخطاء في الاتصال
if (curl_errno($ch)) {
  echo "حدث خطأ في الاتصال: " . curl_error($ch);
} else {
  
  // عرض الاستجابة

/*
  echo "<pre>";
  print_r(json_decode(json_encode($response)));
   echo "</pre>";
*/ 

$response_data = json_decode($response, true);

// استخراج قيمة "content"
$content = $response_data['choices'][0]['message']['content'];

// عرض قيمة "content"
echo $content;


}

// إغلاق جلسة cURL
curl_close($ch);
?>