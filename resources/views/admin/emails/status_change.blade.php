<!DOCTYPE html>
<html>

<head>
    <title>Tài khoản đã được xác thực</title>
</head>

<body>
    <p>Xin chào {{ $user->username }},</p>
    <p>Tài khoản của bạn đã được xác thực thành công.</p>
    <p><a href="{{ route('login.index') }}">Mời bạn click vào link để đănng nhập </a></p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
</body>

</html>
