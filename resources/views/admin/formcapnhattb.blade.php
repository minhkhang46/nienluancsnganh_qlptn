<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Hệ Thống Quản Lý</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body
    style="background-image: url('/my-project2/public/images/anhnen5.png'); background-size: cover; background-repeat: repeat; background-position: center; justify-content: center; align-items: center; height: 100vh;"">
<div class=" antialiased font-sans text-gray-900">
    <nav class="bg-white ">
        <div class="flex flex-wrap items-center justify-center">
            <a href="{{route('dasboard')}}">
                <img src="/my-project2/public/images/logo_3.png" alt="Logo" class="h-24 mr-10 ">
            </a>
            <div class="flex items-center md:order-2 px-8 ">
                <a class=" mr-1 md:mr-2">

                    <span
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-8 py-5 md:px-5 md:py-2.5 ml-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        href="{{url('/login')}}">Xin chào, {{ session('name') }}</span>

                    <button data-collapse-toggle="mega-menu" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-xl text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mega-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                    <div class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 pr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{route('logout')}}" class=" text-xl flex flex-col mt-4 font-medium md:flex-row md:space-x-8 
                            md:mt-0 py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent 
                            md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 
                            dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Đăng Xuất</a>
                </a>

            </div>
        </div>

        <div id="mega-menu" class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1 ">
            <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
           
                <li>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                        <div class="dropdown inline-block relative">
                            <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                                class="text-xl flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Tài Khoản <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu fixed hidden text-gray-700 pl-2">
                                <li class=""><a
                                        class="rounded-b bg-gray-200 text-xl hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                        href="{{route('account')}}">Tạo Tài Khoản</a></li>
                                <li class=""><a
                                        class="rounded-b bg-gray-200 text-xl hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                        href="{{route('accounts')}}">Danh Sách Tài Khoản</a></li>

                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                        <div class="dropdown inline-block relative">
                            <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                                class="text-xl flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Phòng Thí Nghiệm và Thiết Bị <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu fixed hidden text-gray-700 pl-2">
                                <li class=""><a
                                        class="rounded-b bg-gray-200 text-xl hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                        href="{{route('PTNghiem1')}}">Tạo Phòng Thí Nghiệm</a></li>
                                <li class=""><a
                                        class="rounded-b bg-gray-200 text-xl hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                        href="{{route('dsPTN')}}">Danh Sách Phòng Thí Nghiệm</a></li>
                                <li class=""><a
                                        class="rounded-b bg-gray-200 text-xl hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                        href="{{route('ThietBi')}}">Thiết Bị</a></li>
                                <li class=""><a
                                        class="rounded-b bg-gray-200 text-xl hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                        href="{{route('dsthietbi')}}">Danh Sách Thiết Bị</a></li>

                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{route('timetg')}}"
                        class="text-xl block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Thời
                        Gian</a>
                </li>
                <li>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                        <div class="dropdown inline-block relative">
                            <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                                class="text-xl flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Tùy Chỉnh Phòng Thí Nghiệm<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none"
                                    viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu fixed hidden text-gray-700 pl-2">
                                <li class=""><a
                                        class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 text-xl block whitespace-no-wrap"
                                        href="{{route('calendaradmin')}}">Danh Sách Đăng Ký</a></li>
                                <li class=""><a
                                        class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 text-xl block whitespace-no-wrap"
                                        href="{{route('dsYeuCau')}}">Danh Sách Yêu Cầu Cập Nhật</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    </div>

    <form action="{{ route('update_tb', ['id' => $d->idthietbi]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="pt-48 flex items-center justify-center">
                <div class="container max-w-screen-lg mx-auto">
                    <div>
                        <h1 class="font-semibold text-3xl text-indigo-700 mb-8 text-center ">Cập Nhật Phòng Thí Nghiệm</h1>
                       
                  
                        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6 flex flex-wrap">
                            <div class="w-full md:w-1/2 pr-2">
                                <label for="idPTN">ID Thiết Bị/label>
                                <input type="text" name="idPTN" id="idPTN"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=" {{$d->idthietbi }}"
                                    placeholder="Nhập ID Phòng Thí Nghiệm" readonly />
                            </div>
                            <div class="w-full md:w-1/2 pl-2">
                                <label for="TenPTN">Tên Thiết Bị</label>
                                <input type="text" name="TenPTN" id="TenPTN"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$d->tenthietbi}}" readonly
                                     />
                            </div>
                            <div class="w-full">
                                <label for="tinhtrang">Tình Trạng</label>
                                <select name="tinhtrang" id="tinhtrang" class="h-10 border rounded px-4 w-full bg-gray-50"  value="">
                                    <option >{{$d->tinhtrang}}</option>
                                    <option>Được sử dụng</option>
                                    <option>Bảo trì</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="tinhnang">Tính Năng</label>
                                <textarea type="text" name="tinhnang" id="tinhnang"
                                    class="h-20 border mt-2 pt-2 rounded px-4 w-full bg-gray-50"
                                    placeholder="Nhập Tính Năng">{{$d->tinhnang }}</textarea>
                            </div>
                           
                        </div>
                        </div>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center w-full mt-4  justify-center"
                            type="submit">Cập Nhật</button>
                    </div>
                </div>
            </div>
    </form>



   
    </div>
    @if (Session::has('Thiết Bị Đã Tồn Tại'))
    <script>
    window.onload = function() {
        swal('Thiết Bị Đã Tồn Tại', '{{ Session::get('
            Thiết Bị Đã Tồn Tại ') }}', 'error', {
                button: true,
                button: 'OK',
                timer: 5000,
            });
    }
    </script>
    @endif

    @if (Session::has('Cập Nhật Thành Công'))
        <script>
            window.onload = function() {
                swal('Cập Nhật Thành Công', '{{ Session::get('Cập Nhật Thành Công') }}', 'success').then(function() {
                    window.location.href = '{{ route('dsthietbi') }}';
                });
            }
        </script>
    @endif
</body>

</html>