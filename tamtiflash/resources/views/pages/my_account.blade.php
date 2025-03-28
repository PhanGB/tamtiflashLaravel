@include('layouts.app')
@section('title', 'Tài khoản của tôi')
@section('content')


<!-- Start my account -->
<link rel="stylesheet" href="public/css/my_account.css" />
<style>
    .myAccount__item-btn {
        text-decoration: none;
        border: none;
        border-radius: 8px;
        color: white;
        background-color: #e53935;
        /* Màu đỏ tươi */
        font-size: 15px;
        padding: 6px 12px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .myAccount__item-btn:hover {
        background-color: #c62828;
        /* Màu đỏ đậm hơn khi hover */
        transform: scale(1.05);
    }

    .myAccount__item-btn:active {
        background-color: #b71c1c;
        /* Màu đậm hơn khi nhấn */
        transform: scale(0.95);
    }

    .myAccount__item-btn-edit {
        text-decoration: none;
        border: none;
        border-radius: 8px;
        color: white;
        background-color: #007c2b;
        /* Màu đỏ tươi */
        font-size: 15px;
        padding: 6px 12px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .myAccount__item-btn-edit:hover {
        background-color: #007c2b;
        /* Màu đỏ đậm hơn khi hover */
        transform: scale(1.05);
    }

    .myAccount__item-btn-edit:active {
        background-color: #007c2b;
        /* Màu đậm hơn khi nhấn */
        transform: scale(0.95);
    }
</style>
<main class="myAccount">
    <h1 class="title_myAccount" style="text-align: center; font-size: 30px; padding: 0 50px;">Tài Khoản Của Tôi</h1>
    <hr>
    <section class="grid wide">
        <div class="row">
            <!-- Start Menu Desktop -->
            <div class="col l-3 m-0 c-0">
                <nav class="myAccount__nav-desktop">
                    <div class="myAccount__item">
                        <h1 class="myAccount__title-h1">Tài khoản của tôi</h1>
                    </div>
                    <ul class="myAccount__menu">
                        <li class="myAccount__menu-item">
                            <a href="/tamtiflash/infor" class="myAccount__menu-link">Quản lý tài khoản</a>
                        </li>
                        <li class="myAccount__menu-item">
                            <a href="/tamtiflash/my_order" class="myAccount__menu-link">Đơn hàng của tôi</a>
                        </li>
                        <li class="myAccount__menu-item border-bottom-radius">
                            <a href="/tamtiflash/signout" class="myAccount__menu-link">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End Menu Desktop -->


            <!-- Start Menu Mobile -->
            <div class="col l-0 m-12 c-12">
                <nav class="myAccount__nav-mobile">
                    <div class="myAccount__title ">
                        <h1 class="myAccount__title-h1">Tài khoản của tôi</h1>
                    </div>
                    <ul class="myAccount__menu row">
                        <li class="myAccount__menu-item col m-6 c-6">
                            <a href="" class="myAccount__menu-link">Quản lý tài khoản</a>
                        </li>
                        <li class="myAccount__menu-item col m-6 c-6">
                            <a href="" class="myAccount__menu-link">Đơn hàng của tôi</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <!-- End Menu Mobile -->

            <!-- Start content -->
            <div class="myAccount__content col l-9 m-12 c-12">
                <div class="myAccount__content-title">
                    <h1>Quản lý tài khoản</h1>
                </div>

                <!-- Start content info -->
                <div class="myAccount__content-info l-12 m-12 c-12">
                    <div class="myAccount__info-title border-top-radius">
                        <h2>Thông tin tài khoản</h2>
                    </div>

                    <div class="myAccount__info-item">
                        <strong>Họ và tên: </strong> <span><?php echo $data['name']; ?></span>
                    </div>

                    <div class="myAccount__info-item">
                        <strong>Số điện thoại: </strong> <span><?php echo $data['phone'] ?></span>
                    </div>

                    <div class="myAccount__info-item">
                        <strong>Mã giới thiệu: </strong> <strong><?php echo $data['my_code'] ?></strong>
                    </div>
                    <div class="row myAccount__info-item">
                        <a class="col l-6 m-6 c-6 myAccount__item-link" href="#edit-info">Chỉnh sửa</a>
                        <a class="col l-6 m-6 c-6 myAccount__item-link" href="#change-pass">Thay đổi mật khẩu</a>
                    </div>

                </div>
                <!-- End content info -->

                <!-- Start content address -->
                <div class="myAccount__content-address l-12 m-12 c-12">
                    <div class="myAccount__info-title border-top-radius">
                        <h2>Địa chỉ</h2>
                    </div>
                    <?php
                    if (isset($_SESSION['user']['addresses']) && !empty($_SESSION['user']['addresses'])) {
                        $index = 0;
                        foreach ($_SESSION['user']['addresses'] as $address) {
                            echo '<div class="myAccount__info-item">
                                    <span><strong>' . (++$index) . '. </strong>' . htmlspecialchars($address['address']) . '</span>
                                    <a href="/tamtiflash/infor#add-address/'.$address['id'].'"><button class="myAccount__item-btn-edit">Sửa</button></a>
                                     <a href="/tamtiflash/infor#add-address/'.$address['id'].'"><button class="myAccount__item-btn">Xoá</button></a>
                                  </div>';
                        }
                    } else {
                        echo '<div class="myAccount__info-item">
                                <span>Chưa có địa chỉ nào</span>
                              </div>';
                    }
                   
                    ?>
                    <div class="myAccount__info-item">
                        <a class="myAccount__item-link" href="/tamtiflash/infor#add-address">Thêm địa chỉ</a>
                    </div>
                </div>
                <!-- End content address -->
            </div>
            <!-- End content -->

            <!-- Start Modal Edit Infomation -->
            <div class="myAccount__dialog myAccount__overlay col l-12 m-12 c-12" id="edit-info">
                <a href="" class="myAccount__close-overlay"></a>
                <div class="myAccount__dialog-form">
                    <a class="myAccount__close-btn" href="">&times;</a>
                    <div class="myAccount__dialog-title">
                        <h1 class="myAccount__dialog-title-h1">Chỉnh sửa thông tin</h1>
                    </div>
                    <div class="myAccount__form-container">
                        <form class="myAccount__form-edit-info col l-12 m-12 c-12" action="/tamtiflash/edit-info/"
                            method="post">
                            <div class="myAccount__form-edit-info-input">
                                <p id="errorEdit" style="color:red; font-size: 13;"></p>
                                <input class="type-input" type="text" name="name" value="<?php echo $data['name']; ?>"
                                    id="myAccount__edit-name-txt">
                                <input class="type-input" type="text" name="phone" value="<?php echo $data['phone']; ?>"
                                    id="myAccount__edit-phone-txt">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input type="submit" name="submit" value="Chỉnh sửa" class="form-sign-btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Start Modal Edit Infomation -->

            <!-- Start Modal Change Password -->
            <div class="myAccount__dialog myAccount__overlay col l-12 m-12 c-12" id="change-pass">
                <a href="" class="myAccount__close-overlay"></a>
                <div class="myAccount__dialog-form">
                    <a class="myAccount__close-btn" href="">&times;</a>
                    <div class="myAccount__dialog-title">
                        <h1 class="myAccount__dialog-title-h1">Thay đổi mật khẩu</h1>
                    </div>
                    <div class="myAccount__form-container">
                        <form class="myAccount__form-edit-info col l-12 m-12 c-12" action="/tamtiflash/change-password"
                            method="post">
                            <div class="myAccount__form-edit-info-input">
                                <p id="checkErrOldPass" style="color:red; font-size: 13px;"></p>
                                <input class="type-input" type="password" name="old-pass"
                                    placeholder="Mật khẩu hiện tại" id="myAccount__edit-oldpass-txt" required>
                                <input class="type-input" type="password" name="new-pass" placeholder="Mật khẩu mới"
                                    id="myAccount__edit-newpass-txt" required>
                                <p id="checkErrNewPass" style="color:red; font-size: 13px;"></p>
                                <input class="type-input" type="password" name="re-pass"
                                    placeholder="Xác nhận mật khẩu mới" id="myAccount__edit-repass-txt" required>
                                <input type="submit" name="submit" value="Đổi mật khẩu" class="form-sign-btn">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Start Modal Change Password -->



            <!-- Start Modal Add Address -->
            <div class="myAccount__dialog myAccount__overlay col l-12 m-12 c-12" id="add-address">
                <a href="/tamtiflash/infor" class="myAccount__close-overlay"></a>
                <div class="myAccount__dialog-form">
                    <a class="myAccount__close-btn" href="/tamtiflash/infor">&times;</a>
                    <div class="myAccount__dialog-title">
                        <h1 class="myAccount__dialog-title-h1">Thêm địa chỉ mới</h1>
                    </div>
                    <div class="myAccount__form-container">
                        <form class="myAccount__form-edit-info col l-12 m-12 c-12" action="/tamtiflash/add-address"
                            method="post">
                            <div class="myAccount__form-edit-info-input">
                                <?php if (isset($_SESSION['error'])): ?>
                                    <p style="color:red; font-size: 13;"><?php echo $_SESSION['error']; ?></p>
                                    <?php unset($_SESSION['error']); ?>
                                <?php endif; ?>
                                <input class="type-input" type="text" name="address" placeholder="Nhập địa chỉ mới"
                                    id="myAccount__edit-oldpass-txt" required>
                                <button name="submit" class="form-sign-btn">Thêm vào</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Start Modal Add Address -->


        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php if (isset($_SESSION['error'])): ?>
                document.getElementById("errorEdit").innerText = "<?php echo $_SESSION['error']; ?>";
                <?php unset($_SESSION['error']); // Xóa lỗi sau khi hiển thị ?>
            <?php endif; ?>
        });
    </script>
    <?php if (isset($_SESSION['errorOldPass'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("checkErrOldPass").innerText = "<?php echo $_SESSION['errorOldPass']; ?>";
            });
        </script>
        <?php unset($_SESSION['errorOldPass']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['errorNewPass'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("checkErrNewPass").innerText = "<?php echo $_SESSION['errorNewPass']; ?>";
            });
        </script>
        <?php unset($_SESSION['errorNewPass']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                alert("<?php echo $_SESSION['error']; ?>");
            });
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                alert("<?php echo $_SESSION['success']; ?>");
            });
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

</main>

@endsection