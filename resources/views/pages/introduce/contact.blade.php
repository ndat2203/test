@extends('welcome')
@section('content')

<div class="features_items"><!--features_items-->
  <h2 class="title text-center">Liên hệ với FurryFriend</h2>

    <div style="background: #f9f9f9; padding: 25px; border-radius: 15px;">
        <p style="font-size: 16px; color: #555;">
            Nếu bạn có bất kỳ câu hỏi nào về sản phẩm, dịch vụ hoặc muốn hợp tác cùng chúng tôi, đừng ngần ngại liên hệ nhé!
        </p>

        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-6">
                <form action="{{ url('/gui-lien-he') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ tên:</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ tên của bạn" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Nội dung:</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Nội dung tin nhắn" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning" style="border-radius: 25px;">Gửi liên hệ</button>
                </form>
            </div>

            <div class="col-sm-6">
                <h4>Thông tin liên hệ</h4>
                <ul style="list-style: none; padding: 0; font-size: 15px;">
                    <li><strong>📍 Địa chỉ:</strong> 9 Ngõ 101 Nguyễn Đạo An, Phú Diễn, Bắc Từ Liêm, Hà Nội</li>
                    <li><strong>📞 Điện thoại:</strong> 0867584717</li>
                    <li><strong>✉️ Email:</strong> furryfriend@gmail.com</li>
                    <li><strong>🕐 Giờ làm việc:</strong> 08:00 - 20:00 (Thứ 2 - Chủ nhật)</li>
                </ul>

                <div style="margin-top: 15px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d553.4992184813427!2d105.75927469230241!3d21.053320005725624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454dd70d387ab%3A0x24ce05baa53824b0!2zNTIgSOG6u20gMTkzLzIyMC81MCwgUGjDuiBEaeG7hW4sIELhuq9jIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1744112679735!5m2!1svi!2s"
                    width="100%" height="250" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
