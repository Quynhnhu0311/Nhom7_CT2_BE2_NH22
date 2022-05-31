<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></head>
<body>
    <div class="container" style="background: #222; border-radius: 12px; padding:15px;">
        <div class="col-md-12">
            <p style="text-align: center; color: #fff;">Đây là email tự động. Quý khách vui lòng không trả lời email này.</p>
            <div class="row" style="background: cadetblue; padding: 15px">
                <div class="col-md-6" style="text-align:center;color:#fff;font-weight:bold;font-size:30px;">
                    <h4 style="margin:0">CỬA HÀNG BÁN HÀNG LARAVEL</h4>
                    <h6 style="margin:0">DỊCH VỤ BÁN HÀNG</h6>
                </div>

                <div class="col-md-6 logo" style="color:#fff">
                    <p>Chào bạn <strong style="color:#000;text-decoration:underline"> {{$shipping_array['customer_name']}}  </strong></p>
                </div>

                <div class="col-md-12">
                    <p style="color:#fff;font-size:17px;">Bạn đã đăng ký thông tin dịch vụ như sau :</p>
                    <h4 style="color:#000;text-transform:uppercase;">Thông tin đơn hàng</h4>
                    <p>Mã đơn hàng : <strong style="color:#fff;text-transform:uppercase;">{{ $code['order_code'] }}</strong></p>
                    <p>Mã khuyến mãi áp dụng : <strong style="color:#fff;text-transform:uppercase;"> Không có </strong></p>
                    <p>Dịch vụ : <strong style="color:#fff;text-transform:uppercase;">Đặt hàng online</strong></p>
                    <h4 style="color:#000;text-transform:uppercase;">Thông tin người nhận</h4>
                    <p>Email :
                        @if($shipping_array['shipping_email'] == '')
                            Không có
                        @else
                            <span style="color:#fff">{{ $shipping_array['shipping_email'] }}</span>
                        @endif
                    </p>
                    <p>Họ và tên người gửi :
                        @if($shipping_array['shipping_name'] == '')
                            Không có
                        @else
                            <span style="color:#fff">{{ $shipping_array['shipping_name'] }}</span>
                        @endif
                    </p>
                    <p>Địa chỉ nhận hàng :
                        @if($shipping_array['shipping_address'] == '')
                            Không có
                        @else
                            <span style="color:#fff">{{ $shipping_array['shipping_address'] }}</span>
                        @endif
                    </p>
                    <p>Số điện thoại :
                        @if($shipping_array['shipping_phone'] == '')
                            Không có
                        @else
                            <span style="color:#fff">{{ $shipping_array['shipping_phone'] }}</span>
                        @endif
                    </p>
                    <p>Ghi chú đơn hàng :
                        @if($shipping_array['shipping_note'] == '')
                            Không có
                        @else
                            <span style="color:#fff">{{ $shipping_array['shipping_note'] }}</span>
                        @endif
                    </p>
                    <p style="color:#fff">Nếu thông tin không đúng người nhận hàng không có chúng tôi sẽ liên hệ với người đặt hàng để trao đổi về thông tin đơn hàng đã đặt.</p>
                    <h4 style="color:#000;text-transform:uppercase;">Sản phẩm đã đặt</h4>
                    <table class="table table-striped" style="border:1px">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Số lượng đặt</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sub_total = 0;
                                $total = 0;
                            ?>
                            @foreach($cart_array as $cart)
                                <?php
                                    $sub_total = $cart['product_qty']*$cart['product_price'];
                                    $total += $sub_total;
                                ?>
                                <tr>
                                    <td>{{ $cart['product_name'] }}</td>
                                    <td>{{number_format($cart['product_price'])}} VND</td>
                                    <td>{{ $cart['product_qty'] }}</td>
                                    <td>{{number_format($sub_total)}} VND</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right">Tổng tiền thanh toán : {{number_format($total)}} VND</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p style="color:#fff;text-align:center;font-size:15px;">Xem lại lịch sử đơn hàng đã đặt tại :
                    <a target="_blank" href="{{url('/history')}}">Lịch sử đơn hàng của bạn!</a>
                </p>
                <p style="color:#fff;text-align:center;font-size:15px;">Xin cảm ơn quý khách đã đặt hàng!</p>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA712mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
