<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Hệ Thống Quản Lý</title>
</head>

<body  style="background-image: url('/my-project2/public/images/anhnen5.png'); background-size: cover; background-repeat: repeat; background-position: center; justify-content: center; align-items: center; height: 100vh;">
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
                                        @foreach($labs as $l)
                                            <li class=""><a class="text-xl rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{route('phong', ['id'=>$l->id])}})}}">{{$l->TenPTN}}</a></li>                     
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('calendar') }}"
                                class=" text-xl block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Danh
                                Sách Đăng Ký</a>
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
    <div class="pt-28">
        <h1 class="text-center text-3xl font-bold text-indigo-700 sm:text-4xl pb-10">PHÒNG THÍ NGHIỆM</h1>
    </div>

    @php $first = true; @endphp
    @foreach ($labs as $l)
    <div class="max-w-9xl flex items-center justify-center flex-wrap mx-auto my-32 lg:my-0 px-32 pt-12 {{ $first ? '' : ' ml-auto' }} {{ $loop->odd ? 'odd' : 'even' }}">
        @if ($loop->odd)
        <!--Img Col-->
        <div class="w-1/4 lg:w-1/4">
            <!-- Big profile image for side bar (desktop) -->
            <img src="{{ asset('images/' . $l->image) }}" class="h-full w-full ">
            <!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->
        </div>
        @endif

        <!--Main Col-->
        <div id="profile" class="w-full lg:w-3/5  shadow-2xl bg-white opacity-100 mx-6 lg:mx-0">
            <div class="p-10 md:p-12 text-center lg:text-left">
                <!-- Image for mobile view-->
                <div class="block lg:hidden rounded-full shadow-1xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center" style="background-image: url('{{ asset('images/' . $l->image) }}')"></div>

                <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{ $l->TenPTN }}</h1>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
                <p class="pt-2 text-xl">{{ $l->Nhiemvu }}</p>
                <a href="{{ route('phong', ['id'=>$l->id]) }}">Xem thêm</a>
            </div>
        </div>

        @if (!$loop->odd)
        <!--Img Col-->
        <div class="w-1/4 lg:w-1/4">
            <!-- Big profile image for side bar (desktop) -->
            <img src="{{ asset('images/' . $l->image) }}" class="h-full w-full ">
            <!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->
        </div>
        @endif
    </div>
    @php $first = false; @endphp
    @endforeach`
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131505823-4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-131505823-4');
    </script>

</body>

</html>