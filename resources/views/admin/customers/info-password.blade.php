<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        body {
            text-align: center;
        }

    </style>
</head>

<body>
    <p>Mật khẩu mới đã được gửi về <a href="https://mail.google.com/">{{ $email }}</a></p>
    <a href="{{ route('login') }}">Quay lại trang đăng nhập</a>
</body>

</html>
