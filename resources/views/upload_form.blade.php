<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>画像アップロードフォーム</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col justify-center items-center">
    <h1 class="text-4xl font-bold mb-8">画像アップロードフォーム</h1>
    <form action="" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-lg rounded p-8 max-w-md w-full">
        <div class="mb-6">
            <label for="image" class="block text-gray-800 font-semibold mb-2">アップロード画像</label>
            <input id="image" type="file" name="image"
                class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded focus:outline-none focus:bg-white">
        </div>
        <div class="mb-6">
            <label for="memo" class="block text-gray-800 font-semibold mb-2">備考</label>
            <textarea name="memo" id="memo" cols="50" rows="5"
                class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded focus:outline-none focus:bg-white"></textarea>
        </div>
        <div class="flex justify-center">
            <input type="submit" value="アップロードする"
                class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600 cursor-pointer">
        </div>
        @csrf
    </form>
    <a href="upload_images" class="mt-6 text-blue-500 hover:underline">画像一覧へ</a>
    <form action="{{route('logout')}}" method="post" class="mt-6">
        <button type="submit" class="bg-red-500 text-white py-2 px-6 rounded hover:bg-red-600 cursor-pointer">ログアウト</button>
        @csrf
    </form>
</body>

</html>
