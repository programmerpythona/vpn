<?php
// --- НАСТРОЙКИ ---
$subscription_name = "Best_VPN_Ever";
$total_gb = 500; // Всего лимита
$used_gb = 0;  // Сколько потрачено (можно брать из БД)
$expire_date = "2026-01-01"; // Дата конца подписки

// Переводим в байты для заголовка
$total_bytes = $total_gb * 1024 * 1024 * 1024;
$used_bytes = $used_gb * 1024 * 1024 * 1024;
$expire_timestamp = strtotime($expire_date);

// --- ЗАГОЛОВКИ ДЛЯ HAPP (Тот самый секрет полоски трафика) ---
header("Content-Type: text/plain; charset=utf-8");
header("Subscription-Userinfo: upload=0; download={$used_bytes}; total={$total_bytes}; expire={$expire_timestamp}");
header("Profile-Update-Interval: 12");
header("Profile-Title: {$subscription_name}");

// --- СПИСОК СЕРВЕРОВ (ЗАГЛУШКИ + РАБОЧИЕ) ---
// Пишем всё в одну строку через \n
$conf = "ss://YWVzLTI1Ni1nY206aW5mbw==@127.0.0.1:80#📊_Трафик:_$used_gb/500_GB\n";
$conf .= "ss://YWVzLTI1Ni1nY206aW5mbw==@127.0.0.1:80#🆘_Саппорт:_@your_tg\n";
$conf .= "ss://YWVzLTI1Ni1nY206aW5mbw==@127.0.0.1:80#🌐_Сайт:_mysite.com\n";
$conf .= "vless://твой-uuid@://xn----ctbblbu8atcfg.com🇩🇪_Германия_Fast\n";

// Кодируем в Base64, чтобы Happ не подавился
echo base64_encode($conf);
?>
