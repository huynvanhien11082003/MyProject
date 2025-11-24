<?php
// Xử lý POST từ form
header('Content-Type: text/html; charset=utf-8');


function sanitize($s){
return htmlspecialchars(trim($s), ENT_QUOTES, 'UTF-8');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = isset($_POST['name']) ? sanitize($_POST['name']) : '';
$email = isset($_POST['email']) ? sanitize($_POST['email']) : '';
$message = isset($_POST['message']) ? sanitize($_POST['message']) : '';


// Demo: lưu vào file (phù hợp shared hosting). Thực tế dùng DB.
$log = sprintf("[%s] %s <%s>: %s\n", date('Y-m-d H:i:s'), $name, $email, $message);
file_put_contents(__DIR__ . '/messages.log', $log, FILE_APPEND | LOCK_EX);


// Trả về 1 trang kết quả
echo '<!doctype html><html lang="vi"><head><meta charset="utf-8"><title>Đã gửi</title></head><body>';
echo '<h1>Cảm ơn, ' . $name . '!</h1>';
echo '<p>Chúng tôi đã nhận được tin nhắn của bạn.</p>';
echo '<p><a href="../fe/index.html">Quay lại form</a></p>';
echo '</body></html>';
exit;
}


// Nếu không phải POST, redirect về form
header('Location: ../fe/index.html');
exit;