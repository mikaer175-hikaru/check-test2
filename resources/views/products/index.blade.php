@extends('layouts.app')

@section('title', '商品一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="product-index">
    <a href="{{ route('products.register') }}" class="product-index__add-button">+ 商品を追加</a>

    {{-- 検索フォーム --}}
    <form method="GET" action="{{ route('products.index') }}" class="product-search">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="商品名を検索" class="product-search__input">
        <select name="sort" class="product-search__select">
            <option value="">並び替え</option>
            <option value="high" {{ request('sort') == 'high' ? 'selected' : '' }}>高い順</option>
            <option value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>低い順</option>
        </select>
        <button type="submit" class="product-search__button">検索</button>
    </form>

    {{-- 並び替えタグ --}}
    @if(request('sort'))
    <div class="product-tag">
        <span>並び替え: {{ request('sort') == 'high' ? '高い順' : '低い順' }}</span>
        <a href="{{ route('products.index', ['keyword' => request('keyword')]) }}">×</a>
    </div>
    @endif

    {{-- 商品一覧 --}}
    <div class="product-list">
        @foreach ($products as $product)
        <div class="product-card">
            <a href="{{ route('products.detail', $product->id) }}">
                <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像">
                <div class="product-card__info">
                    <p class="product-card__name">{{ $product->name }}</p>
                    <p class="product-card__price">¥{{ number_format($product->price) }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    {{ $products->links() }}
</div>
@endsection
