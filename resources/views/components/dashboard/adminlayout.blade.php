<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel</title>

        <!-- Fonts -->
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script>
            var public_path = '{{url('/public/images')}}';
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="flex w-full min-h-screen">
            <div class="w-1/5 bg-blue-800 text-white sticky top-0 ">
                <span class="w-full h-10 relative flex items-center text-2xl px-2"><b>dashboard</b><i class="cursor-pointer fa-solid fa-angles-left text-2xl absolute top-2 right-2"></i></span>
                <ul class="list-none p-4 text-xl font-bold">
                    <li class="w-full"><a href="/dashboard/danh-muc" class="px-2 py-1 w-full block">danh mục</a></li>
                    <li class="w-full"><a href="/dashboard/don-hang" class="px-2 py-1 w-full block">đơn hàng</a></li>
                    <li class="w-full"><a href="/dashboard/spotlight" class="px-2 py-1 w-full block">spotlight</a></li>
                    <li class="w-full"><a href="/dashboard/san-pham" class="px-2 py-1 w-full block">sản phẩm</a></li>
                    <li class="w-full"><a href="/dashboard/thuong-hieu" class="px-2 py-1 w-full block">thương hiệu</a></li>
                    <li class="w-full"><a href="/dashboard/dang-ban" class="px-2 py-1 w-full block">đang bán</a></li>
                </ul>
            </div>
            <div class="w-4/5">
                {{ $slot }}
            </div>
        </div>
    </body>
    {{ $myjs ?? '' }}
    {{-- <script src="https://unpkg.com/flowbite@1.4.2/dist/flowbite.js"></script> --}}
    <script src="https://kit.fontawesome.com/dab4d8d77a.js" crossorigin="anonymous"></script>
</html>