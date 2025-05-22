<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '商品一覧')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('css')
</head>
<body>
    <header>
        <h1 class="site-title">商品管理システム</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 確認テスト2_もぎたて</p>
    </footer>
</body>
</html>
