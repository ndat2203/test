@extends('admin_layout')
@section('admin_content')
<style>
        .reply-container {
            margin-top: 10px;
        }
        .reply-textarea {
            width: 100%;
            display: none;
            margin-top: 5px;
        }
        .submit-reply {
            display: none;
            margin-top: 5px;
            padding: 8px 15px;
            background-color: #007bff; /* Màu xanh dương */
            color: white;
            border: none;
            border-radius: 5px; /* Bo góc */
            font-size: 0.9em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .submit-reply:hover {
            background-color: #0056b3; /* Màu xanh dương đậm hơn khi hover */
            transform: scale(1.05); /* Phóng to nhẹ khi hover */
        }
        .btn-xs:hover{

            transform: scale(1.05);
        }
</style>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bình luận của khách hàng
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light" id="example">
        <thead>
          <tr>

            <th>Duyệt</th>
            <th>Tên người bình luận</th>
            <th>Bình luận</th>
            <th>Ngày gửi</th>
            <th>Sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th style="width:90px;">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            @foreach($comment as $key => $com)
          <tr>

            <td>
                @if( $com->comment_status == 1 )
                    <input type="button" data-comment_status="0" data-comment_id="{{$com->comment_id}}" id="{{$com->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt ">
                @else
                    <input type="button" data-comment_status="1" data-comment_id="{{$com->comment_id}}" id="{{$com->comment_product_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ duyệt">
                @endif
            </td>
            <td>{{ $com->comment_username }}</td>
            <td>
                {{ $com->comment }}

                <a href="javascript:void(0);" onclick="toggleReplies(this)" style="display: block; margin-top: 5px; color: #007bff; text-decoration: none; font-size: 14px;">
                    Xem phản hồi
                </a>

                <ul class="reply-list" style="display: none; list-style: none; padding-left: 20px; border-left: 2px solid #ddd; margin-top: 10px;">
                    Trả lời:
                    @foreach($comment_rep as $key => $cmt_rep)
                        @if($cmt_rep->comment_parent == $com->comment_id)
                            <li style="margin-bottom: 8px; padding: 2px 12px; background: #f9f9f9; border-radius: 5px; font-size: 14px; color: #555;">
                                {{$cmt_rep->comment}}
                            </li>
                        @endif
                    @endforeach
                </ul>

                <br/>
                @if( $com->comment_status == 0 )
                <a href="#" class="reply-btn">Trả lời</a>
                <div class="reply-container">
                    <textarea class="form-control reply-textarea reply_comment_{{$com->comment_id}}" rows="3" placeholder="Nhập nội dung trả lời..."></textarea>
                    <button class="submit-reply btn-reply-comment" data-comment_id="{{$com->comment_id}}" data-product_id="{{$com->comment_product_id}}">Trả lời bình luận</button>
                </div>
                @endif
            </td>
            <td>{{ $com->comment_date }}</td>
            <td>
                <a href="{{url('/chi-tiet-san-pham/'.$com->product->product_slug)}}" target="_blank">{{ $com->product->product_name }}</a>
            </td>
            <td><img src="public/upload/product/{{ $com->product->product_image }}" height="100" weight="100"></td>
            <td>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" style="font-size: 20px;" href="{{URL::to('/delete-comment/'.$com->comment_id)}}" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                let replyContainer = this.nextElementSibling;
                let textarea = replyContainer.querySelector('.reply-textarea');
                let submitButton = replyContainer.querySelector('.submit-reply');

                this.style.display = 'none'; // Ẩn nút "Trả lời"
                textarea.style.display = 'block'; // Hiện textarea
                submitButton.style.display = 'inline-block'; // Hiện nút "Trả lời bình luận"

                // Khi click ra ngoài thì ẩn textarea và hiển thị lại nút "Trả lời"
                document.addEventListener('click', function closeReply(event) {
                    if (!replyContainer.contains(event.target) && event.target !== button) {
                        textarea.style.display = 'none';
                        submitButton.style.display = 'none';
                        button.style.display = 'inline-block';
                        document.removeEventListener('click', closeReply);
                    }
                });
            });
        });
    });
</script>

<script>
    function toggleReplies(element) {
        var replyList = element.nextElementSibling; // Lấy danh sách ul kế tiếp
        if (replyList.style.display === "none") {
            replyList.style.display = "block";
            element.textContent = "Ẩn phản hồi";
        } else {
            replyList.style.display = "none";
            element.textContent = "Xem phản hồi";
        }
    }
</script>
