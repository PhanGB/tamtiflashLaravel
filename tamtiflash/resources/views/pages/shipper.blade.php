@extends('layouts.app')
@section('title', 'Thông tin Shipper')
@section('content')

    <!-- Start Shipper Info Section -->
    <main class="myAccount">
        <h1 class="title_myAccount" style="text-align: center; font-size: 30px; padding: 0 50px;">Thông tin Shipper</h1>
        <hr>

        <!-- Shipper Info Form -->
        <section class="grid wide">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <!-- Card for Shipper Info -->
                    <div class="card shadow-sm">
                        <div class="card-header text-center">
                            <h3>Thông tin Shipper</h3>
                        </div>
                        <div class="card-body">
                            <!-- Form Start -->
                            <form>
                                <div class="form-row">
                                    <!-- Shipper Image -->
                                    <div class="col-12 text-center mb-3">
                                        <img src="https://via.placeholder.com/100" alt="Shipper Image"
                                            class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                                    </div>

                                    <!-- Shipper Name -->
                                    <div class="form-group col-12">
                                        <label for="shipperName"><strong>Tên Shipper:</strong></label>
                                        <input type="text" class="form-control" id="shipperName" value="John Doe"
                                            disabled>
                                    </div>

                                    <!-- Shipper Phone -->
                                    <div class="form-group col-12">
                                        <label for="shipperPhone"><strong>Số điện thoại:</strong></label>
                                        <input type="text" class="form-control" id="shipperPhone"
                                            value="(+84) 123 456 789" disabled>
                                    </div>

                                    <!-- Contact Button -->
                                    <div class="form-group col-12 text-center">
                                        <a href="tel:+84123456789" class="btn btn-primary btn-block">Liên hệ Shipper</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Card for Shipper Info -->
                </div>
            </div>
        </section>
    </main>
    <!-- End Shipper Info Section -->

@endsection
