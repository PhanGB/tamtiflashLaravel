@extends('admin.layouts.app')
@section('content')
    @vite(['resources/css/shop.css'])
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Sửa cửa hàng</h6>
            <form action="{{ route('admin.shops.update', ['id' => $shop->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Tên cửa hàng:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên cửa hàng"
                            value="{{ $shop->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Ảnh:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="file" name="image">
                        @if ($shop->image)
                            <img src="{{ asset('images/shops/' . $shop->image) }}" alt="{{ $shop->image }}"
                                style="width: 80px; height: 80px" />
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Đánh giá:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập đánh giá" name="rate"
                            value="{{ $shop->rate }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Mô tả ngắn:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập mô tả ngắn" name="short_description"
                            value="{{ $shop->short_description }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Giờ mở cửa:</label>
                    <div class="col-sm-9 col-form-label">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control me-2" min="0" max="23" style="width: 80px;"
                                name="time_open" value="{{ $shop->time_open }}">
                            <span class="me-2">-</span>
                            <input type="text" class="form-control" min="0" max="23" style="width: 80px;" name="time_close"
                                value="{{ $shop->time_close }}">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" id="mapLink" name="address_link" placeholder="Nhập link địa chỉ cửa hàng"
                            value="{{ $shop->address_link }}">
                            <!-- -------------------- -->
                            <input type="hidden" id="targetLat" class="form-control"
                            placeholder="Toạ độ quán" name="coordinates" value="{{ $shop->coordinates }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Trạng thái:</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="status">
                            <option value="" disabled {{ is_null($shop->status) ? 'selected' : '' }}>Chọn trạng thái</option>
                            <option value="0" {{ $shop->status == 0 ? 'selected' : '' }}>Ẩn</option>
                            <option value="1" {{ $shop->status == 1 ? 'selected' : '' }}>Hiện</option>
                        </select>
                    </div>
                </div>
                <a href="{{ route('admin.shops') }}" class="btn btn-danger">Quay lại</a>
                <button class="btn btn-primary" onclick="extractCoordinates()">Cập nhật cửa hàng</button>
            </form>
        </div>
    </div>
    <!-- Table End -->

    <script>
         // Trích xuất tọa độ từ link Google Maps
         function extractCoordinates(event) {
            const mapLink = document.getElementById("mapLink").value.trim();
            if (!mapLink) {
                alert("Vui lòng nhập link Google Maps!");
                return;
            }

            // Regex để tìm tọa độ trong URL
            const latLonRegex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
            const placeRegex = /!2m2!1d(-?\d+\.\d+)!2d(-?\d+\.\d+)/;

            let lat, lon;

            // Trường hợp link có dạng @lat,lon
            const latLonMatch = mapLink.match(latLonRegex);
            if (latLonMatch) {
                lat = parseFloat(latLonMatch[1]);
                lon = parseFloat(latLonMatch[2]);
            }

            // Trường hợp link có dạng !2m2!1dlon!2dlat
            const placeMatch = mapLink.match(placeRegex);
            if (placeMatch) {
                lon = parseFloat(placeMatch[1]);
                lat = parseFloat(placeMatch[2]);
            }

            if (lat && lon) {
                document.getElementById("targetLat").value = `${lat}, ${lon}`;
            } else {
                alert("Không thể trích xuất tọa độ từ link. Vui lòng kiểm tra lại!");
            }
        }
     </script>

@endsection
