// Gửi form bằng cách thông thường (submit) hoặc bạn có thể dùng fetch/AJAX.
// Ở demo này giữ submit HTML thông thường (form action trỏ tới be/submit.php).


// Tuy nhiên ta sẽ bắt event submit để hiển thị thông báo nhanh trên client.
const form = document.getElementById('contactForm');
const result = document.getElementById('result');
form.addEventListener('submit', (e) => {
// Không chặn submit — vẫn gửi tới server. Thông báo nhanh cho người dùng.
result.textContent = 'Đang gửi... (sẽ chuyển tới server)';
});