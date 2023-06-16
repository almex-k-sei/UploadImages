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
    <h1 class="text-4xl font-bold mb-8">編集画面</h1>
    <form action="" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-lg rounded p-8 max-w-md w-full">
        <div class="mb-6">
            <label for="memo" class="block text-gray-800 font-semibold mb-2">ファイル名</label>
            <input type="text" name="name" id="" cols="40" rows="5"
                value="{{ str_replace(substr($image_data->filename, strrpos($image_data->filename, '.')), '', $image_data->filename) }}"
                class="w-10 bg-gray-200 text-gray-800 py-2 px-4 rounded focus:outline-none focus:bg-white">{{ substr($image_data->filename, strrpos($image_data->filename, '.')) }}
        </div>
        @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
        @endif
        <div class="mb-6">
            <label for="image" class="block text-gray-800 font-semibold mb-2">現在の画像</label>
            <img src='/{{ $image_data->filepath }}' width='200' class="mb-4">
            <label for="image" class="block text-gray-800 font-semibold mb-2">新しい画像</label>
            <input id="image" type="file" name="image"
                class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded focus:outline-none focus:bg-white">
        </div>
        <div class="mb-6">
            <label for="memo" class="block text-gray-800 font-semibold mb-2">備考</label>
            <textarea name="memo" id="memo" cols="50" rows="5"
                class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded focus:outline-none focus:bg-white">{{ $image_data->memo }}</textarea>
        </div>
        <div class="flex justify-between">
            <a href="{{ url('/upload_images') }}"
                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-500 hover:to-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150">
                <svg class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 3.293a1 1 0 0 1 0 1.414L6.414 8H16a1 1 0 0 1 0 2H6.414l3.293 3.293a1 1 0 1 1-1.414 1.414l-5-5a1 1 0 0 1 0-1.414l5-5a1 1 0 0 1 1.414 0z"
                        clip-rule="evenodd" />
                </svg>
                戻る
            </a>
            <input type="submit" value="変更する"
                class="bg-blue-500 text-white py-2 px-6 rounded hover:bg-blue-600 cursor-pointer">
        </div>
        @csrf
    </form>
</body>

</html>
