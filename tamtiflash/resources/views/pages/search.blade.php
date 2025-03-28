@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/product_detail.css">
<link rel="stylesheet" href="/css/search.css">
<main>
    <div class="grid wide">
        <h2>Kết quả tìm kiếm cho: "{{ $keyword }}"</h2>

        @if($products->count() > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col l-3 m-6 c-12">
                        <div class="product-card">
                            <a href="{{ route('productDetail', $product->id) }}">
                                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="product-card__img">
                                <h4 class="product-card__name">{{ $product->name }}</h4>
                                <p class="product-card__price">{{ number_format($product->price) }} đ</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination">
                {{ $products->appends(['keyword' => $keyword])->links() }}
            </div>
        @else
            <p>Không tìm thấy sản phẩm nào phù hợp.</p>
        @endif
    </div>
</main>
@endsection
