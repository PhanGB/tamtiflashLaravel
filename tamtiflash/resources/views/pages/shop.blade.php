@extends('layouts.app')
@section('title', 'Cửa hàng')
@section('content')
<section>
    <main>
    <div class="grid wide">
        <div class="section-heading">
            <h2 class="section-title">Cửa hàng</h2>
            <div class="filter-buttons">
                <button class="filter-btn active">Tất cả</button>
                <button class="filter-btn">Thức ăn</button>
                <button class="filter-btn">Đồ uống</button>
            </div>
        </div>
    </div>
</section>
<div>
    <div class="grid wide">
        <div class="row">
            @foreach ($shops as $shop)
            <div class="col l-3 m-6 c-6">
                <div class="shop-item">
                    <div class="shop-item_info">
                        <img src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/product-1.jpg" alt="" class="shop-item__img" />
                        <h3>{{ $shop->name }}</h3>
                        <p>{{ $shop ->short_description }}</p>
                        <div class="div_about">
                            <span class="shop-item_race split_race">{{ $shop->rate }}<i class="fa-regular fa-star"></i></span>
                            <span class="shop-item_time split_time">Giờ mở:{{ $shop->time_open }}</span>
                        </div>
                        <a href="/shopdetail/{{ $shop->id }}" class="buttons shop-item_btn">Ghé quán</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="grid wide">
    <div class="col l-12 m-12 c-12 about-next_page">
        <a class="next-page">1</a>
        <a class="next-page">2</a>
        <a class="next-page">3</a>
    </div>
</div>
</main>
<link rel="stylesheet" href="/css/shop.css">
@endsection
