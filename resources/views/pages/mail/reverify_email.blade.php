<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Chào bạn!</h2>
    <p>Vui lòng nhấn vào nút bên dưới để xác minh địa chỉ email của bạn:</p>
    <p><a href="{{ $verify_url }}" style="display: inline-block; padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">Xác minh email</a></p>
    <p>Hoặc bạn có thể copy link sau và dán vào trình duyệt:</p>
    <p>{{ $verify_url }}</p>
</body>
</html>
