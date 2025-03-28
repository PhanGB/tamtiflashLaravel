@include('layouts.app')
@section('title', 'Theo dõi đơn hàng')
@section('content')


<base href="http://localhost/tamtiflash/">
<link rel="stylesheet" href="public/css/tracking.css" />

<div class="banner">
    <div>
        <h2 class="banner-title">Giao nhanh, ăn ngon, không lo giá cả</h2>
        <a href="/order" class="primary-btn banner-btn">LỰA ĐỒ ĂN, NƯỚC UỐNG THÔI!</a>
    </div>
</div>

<br><br><br>
<main class="order-tracking">
    <h1 style="text-align: center;">Theo dõi đơn hàng</h1>
    <div class="grid-container">
        <div class="order-info">
            <h3>Thông tin đơn hàng</h3>
            <p>Mã đơn hàng: <span>#12345</span></p>
            <p>Cửa hàng: <?= htmlspecialchars($order['shop_name']) ?></p>
            <p>Trạng thái: <span class="status active"><?= htmlspecialchars($order['status']) ?></span></p>
            <p>Ngày đặt: <?= date('d-m-Y', strtotime($order['create_at'])) ?></p>
            <div class="tracking-progress">
                <span class="step completed">Xác nhận</span>
                <span class="step active">Vận chuyển</span>
                <span class="step">Đã giao</span>
            </div>
        </div>
        <div class="product-details">
            <h2>Chi tiết sản phẩm</h2> <br>
            <?php 
            $stt = 1;
            foreach ($order['products'] as $product) {
            ?>
                <div>
                    <h3><?= $stt++ ?>: Tên sản phẩm: <?= htmlspecialchars($product['product_name']) ?></h3>
                    <p>Số lượng: <?= htmlspecialchars($product['quantity']) ?></p>
                    <p>Giá: <?= number_format($product['price'], 0, ',', '.') ?> VND</p>
                </div>
            <?php } ?>
            <button class="btn-primary" style="margin-top: 10px;">Liên hệ Driver</button>
        </div>
    </div>
</main>

@endsection