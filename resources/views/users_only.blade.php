<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>マイページ</h1>
    <p>ログイン中のユーザーのみ表示されるページです</p>
    <p>名前:{{Auth::user()->name}}</p>
    <p>id:{{Auth::user()->id}}</p>
    <p>パス:{{auth()->user()->password}}</p>
    {{dump(auth()->user())}}
    <form action="{{route('logout')}}" method="post">
        <button type="submit">ログアウト</button>
        @csrf
    </form>

</body>
</html>
