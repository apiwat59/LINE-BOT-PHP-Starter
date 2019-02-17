<?php
$access_token = 'mBMq4+bnv+GRs4j+OZq71Hd86b539QhX9fDhf0aME1j+aWe73P/bml5eGNnrCC631NVOe4W10DF9CPk0pIAIoU4jtCaKmqcN+9wlCGyT758C8HEpZZ4m6vwR+jobXHYxOlKuJV2qKS2p3aOZDMTC6wdB04t89/1O/w1cDnyilFU=
';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			if (stripos($text, "ที่ไหน") !== false) {
				$text = "ทุก ๆ ที่น่ะแหละ";
			} elseif (stripos($text, "ใคร") !== false) {
				$text = "ฉันคิดว่าคุณก็รู้อยู่นะ";
			} elseif (stripos($text, "หรอ") !== false) {
				$text = "อืม...ใช่นะ";
			} elseif (stripos($text, "สวัสดี") !== false) {
				$text = "สวัสดีครับ อากาศดีนะครับ";
			} elseif (stripos($text, "help") !== false) {
					$text = "รองรับคำว่า ที่ไหน, ใคร, หรอ, สวัสดี, help, ค้น, หา";
			} elseif (stripos($text, "ช่วยด้วย") !== false) {
				$text = "รองรับคำว่า ที่ไหน, ใคร, หรอ, สวัสดี, help";
			} elseif (stripos($text, "ค้น") !== false) {
				$text = "ได้สิ ลองดูที่ https://www.google.co.th";
			} elseif (stripos($text, "หา") !== false) {
				$text = "ได้สิ ลองดูที่ https://www.google.co.th";
			}
			
			
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
