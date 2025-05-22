@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="product-form">
    <h2 class="product-form__title">商品更新</h2>

    {{-- バリデーションエラー --}}
    @if ($errors->any())
        <div class="product-form__alert product-form__alert--danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="product-form__error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 商品更新フォーム --}}
    <form class="product-form__body" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- 商品名 --}}
        <div class="product-form__group">
            <label class="product-form__label">商品名</label>
            <input class="product-form__input" type="text" name="name" value="{{ old('name', $product->name) }}">
            @error('name')<p class="product-form__error">{{ $message }}</p>@enderror
        </div>

        {{-- 値段 --}}
        <div class="product-form__group">
            <label class="product-form__label">値段（円）</label>
            <input class="product-form__input" type="number" name="price" value="{{ old('price', $product->price) }}">
            @error('price')<p class="product-form__error">{{ $message }}</p>@enderror
        </div>

        {{-- 季節（複数選択） --}}
        <div class="product-form__group">
            <label class="product-form__label">季節（複数選択可）</label>
            @foreach ($seasons as $season)
                <label class="product-form__checkbox">
                    <input
                        type="checkbox"
                        name="seasons[]"
                        value="{{ $season->id }}"
                        {{ in_array($season->id, old('seasons', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                    {{ $season->name }}
                </label>
            @endforeach
            @error('seasons')<p class="product-form__error">{{ $message }}</p>@enderror
        </div>

        {{-- 商品説明 --}}
        <div class="product-form__group">
            <label class="product-form__label">商品説明</label>
            <textarea class="product-form__textarea" name="description">{{ old('description', $product->description) }}</textarea>
            @error('description')<p class="product-form__error">{{ $message }}</p>@enderror
        </div>

        {{-- 商品画像 --}}
        <div class="product-form__group">
            <label class="product-form__label">商品画像（.png or .jpeg）</label>
            <input class="product-form__input" type="file" name="image">
            @if($product->image)
                <div class="product-form__preview">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" width="100">
                </div>
            @endif
            @error('image')<p class="product-form__error">{{ $message }}</p>@enderror
        </div>

        {{-- ボタンエリア --}}
        <div class="product-form__buttons">
            <button class="product-form__button" type="submit">変更を保存</button>
            <a href="{{ route('products.index') }}" class="product-form__button product-form__button--back">戻る</a>
        </div>
    </form>

    {{-- 削除用ゴミ箱ボタン --}}
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="product-form__delete" onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <button type="submit" class="product-form__trash-button">
            <img src="{{ asset('images/trash-icon.png') }}" alt="削除" width="30">
        </button>
    </form>
</div>
@endsection
