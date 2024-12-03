<?php
// Token bot Telegram Anda
$botToken = "7671569925:AAFuzdEJyaJ2zptFTKVdCEjGG1X1OeS0HpU";
$apiURL = "https://api.telegram.org/bot$botToken/";

// Ambil data dari webhook Telegram
$update = file_get_contents("php://input");
$update = json_decode($update, TRUE);

// Proses pesan yang diterima
if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $text = $update['message']['text'];

    // Jika pesan adalah /start
    if ($text == "/start") {
        $response = "Selamat datang di Chicken Fighter! Pilih ayam Anda untuk memulai!";
        sendMessage($chatId, $response);
    }
}

// Fungsi untuk mengirim pesan
function sendMessage($chatId, $message) {
    global $apiURL;
    $url = $apiURL . "sendMessage?chat_id=$chatId&text=" . urlencode($message);
    file_get_contents($url);
}

?>
