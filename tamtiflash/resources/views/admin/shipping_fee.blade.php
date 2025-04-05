@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Cài đặt phí vận chuyển')
@section ('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="row g-2 align-items-center mb-4">
                <div class="col-8 col-sm-10">
                    <h6 class="mb-4">Shipping Fee</h6>
                </div>
                <div class="col-4 col-sm-2 text-center">
                    <a href="{{ route('admin.settings') }}" class="btn btn-danger w-30 mb-4">Quay lại</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-center align-middle">
                  <thead class="table-light">
                    <tr>
                      <th>STT</th>
                      <th>Khoảng cách tối thiểu (km)</th>
                      <th>Khoảng cách tối đa (km)</th>
                      <th>Phí cơ bản (VNĐ)</th>
                      <th>Phụ phí (VNĐ)</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($shippingFees as $ship)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          @empty($ship->min_distance)
                            <td>-</td>
                            @else
                            <td>{{ $ship->min_distance }}</td>
                          @endempty
                          @empty($ship->max_distance)
                            <td>-</td>
                            @else
                            <td>{{ $ship->max_distance }}</td>
                          @endempty
                          @empty($ship->base_price)
                            <td>-</td>
                            @else
                            <td>{{ $ship->base_price }}</td>
                          @endempty
                          @empty($ship->extra_price_per_km)
                            <td>-</td>
                            @else
                            <td>{{ $ship->extra_price_per_km }}</td>
                          @endempty
                          <td>
                            <a href="{{ route('admin.edit_shipping', $ship->id) }}" class="btn btn-sm btn-primary me-2">Sửa</a>
                          </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>

        </div>

        <!-- Content End -->
@endsection
