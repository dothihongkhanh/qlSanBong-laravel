// Hàm để thay đổi đích đến (href) của nút đăng nhập sau khi đăng nhập thành công
function updateLoginButtonHref() {
    const loginButton = document.getElementById('loginButton');
    const loggedInUsername = session('username'); // Thay bằng cách lấy tên người dùng từ phiên làm việc (session)

    if (loggedInUsername) {
        loginButton.href = "{{ route('dashboard') }}"; // Điều hướng đến trang chính sau khi đăng nhập thành công
    }
}

// Simulate a successful login (giả lập đăng nhập thành công)
const isLoggedIn = true; // Điều này có thể dựa trên trạng thái đăng nhập thực tế
if (isLoggedIn) {
    session(['username' => "Tên người dùng đã đăng nhập"]); // Thay bằng cách lưu tên người dùng vào phiên làm việc (session)
    updateLoginButtonHref();
}