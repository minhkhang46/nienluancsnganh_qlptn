<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>

<body  style="background-image: url('/my-project2/public/images/anhnen.png'); background-size: cover; background-repeat: repeat; background-position: center;">
    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->
  
    <div class=" flex-auto items-center justify-center bg-center pt-32 py-12 px-4 sm:px-6 lg:px-8  bg-no-repeat bg-cover  ">
        <div class="mx-auto max-w-screen-xl px-10 py-16 lg:px-8">
            <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-2xl pb-10">
                HỆ THỐNG QUẢN LÝ PHÒNG THÍ NGHIỆM
            </h1>
            <div class="mx-auto max-w-lg">
              
                <div class=" shadow-lg sm:p-6 lg:p-8 bg-gray-300 ">
                    <div class="text-center">
                        <p class="text-center text-xl font-medium">Đăng Nhập</p>
                        @php
                            $message = session('message');
                            if ($message) {
                                echo '<span class = "text-lg text-rose-600 pt-2 pb-2">',$message,'</span>';
                                session()->forget('message');
                            }
                        @endphp
                    </div>
                    
                    <form action="{{route('trangchu')}}" method="post" class="mb-2 mt-4 space-y-2 rounded-lg p-2 ">
                        @csrf

                        <div>
                            <label for="id" class="sr-only">ID Người Dùng</label>

                            <div class="relative">
                                <input name="macv" type="id" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                                    placeholder="Nhập ID " require=""/>

                                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">

                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div>
                            <label for="password" class="sr-only">Mật Khẩu</label>

                            <div class="relative">
                                <input name="password" type="password"
                                    class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                                    placeholder="Nhập mật khẩu" require=""/>

                                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="inline-flex items-center cursor-pointer">
                                <input id="customCheckLogin" type="checkbox"
                                    class="form-checkbox border-0 rounded text-gray-200 ml-1 w-5 h-5"
                                    style="transition: all 0.15s ease 0s;" />
                                <span class="ml-2 text-sm font-semibold text-gray-500">Ghi Nhớ</span></label>
                        </div>
                    
                        <button type="submit"
                            class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                            Đăng Nhập
                        </button>
                    </form>
                </div>



            </div>
        </div>
</body>

</html>