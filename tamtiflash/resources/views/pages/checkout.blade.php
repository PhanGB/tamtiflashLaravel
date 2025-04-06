@extends('layouts.app')
@section('title', 'Thanh toán')

@section('content')
    @vite('resources/css/payment.css')
    <!-- Start main -->
    <div class="banner">
        <h2 class="banner-title">Thanh toán</h2>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="payment-body">
        <div class="grid wide">
            <div class="row">
                <div class="col l-7 m-12 c-12">
                    <form class="checkout-form" action="{{ url('/checkout/process') }}" method="POST">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <p style="color: red; font-size: 15px;">*chú ý chọn đúng địa chỉ giao hàng</p>
                        <div class="address">
                            <div class="address-bar">
                                <span class="address-icon"><i class="fa-solid fa-location-dot"></i></span>
                                @if (!empty($address))
                                    <select name="address" id="userCoor" class="select-address">
                                        <option value="">Chọn địa chỉ giao hàng</option>
                                        @foreach ($address as $a)
                                            @if ($a->id_user == $user->id)
                                                <option value="{{ $a->coordinates }}" selected>{{ $a->address }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @else
                                    <select name="address" id="userCoor" class="select-address">
                                        <option value="">Vui lòng cập nhật địa chỉ trong thông tin cá nhân</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group-half">
                                <label>Họ và tên <span class="required">*</span></label>
                                <input type="text" value="{{ $user->name }}" required />
                            </div>
                            <div class="input-group-half">
                                <label>Số điện thoại <span class="required">*</span></label>
                                <input type="tel" value="{{ $user->phone }}" required />
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Ghi chú</label>
                            <input type="text" name="note" />
                        </div>
                        <div class="payment-method">
                            <label>Phương thức thanh toán <span class="required">*</span></label>
                            <div class="payment-options">
                                <label class="payment-option">
                                    <input type="radio" name="method" value="cod" required checked />
                                    <img src="../images/icons/cod-icon.svg" alt="COD" />
                                    Thanh toán khi giao hàng (COD)
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="method" value="bank_transfer" />
                                    <img src="../images/icons/bank-icon.svg" alt="Bank Transfer" />
                                    Chuyển khoản qua ngân hàng
                                </label>
                            </div>
                        </div>
                        <!-- Thông tin chuyển khoản -->
                        <div id="bank-info"
                            style="display: none; margin-top: 20px; border: 1px solid #ccc; padding: 15px; border-radius: 10px; font-size: 18px;">
                            <h3>Thông tin chuyển khoản</h3>
                            <p><strong>Ngân hàng:</strong> {{ $banking->name_bank }}</p>
                            <p><strong>Tên chủ tài khoản:</strong> {{ $banking->name }}</p>
                            <p><strong>Số tài khoản:</strong> {{ $banking->acc_number }}</p>
                            <p><strong>Nội dung chuyển khoản:</strong> Thanh toán đơn hàng từ khách hàng <span
                                    style="color: red;">{{ $user->name }}</span> </p>
                            <p style="color: red;">*Lưu ý: Đơn hàng có thể được xác nhận trong vài phút</p>
                            <img src="{{ asset("images/bank/{$banking->qr_img}") }}" alt="Mã QR Chuyển khoản"
                                style="width: 200px; height: 200px; margin-top: 10px;">
                        </div>

                        <div class="buttons">
                            <a href="/cart" class="back-link">Quay lại giỏ hàng</a>
                            <input id="total-hidden" type="hidden" name="total" value="0">
                            <input id="shipping_fee-hidden" type="hidden" name="shipping_fee" value="0">
                            <p id="distance-warning" style="display:none; color: red; margin-top: 10px; font-size: 15px;">
                                Khoảng cách quá 12km, không thể giao hàng
                            </p>
                            <button type="submit" class="submit-btn">Thanh toán</button>
                        </div>
                    </form>
                </div>
                <div class="col l-5 m-12 c-12">
                    <div class="cart-container">
                        @foreach ($cart as $item)

                            <div class="cart-item">
                                <div class="item-box">
                                    <div class="item-thumbnail">
                                        <img src="{{ asset('images/products/' . $item['image']) }}" width="50px" alt="{{ $item['image'] }}"
                                            class="product-img" />
                                        <span class="item-quantity">{{ $item['quantity'] }}</span>
                                    </div>
                                    <div class="item-info">
                                        <h3 class="item-name">{{ $item['name'] }}</h3>
                                        @foreach ($shop as $s)
                                            @if ($item['id'] == $s->id)
                                                <span class="item-res">
                                                    <i class="fa-solid fa-location-dot"></i> {{ $s->name }}
                                                    <input type="text" id="shopCoor" value="{{ $s->coordinates }}" hidden />
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <span class="item-price">{{ number_format($item['price'], 0) }}đ</span>
                            </div>
                        @endforeach

                        <div class="discount-section">
                            <form method="POST" action="{{ url('/apply-voucher') }}">
                                @csrf
                                <input type="text" placeholder="Nhập mã giảm giá..." class="discount-input" name="code" />
                                <button class="apply-button" type="submit">Sử dụng</button>
                            </form>
                        </div>

                        <div class="payment-details">
                            <div class="provisional">
                                <span class="provisional-title">Tạm tính</span>
                                <span class="provisional-price">{{ number_format($grand_total, 0, ',', '.') }}</span>

                                @if (isset($voucher_discount) && $voucher_discount > 0 && isset($discount_amount))
                                    <p>Giảm giá ({{ $voucher_discount }}%): -{{ number_format($discount_amount, 0, ',', '.') }}
                                        đ</p>
                                @endif
                            </div>

                            <!-- khoảng cách -->
                            <div class="transport-fee">
                                <span class="transport-fee__title">Khoảng cách: </span>
                                <span class="transport-fee__price-unit" id="km" style="display: ;"></span>
                            </div>
                            <br />
                            <div class="transport-fee">
                                <span class="transport-fee__title">Phí vận chuyển</span>

                                <span class="transport-fee__price" id="shipping_fee"></span>
                            </div>
                        </div>
                        <div class="total-payment">
                            <span class="total-payment__title">Tổng cộng</span>
                            <span class="total-payment__price">
                                <span class="total-payment__price-unit">VND</span>
                                <span id="total-payment" class="total-payment__price-main"></span><span
                                    class="total-payment__price-main">đ</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script>
        // Hàm tính khoảng cách giữa 2 tọa độ (vĩ độ, kinh độ) bằng công thức haversine
        function haversine(lat1, lon1, lat2, lon2) {
            const R = 6371; // Bán kính Trái Đất (km)
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c; // Khoảng cách (km)
        }


        // Hàm tính khoảng cách và phí vận chuyển
        // Hàm này sẽ được gọi khi người dùng thay đổi địa chỉ giao hàng hoặc địa chỉ cửa hàng
        function distance() {
            let userCoordinates = document.getElementById("userCoor").value;
            let shopCoordinates = document.getElementById("shopCoor").value;

            if (userCoordinates && shopCoordinates) {
                let [userLat, userLon] = userCoordinates.split(',').map(coord => parseFloat(coord.trim()));
                let [shopLat, shopLon] = shopCoordinates.split(',').map(coord => parseFloat(coord.trim()));

                if (!isNaN(userLat) && !isNaN(userLon) && !isNaN(shopLat) && !isNaN(shopLon)) {
                    let distanceKM = parseFloat(haversine(userLat, userLon, shopLat, shopLon).toFixed(2));
                    document.getElementById("km").textContent = distanceKM + " km";

                    // Nếu trên 12km thì ẩn nút submit và hiện cảnh báo
                    const warningText = document.getElementById("distance-warning");
                    const submitButton = document.querySelector(".submit-btn");

                    if (distanceKM > 12) {
                        warningText.style.display = "block";
                        submitButton.disabled = true;
                        submitButton.style.opacity = 0.5;
                        return;
                    } else {
                        warningText.style.display = "none";
                        submitButton.disabled = false;
                        submitButton.style.opacity = 1;
                    }


                    // Tính phí vận chuyển ngay sau khi cập nhật khoảng cách
                    let shippingFee = caculateShippingFee(distanceKM);
                    document.getElementById("shipping_fee").textContent = shippingFee.toLocaleString() + "đ";
                    document.getElementById("shipping_fee-hidden").value = shippingFee;

                    // Cập nhật tổng tiền
                    caculateTotal(shippingFee);
                } else {
                    document.getElementById("km").textContent = "Không xác định";
                }
            } else {
                document.getElementById("km").textContent = "Không xác định";
            }
        }


        // Hàm tính phí vận chuyển dựa trên khoảng cách
        // Hàm này sẽ được gọi khi khoảng cách được tính toán
        // và sẽ trả về phí vận chuyển tương ứng
        // Dữ liệu phí vận chuyển được truyền từ server sang client
        // thông qua biến shippingFees
        // và được sử dụng để tìm mức phí phù hợp
        // với khoảng cách đã tính toán
        function caculateShippingFee(distance) {
            let shippingFees = @json($shippingFee);

            if (!shippingFees || shippingFees.length === 0) {
                console.error("Không có dữ liệu phí ship!");
                return 0;
            }

            let selectedFee = shippingFees.find(fee =>
                distance >= fee.min_distance &&
                (fee.max_distance === null || distance < fee.max_distance)
            );

            if (!selectedFee) {
                console.error("Không tìm thấy mức phí phù hợp!");
                return 0;
            }

            let basePrice = selectedFee.base_price;
            let extraPricePerKm = selectedFee.extra_price_per_km || 0;
            let extraPrice = extraPricePerKm * distance;

            // Hệ số giảm dần (ví dụ: nếu >5km thì giảm 10%)
            let discountFactor = distance > 5 ? 0.9 : 1;

            let totalShippingFee = basePrice + (extraPrice * discountFactor);
            return Math.round(totalShippingFee); // Làm tròn số
        }


        // Hàm tính tổng tiền thanh toán
        // Hàm này sẽ được gọi khi phí vận chuyển được tính toán
        // và sẽ cập nhật tổng tiền thanh toán
        // bằng cách cộng phí vận chuyển vào tổng tiền hiện tại
        // Tổng tiền hiện tại được truyền từ server sang client
        // thông qua biến grand_total
        // và được sử dụng để tính toán tổng tiền thanh toán
        function caculateTotal(shippingFee) {
            let grandTotal = {{ $grand_total }};
            let total = grandTotal + shippingFee;

            document.getElementById("total-payment").textContent = total.toLocaleString();
            document.getElementById("total-hidden").value = total;
        }

        // Gọi hàm distance() khi trang tải
        window.onload = distance;

        // Gọi khi thay đổi địa chỉ
        document.getElementById("userCoor").addEventListener("change", distance);
        document.getElementById("shopCoor").addEventListener("change", distance);


        // hiển thị thông tin chuyển khoản khi chọn phương thức thanh toán
        document.addEventListener("DOMContentLoaded", function () {

            // Gọi khi thay đổi địa chỉ
            const userCoor = document.getElementById("userCoor");
            if (userCoor) {
                userCoor.addEventListener("change", function () {
                    distance(); // Gọi lại khi địa chỉ thay đổi
                });
            }

            // Gọi khi thay đổi địa chỉ cửa hàng (nếu cần dùng)
            const shopCoor = document.getElementById("shopCoor");
            if (shopCoor) {
                shopCoor.addEventListener("change", function () {
                    distance(); // Gọi lại nếu tọa độ shop thay đổi
                });
            }

            // Gọi lần đầu khi trang tải
            distance();

            let paymentOptions = document.getElementsByName("method");
            let bankInfo = document.getElementById("bank-info");

            paymentOptions.forEach(option => {
                option.addEventListener("change", function () {
                    if (this.value === "bank_transfer") {
                        bankInfo.style.display = "block";
                    } else {
                        bankInfo.style.display = "none";
                    }
                });
            });
        });
    </script>




    <!-- End main -->

@endsection
