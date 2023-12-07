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

<body style="background-image: url('/my-project2/public/images/anhnen5.png'); background-size: cover; background-repeat: repeat; background-position: center; justify-content: center; align-items: center; height: 100vh;"">
<div class="antialiased font-sans text-gray-900">
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
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
                                    Tùy Chỉnh Phòng Thí Nghiệm<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                        fill="none" viewBox="0 0 10 6">
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

    </div>
    
    <form method="POST" action="{{route('times')}}">
        @csrf
        <div class="pt-44 flex items-center justify-center">
            <div class="container max-w-screen-lg mx-auto">
                <h1 class="font-semibold text-3xl text-indigo-700 mb-8 text-center ">Thời Gian</h1>
                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="ThoiGianBd">Thời Gian Bắt Đầu</label>
                            <input type="time" name="ThoiGianBd" id="ThoiGianBd"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" require />
                        </div>
                        <div>
                            <label for="ThoiGianKT">Thời Gian Kết Thúc</label>
                            <input type="time" name="ThoiGianKT" id="ThoiGianKT"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" require />
                        </div>
                    </div>

                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center w-full mt-4 justify-center"
                        type="submit">Tạo Thời Gian</button>
                </div>
    </form>
    <div>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-lg text-center font-semibold tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <!-- <th class="px-4 py-3">ID</th> -->
                    <th class="px-4 py-3">Thoi Gian Bắt Đầu</th>
                    <th class="px-4 py-3">Thời Gian Kết Thúc</th>
                    <th class="px-4 py-3">Xóa</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-xl text-center">
                @foreach ($datas as $t)
                <tr class="text-gray-700 dark:text-gray-400">
                    <!-- <td class="px-4 py-3">{{$t->id}}</td> -->
                    <td class="px-4 py-3">{{$t->ThoiGianBd}}</td>
                    <td class="px-4 py-3">{{$t->ThoiGianKT}}</td>
                    <td class="px-4 py-3">
                        <a onclick="delete_tg('{{ $t->id }}');" class="flex justify-center items-center">
                            <img src="/my-project2/public/images/delete.png" alt="Logo" class="h-12">
                        </a>

                        <form id="delete-form" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
    function delete_tg(id) {
        swal({
                title: "Xác nhận xóa?",
                text: "Bạn có chắc chắn muốn xóa thời gian ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    submitForm(id);
                } else {
                    swal("Đã hủy", "Việc xóa đã bị hủy", "error");
                }
            });

    }
    </script>
    <script>
    function submitForm(id) {

        var form = document.getElementById('delete-form');

        form.action = "{{ route('delete_tg', ['id' => ':id']) }}";

        form.action = form.action.replace(':id', id);

        form.submit();

    }
    </script>
    @if (Session::has('Xóa Thất Bại'))
        <script>
        window.onload = function() {
            swal('Xóa Thất Bại', '{{ Session::get('Xóa Thất Bại') }}', 'error',{
                button:true,
                button:'OK',
                timer:5000,
            });
        }
        </script>
    @endif
    
    @if (Session::has('Xóa Thành Công') && Session::get('Xóa Thành Công') !== false)
        <script>
            window.onload = function() {
                swal('Xóa Thành Công', '{{ Session::get('Xóa Thành Công') }}', 'success').then(function() {
                    window.location.href = '{{ route('timetg') }}';
                });
            }
        </script>
     @endif


     @if (Session::has('Tạo Thành Công'))
        <script>
        window.onload = function() {
            swal('Tạo Thành Công', '{{ Session::get('Tạo Thành Công') }}', 'success').then(function() {
            window.location.href = '{{ route('timetg') }}';
            });
        }
        </script>
    @endif

</body>

</html>