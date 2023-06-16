<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/../css/upload_images" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>画像一覧</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <h1 class="text-3xl font-bold mb-8">
        <a href="upload_images" class="text-black no-underline">画像一覧</a>
    </h1>
    <div class="my-4">
        <form action="" method="GET" class="flex items-center">
            <label class="mr-2 text-gray-800 font-semibold">
                検索キーワード
                <input type="text" name="keyword" value="{{ $keyword }}"
                    class="border border-gray-300 px-2 py-1 rounded focus:outline-none focus:border-blue-500">
            </label>
            <input type="submit" value="検索"
                class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600 cursor-pointer">
        </form>
    </div>
    <div class="my-4">
        <form action="" method="GET" class="flex items-center">
            <label class="mr-2 text-gray-800 font-semibold">
                ユーザー名で絞り込み
                <select onchange="this.form.submit()" name="selectbox"
                    class="border border-gray-300 px-2 py-1 rounded focus:outline-none focus:border-blue-500">
                    <option value="">-</option>
                    @foreach ($user_data as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </label>
        </form>
    </div>
    <a href="upload_form" class="text-blue-500 hover:underline mb-4 block">フォームへ移動</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th
                        class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase border-b border-gray-300">
                        ファイル名</th>
                    <th
                        class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase border-b border-gray-300">
                        画像</th>
                    <th
                        class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase border-b border-gray-300">
                        URL</th>
                    <th
                        class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase border-b border-gray-300">
                        備考</th>
                    <th
                        class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase border-b border-gray-300">
                        ユーザーID</th>
                    <th
                        class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase border-b border-gray-300">
                        ユーザー名</th>
                    <th
                        class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase border-b border-gray-300">
                        </th>
                    <th
                        class="py-3 px-6 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase border-b border-gray-300">
                        </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($upload_images as $upload_image)
                    <tr>
                        <td class="py-4 px-6 border-b border-gray-300 whitespace-no-wrap">{{ $upload_image->filename }}
                        </td>
                        <td class="py-4 px-6 border-b border-gray-300 whitespace-no-wrap">
                            <img src='{{ $upload_image->filepath }}' width='200' class="w-64">
                        </td>
                        <td class="py-4 px-6 border-b border-gray-300 whitespace-no-wrap break-all">
                            <a href="http://localhost/{{ $upload_image->filepath }}"
                                class="text-blue-500 hover:underline">http://localhost/{{ $upload_image->filepath }}</a>
                        </td>
                        <td class="py-4 px-6 border-b border-gray-300 whitespace-no-wrap">
                            {{ $upload_image->memo }}
                        </td>
                        <td class="py-4 px-6 border-b border-gray-300 whitespace-no-wrap">
                            @if (isset($upload_image->user_id))
                                {{ $upload_image->user_id }}
                            @else
                                null
                            @endif
                        </td>
                        <td class="py-4 px-6 border-b border-gray-300 whitespace-no-wrap">
                            @if (isset($upload_image->user->name))
                                {{ $upload_image->user->name }}
                            @else
                                null
                            @endif
                        </td>
                        <td class="py-4 px-6 border-b border-gray-300 whitespace-no-wrap">
                            <form action="/upload_images/edit/{{ $upload_image->id }}" method="get">
                                <input type="submit" name="update" value="変更"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                                    @if ($now_user_id != $upload_image->user_id || !isset($now_user_id)) disabled @endif>
                                @csrf
                            </form>
                        </td>
                        <td class="py-4 px-6 border-b border-gray-300 whitespace-no-wrap">
                            <form action="/upload_images/delete/{{ $upload_image->id }}" method="post">
                                <input type="submit" name="delete" value="削除"
                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                                    @if ($now_user_id != $upload_image->user_id || !isset($now_user_id)) disabled @endif>
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
