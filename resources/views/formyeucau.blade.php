<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('sweetalert::alert')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body style="background-image: url('/my-project2/public/images/anhnen5.png'); background-size: cover; background-repeat: repeat; background-position: center; justify-content: center; align-items: center; height: 100vh;">
<div class="antialiased font-sans text-gray-900">
        <nav class="bg-white ">
            <div class="flex flex-wrap items-center justify-center">
                <img src="/my-project2/public/images/logo_3.png" alt="Logo" class="h-24 mr-12 "> 
                <div class="flex items-center md:order-2 px-8 ">
                        <a class=" mr-1 md:mr-2">
                            @if(session()->has('name'))
                            <span
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg  text-xl px-8 py-5 md:px-5 md:py-2.5 ml-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                href="{{url('/login')}}">Xin chào, {{ session('name') }}</span>
                            @else
                            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg  text-xl px-8 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                href="{{url('/login')}}">Đăng Nhập</a>
                            @endif</a>

                        <button data-collapse-toggle="mega-menu" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="mega-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    <div  class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1 ">
                        @if(session()->has('name'))
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 pr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{route('logout')}}" class=" flex flex-col mt-4 font-medium md:flex-row md:space-x-8 
                            md:mt-0 py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent 
                            md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 
                            dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700  text-xl">Đăng xuất</a>
                            </a>
                        @endif
                    </div>
                </div>

                <div id="mega-menu" class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1 ">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                        <li>
                            <a href="{{url('/welcome')}}"
                                class="  text-xl block py-2 pl-3 pr-2 text-blue-600 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-blue-500 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                                aria-current="page">Trang Chủ</a>
                        </li>
                        <li>
                            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                                <div class="dropdown inline-block relative">
                                    <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                                        class=" text-xl flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                        Danh Mục <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu fixed hidden text-gray-700 pl-2">
                                        <!-- nho them vao -->
                                        @foreach($labs as $l)
                                            <li class=""><a class="text-xl rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{route('phong', ['id'=>$l->id])}})}}">{{$l->TenPTN}}</a></li>                     
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('calendar') }}"
                                class=" text-xl block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Lịch Phòng Thí Nghiệm</a>
                        </li>
                        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                            <div class="dropdown inline-block relative">
                                <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                                        class=" text-xl flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                        Tùy Chỉnh Phòng Thí Nghiệm <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                </button>
                                <ul class="dropdown-menu fixed hidden text-gray-700 pl-2">
                                    <li><a href="{{url('/dk')}}" class="text-xl rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">Đăng Ký Phòng Thí Nghiệm</a></li>
                                    <li> <a href="{{route('YeuCau')}}"class="text-xl rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">Yêu Cầu Chỉnh Sửa Phòng Thí Nghiệm</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- component -->
    <form  method="POST" action="{{route('YeuCauChinhSua')}}">
        @csrf
        <div class=" pt-32  flex items-center justify-center">
            <div class="container max-w-screen-lg mx-auto">
                <div>
                    <h1 class="font-semibold text-3xl text-indigo-700 mb-8 text-center ">YÊU CẦU CHỈNH SỬA PHÒNG THÍ NGHIỆM</h1>
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class=" text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="idUser">ID Người Dùng</label>
                                        <input type="text" name="idUser" id="idUser"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                            value="{{ session('macv') }}" readonly />
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="idPTN">ID Phòng Thí Nghiệm</label>
                                        <select name="idPTN" id="idPTN"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                                            <option selected>Chọn ID Phòng Thí Nghiệm</option>
                                            @foreach($labs as $l)
                                            <option>{{$l->idPTN}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="quantity">Tổng Số Người Chỉnh Sửa</label>
                                        <input type="text" name="quantity" id="quantity" max="10" min="0"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                            placeholder="Nhập tổng số" />

                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="update_time">Thời Gian Chỉnh Sửa</label>
                                        <select name="update_time" id="update_time"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                                            <option selected>Thời Gian</option>
                                            @foreach($times as $d)
                                            <option>{{$d->ThoiGianBd }} - {{$d->ThoiGianKT}}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="date">Ngày Chỉnh Sửa</label>
                                        <input type="date" name="date" id="date"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>
                                </div>
                                <button name
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center w-full mt-4"
                                    type="submit">Gửi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if (Session::has('Gửi Yêu Cầu Thành Công'))
    <script>
    window.onload = function() {
        swal('Gửi Yêu Cầu Thành Công', '{{ Session::get('
            Gửi Yêu Cầu Thành Công ') }}', 'error', {
                button: true,
                button: 'OK',
                timer: 5000,
            });
    }
    </script>
    @endif



</body>

</html>