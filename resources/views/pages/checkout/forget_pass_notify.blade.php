<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quên mật khẩu</title>
</head>
<body>
    <div style="max-width: 600px; margin: auto; font-family: Arial, sans-serif; padding: 20px; border: 1px solid #eee; border-radius: 8px; background: #fdfdfd;">
        <h3 style="color: #333;">Yêu cầu đặt lại mật khẩu</h3>

        <p style="font-size: 15px; color: #555;">
            Chào bạn,<br><br>
            Chúng tôi nhận được yêu cầu đặt lại mật khẩu từ địa chỉ email của bạn. Nếu đây là bạn, vui lòng nhấn vào nút bên dưới để tạo mật khẩu mới:
        </p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $data['body'] }}"
               style="display: inline-block; background: #f89c1f; color: #fff; padding: 12px 24px;
                      border-radius: 6px; text-decoration: none; font-weight: bold; transition: background 0.3s;"
               onmouseover="this.style.background='#e78c13'"
               onmouseout="this.style.background='#f89c1f'">
                Đặt lại mật khẩu
            </a>
        </div>

        <p style="font-size: 14px; color: #999;">
            Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này. Liên kết sẽ hết hạn sau một khoảng thời gian nhất định vì lý do bảo mật.
        </p>

        <p style="margin-top: 20px; font-size: 14px; color: #777;">Trân trọng,<br>Đội ngũ hỗ trợ FurryFriend</p>
    </div>

</body>
</html>
