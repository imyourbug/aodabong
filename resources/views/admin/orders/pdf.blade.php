<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xuất PDF</title>
    <style type="text/css">
        .block-top {
            display: flex;
            justify-content: center;
        }

        * {
            font-family: "DejaVu Sans" !important;
        }

        table {
            width: 100%;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div style="height:500px; line-height:20px">
            <table>
                <tr>
                    <td style="text-align:left">
                        <h4>Aodabong.net</h4>
                    </td>
                    <td style="text-align:right">
                        <h4>Chuyên quần áo đá bóng, sản phẩm thể thao</h4>
                    </td>
                </tr>
            </table>
            <br>
            <div style="text-align:center">
                <h4>---------------</h4>
                <h4>HÓA ĐƠN MUA HÀNG</h4>
                <h6>Ngày {{ $customer->created_at->format('d-m-Y') }}</h6>
            </div>
            <div class="content">
                Tên khách hàng: {{ $customer->cus_name }} <br>
                Địa chỉ: {{ $customer->address }}
            </div>
            <br>
            <div style="">
                @php
                    $tt = 1;
                    $total = 0;
                @endphp
                <table border="1px solid black" cellspacing="none">
                    <thead>
                        <th>TT</th>
                        <th>Tên hàng</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </thead>
                    @foreach ($carts as $cart)
                        @php
                            $price = $cart->price_sale == null ? $cart->price : $cart->price_sale;
                        @endphp
                        <tr>
                            <td style="text-align:center">
                                {{ $tt }}
                            </td>
                            <td style="text-align:left">
                                {{ $cart->product->name }}
                            </td>
                            <td style="text-align:center">
                                {{ $cart->quantity }}
                            </td>
                            <td style="text-align:right">
                                {{ number_format($price, 0, ',', '.') }}<sup>đ</sup>
                            </td>
                            <td style="text-align:right">
                                {{ number_format($price * $cart->quantity, 0, ',', '.') }}<sup>đ</sup>
                            </td>
                        </tr>
                        @php
                            $tt++;
                            $total += $price * $cart->quantity;
                            if (!is_null($cart->customer->voucher_id)) {
                                if (!is_null($cart->customer->voucher->id)) {
                                    $discount = ($cart->customer->voucher->discount / 100) * $total;
                                    $total -= $discount;
                                }
                            }
                        @endphp
                    @endforeach
                </table>
            </div>
            <br>
            <div>
                Tổng cộng: {{ number_format($total, 0, ',', '.') }}<sup>đ</sup> <br>
            </div>
            <br>
            <table>

                <tr>
                    <td style="text-align:left">
                        Khách hàng
                    </td>
                    <td style="text-align:right">
                        Cửa hàng trưởng
                    </td>

                </tr>
                <tr>
                    <td style="text-align:left">
                        {{ $customer->cus_name }}

                    </td>
                    <td style="text-align:right">
                        Dương Văn Khải
                    </td>

                </tr>
            </table>
        </div>
    </div>
</body>

</html>
