@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="product-form">
    <h2 class="product-form__title">商品登録</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="product-form__form">
        @csrf

        {{-- 商品名 --}}
        <div class="product-form__group">
            <label class="product-form__label">
                商品名 <span class="product-form__required">必須</span>
            </label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力" class="product-form__input">
            @error('name') <p class="product-form__error">{{ $message }}</p> @enderror
        </div>

        {{-- 値段 --}}
        <div class="product-form__group">
            <label class="product-form__label">
                値段 <span class="product-form__required">必須</span>
            </label>
            <input type="number" name="price" value="{{ old('price') }}" placeholder="値段を入力" class="product-form__input">
            @error('price') <p class="product-form__error">{{ $message }}</p> @enderror
        </div>

        {{-- 商品画像 --}}
        <div class="product-form__group">
            <label class="product-form__label">
                商品画像 <span class="product-form__required">必須</span>
            </label>
            <input type="file" name="image" class="product-form__input">
            @if(old('image'))
                <div class="product-form__preview">
                    <img src="{{ asset('storage/images/' . old('image')) }}" width="150">
                </div>
            @endif
            @error('image') <p class="product-form__error">{{ $message }}</p> @enderror
        </div>

        {{-- 季節（複数選択） --}}
        <div class="product-form__group">
            <label class="product-form__label">
                季節 <span class="product-form__required">必須</span> <span class="product-form__note">複数選択可</span>
            </label>
            <div class="product-form__checkboxes">
                @foreach($seasons as $season)
                    <label class="product-form__checkbox">
                        <input type="checkbox" name="seasons[]" value="{{ $season->id }}"
                               {{ is_array(old('seasons')) && in_array($season->id, old('seasons')) ? 'checked' : '' }}>
                        {{ $season->name }}
                    </label>
                @endforeach
            </div>
            @error('seasons') <p class="product-form__error">{{ $message }}</p> @enderror
        </div>

        {{-- 商品説明 --}}
        <div class="product-form__group">
            <label class="product-form__label">
                商品説明 <span class="product-form__required">必須</span>
            </label>
            <textarea name="description" placeholder="商品の説明を入力" class="product-form__textarea">{{ old('description') }}</textarea>
            @error('description') <p class="product-form__error">{{ $message }}</p> @enderror
        </div>

        {{-- ボタン --}}
        <div class="product-form__buttons">
            <a href="{{ route('products.index') }}" class="product-form__button product-form__button--gray">戻る</a>
            <button type="submit" class="product-form__button product-form__button--yellow">登録</button>
        </div>
    </form>
</div>
@endsection
