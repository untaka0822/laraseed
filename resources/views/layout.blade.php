<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>しーどえすえぬえす</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
</head>

<body>
	@include('navbar')
	
    <div class="container">
        {{-- 作成のSessionメッセージ --}}
        @if (Session::has('flash_create'))
            <div class="alert alert-info">{{ Session::get('flash_create') }}</div>
        @endif

        {{-- 更新のSessionメッセージ --}}
        @if (Session::has('flash_update'))
            <div class="alert alert-success">{{ Session::get('flash_update') }}</div>
        @endif

        {{-- 削除のSessionメッセージ --}}
        @if (Session::has('flash_delete'))
            <div class="alert alert-danger">{{ Session::get('flash_delete') }}</div>
        @endif

        @yield('content') {{-- 継承しているクラスの名前 --}}
    </div>

    <!-- Scripts --><!-- ③ 追加 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../js/navbar.js"></script>

</body>
</html>
