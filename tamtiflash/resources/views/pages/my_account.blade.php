@extends('layouts.app')
@section('title', 'Tài khoản của tôi')
@section('content')

    <!-- Start my account -->
    @vite('resources/css/my_account.css')
    <!-- <link rel="stylesheet" href="public/css/my_account.css" /> -->
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
    <!-- Start main -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".delete-address").click(function () {
                let addressId = $(this).data("id");
                let token = "{{ csrf_token() }}";
                if (confirm("Bạn có chắc muốn xóa địa chỉ này không?")) {
                    $.ajax({
                        url: "/delete-address/" + addressId,
                        type: "DELETE",
                        data: { _token: token },
                        success: function (response) {
                            if (response.success) {
                                $("#address-" + addressId).remove();
                            } else {
                                alert("Xóa thất bại, vui lòng thử lại!");
                            }
                        }
                    });
                }
            });
        });
    </script>

    <!-- Start my account -->
    <main class="myAccount">
        <h1 class="title_myAccount" style="text-align: center; font-size: 30px; padding: 0 50px;">Tài Khoản Của Tôi</h1>
        <hr>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" style="font-size: 15px;">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                                <a href="/info" class="myAccount__menu-link">Quản lý tài khoản</a>
                            </li>
                            <li class="myAccount__menu-item">
                                <a href="my_order" class="myAccount__menu-link">Đơn hàng của tôi</a>
                            </li>
                            <li class="myAccount__menu-item border-bottom-radius">
                                <a href="/logout" class="myAccount__menu-link">Đăng xuất</a>
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
                                <a href="/info" class="myAccount__menu-link">Quản lý tài khoản</a>
                            </li>
                            <li class="myAccount__menu-item col m-6 c-6">
                                <a href="/my_orders" class="myAccount__menu-link">Đơn hàng của tôi</a>
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
                            <strong>Họ và tên: </strong> <span>{{ $user->name }}</span>
                        </div>

                        <div class="myAccount__info-item">
                            <strong>Số điện thoại: </strong> <span>{{ $user->phone }}</span>
                        </div>

                        <div class="myAccount__info-item">
                            <strong>Mã giới thiệu: </strong> <strong>{{ $user->my_code }}</strong>
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
                        @if ($addresses->isNotEmpty())
                            @foreach ($addresses as $address)
                                <div class="row myAccount__info-item" id="address-{{ $address->id }}">
                                    <span class="col l-11 m-11 c-11">
                                        <strong>{{ $loop->iteration }}. </strong> {{ $address->address }}
                                    </span>
                                    <button class="col l-1 m-1 c-1 myAccount__item-btn delete-address"
                                        data-id="{{ $address->id }}">Xoá</button>
                                </div>
                            @endforeach
                        @else
                            <p style="font-size:20px;padding:10px;">Không có địa chỉ nào.</p>
                        @endif

                        <div class="myAccount__info-item">
                            <a class="myAccount__item-link" href="#add-address">Thêm địa chỉ</a>
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
                            <form class="myAccount__form-edit-info col l-12 m-12 c-12"
                                action="{{ route('account.update') }}" method="post">
                                @csrf
                                <div class="myAccount__form-edit-info-input">
                                    <input class="type-input" type="text" name="name" value="{{ old('name', $user->name) }}"
                                        id="myAccount__edit-name-txt">
                                    <input class="type-input" type="text" name="phone"
                                        value="{{ old('phone', $user->phone) }}" id="myAccount__edit-phone-txt">
                                    <input type="submit" value="Chỉnh sửa" class="form-sign-btn">
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
                            <form class="myAccount__form-edit-info col l-12 m-12 c-12"
                                action="{{ route('account.change-password') }}" method="post">
                                @csrf
                                <div class="myAccount__form-edit-info-input">
                                    <input class="type-input" type="password" name="old-pass"
                                        placeholder="Mật khẩu hiện tại">
                                    <input class="type-input" type="password" name="new-pass" placeholder="Mật khẩu mới">
                                    <input class="type-input" type="password" name="re-pass"
                                        placeholder="Xác nhận mật khẩu mới">
                                    <input type="submit" value="Đổi mật khẩu" class="form-sign-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Start Modal Change Password -->



                <!-- Start Modal Add Address -->
                <div class="myAccount__dialog myAccount__overlay col l-12 m-12 c-12" id="add-address">
                    <a href="" class="myAccount__close-overlay"></a>
                    <div class="myAccount__dialog-form">
                        <a class="myAccount__close-btn" href="">&times;</a>
                        <div class="myAccount__dialog-title">
                            <h1 class="myAccount__dialog-title-h1">Thêm địa chỉ mới</h1>
                        </div>
                        <div class="myAccount__form-container">
                            @if (session('success'))
                                <p style="color: green;">{{ session('success') }}</p>
                            @endif

                            @if ($errors->any())
                                <p style="color: red;">{{ $errors->first() }}</p>
                            @endif

                            <form class="myAccount__form-edit-info col l-12 m-12 c-12" action="{{ route('add.address') }}"
                                method="post">
                                @csrf
                                <div class="myAccount__form-edit-info-input">
                                    <!-- <input class="type-input" type="text" name="new-address" placeholder="Nhập địa chỉ mới"
                                                                required> -->
                                    <div style="position: relative;  align-items: center;">


                                        <input class="type-input" type="text" name="new-address" id="new-address"
                                            placeholder="Nhấn vào nút bên cạnh để lấy toạ độ" readonly>

                                        <hr style="margin: 0 5px; width: 1px; height: 10px; background-color: #ccc;">
                                        <input class="type-input" type="text" name="name-address" id="coo-location"
                                            placeholder="Nhập địa chỉ của bạn" required>

                                            <!-- nút để lấy toạ độ -->
                                        <button type="button" id="getLocationBtn" style="
                                                                                position: absolute;
                                                                                right: 10px;
                                                                                background: none;
                                                                                border: none;
                                                                                cursor: pointer;
                                                                                font-size: 20px;
                                                                                top: 10px;
                                                                            ">
                                            🗺️
                                        </button>
                                    </div>
                                    <button class="myAccount__item-btn" name="submit">Thêm vào</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Start Modal Add Address -->

            </div>
        </section>
    </main>

    <script>
        // function getLocation() {
        //     if (navigator.geolocation) {
        //         navigator.geolocation.getCurrentPosition(
        //             function (position) {
        //                 let latitude = position.coords.latitude;
        //                 let longitude = position.coords.longitude;

        //                 // Gọi API OpenCageData để chuyển đổi tọa độ thành địa chỉ
        //                 fetch(`https://api.positionstack.com/v1/reverse?access_key=2a2fd9c717f5f3e08f8d0e47661f5ca9&query=${latitude},${longitude}`)
        //                     .then(response => {
        //                         if (!response.ok) {
        //                             throw new Error("Network response was not ok");
        //                         }
        //                         return response.json();
        //                     })
        //                     .then(data => {
        //                         if (data && data.data && data.data.length > 0) {
        //                             let address = data.data[0].label; // Lấy địa chỉ đầy đủ
        //                             document.getElementById("new-address").value = address;
        //                         } else {
        //                             alert("Không tìm thấy địa chỉ.");
        //                         }
        //                     })
        //                     .catch(error => {
        //                         alert("Lỗi khi lấy địa chỉ: " + error.message);
        //                     });
        //             },
        //             function (error) {
        //                 alert("Lỗi: " + error.message);
        //             }
        //         );
        //     } else {
        //         alert("Trình duyệt không hỗ trợ Geolocation.");
        //     }
        // }

        // // Gọi hàm lấy tọa độ khi click vào nút
        // document.getElementById("getLocationBtn").addEventListener("click", getLocation);



        function getLocation() {
            // $newAddress = document.getElementById("new-address");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        let latitude = position.coords.latitude;
                        let longitude = position.coords.longitude;
                        // alert("Vĩ độ: " + latitude + "\nKinh độ: " + longitude);
                        document.getElementById("new-address").value = latitude + ", " + longitude;

                    },
                    function (error) {
                        alert("Lỗi: " + error.message);
                    }
                );
            } else {
                alert("Trình duyệt không hỗ trợ Geolocation.");
            }
        }

        // Gọi hàm lấy tọa độ khi click vào nút
        document.getElementById("getLocationBtn").addEventListener("click", getLocation);
    </script>

    <!-- End my account -->

@endsection