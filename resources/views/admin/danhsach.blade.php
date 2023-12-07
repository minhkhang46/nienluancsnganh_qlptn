<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Hệ Thống Quản Lý</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/vi.js'></script>
    <style>
        #calendar {
            margin: auto;
        }
      
        .fc-left h2 {
            font-size: 30px; /* Đặt kích thước mong muốn ở đây */
        }


        #calendar {
            width: 1020px;
            height: 850px;
            /* Thêm các thuộc tính CSS khác cho lịch của bạn */
        }

        .fc-content{
            font-size: 17px;
            color: black;
        }
    </style>
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

    <div class="px-20 py-20">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full-x-auto ">
            <h1 class="font-semibold text-3xl text-indigo-600 mb-8 text-center">Bảng Danh Sách Đăng Ký</h1>
            <form class="flex justify-end pb-2" action="{{ route('danhsachadmin') }}" method="GET">
            
                <input 
                type="text"
                name="keyword"
                placeholder="Tìm kiếm..." 
                class="border border-gray-300  px-4 py-2 w-96"
                value="{{ session('search_keyword') }}">
            
                <button 
                type="submit">
                    <img src="/my-project2/public/images/magnifying-glass.png" alt="Logo" class="h-10 px-4 py-2 bg-white "> 
                </button>
          
          </form>
                <table class="w-full whitespace-no-wrap">
                    @php
                            $datas = $datas->sort(function($a, $b) {
                                return strtotime($b->date) - strtotime($a->date); 
                            });
                        @endphp
                    <thead>
                        <tr
                            class="text-lg text-center font-semibold tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Họ Tên</th>
                            <th class="px-4 py-3">Phòng Thí Nghiệm</th>
                            <th class="px-4 py-3">Tổng Số</th>
                            <th class="px-4 py-3">Thời Gian</th>
                            <th class="px-4 py-3">Ngày</th>
                            <th class="px-4 py-3">Xóa</th>
                            <!-- <th class="px-4 py-3">Cập Nhật</th> -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-xl text-center">
                    @if(session('search_keyword'))
                        @if(count($datas) == 0)
                            <tr>
                                <td colspan="7" class="text-center text-red-600 p-2 text-2xl">Không Tồn Tại Người Dùng </td>
                            </tr>
                        @else
                            @foreach ($datas as $r)
                                @php
                                $datas = $datas->sort(function($a, $b) {
                                    return strtotime($b->date) - strtotime($a->date); 
                                });
                                @endphp
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">{{$r->ID_User}}</td>
                                    <td class="px-4 py-3">{{$r->full_name}}</td>
                                    <td class="px-4 py-3">{{$r->lab_name}}</td>
                                    <td class="px-4 py-3">{{$r->quantity}}</td>
                                    <td class="px-4 py-3">{{$r->registration_time}}</td>
                                    <td class="px-4 py-3">{{$r->date}}</td>

                                    <td class="px-4 py-3">
                                        <a onclick="delete_route('{{ $r->id}}');" class="flex justify-center items-center">
                                            <img src="/my-project2/public/images/delete.png" alt="Logo" class="h-12">
                                        </a>

                                        <form id="delete-form" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        @endif
                    @else
                        @php
                            $datas = $datas->sort(function($a, $b) {
                                return strtotime($b->date) - strtotime($a->date); 
                            });
                        @endphp
                     

                        @foreach ($datas as $r)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{$r->ID_User}}</td>
                            <td class="px-4 py-3">{{$r->full_name}}</td>
                            <td class="px-4 py-3">{{$r->lab_name}}</td>
                            <td class="px-4 py-3">{{$r->quantity}}</td>
                            <td class="px-4 py-3">{{$r->registration_time}}</td>
                            <td class="px-4 py-3">{{$r->date}}</td>

                            <td class="px-4 py-3">
                                <a onclick="delete_route('{{ $r->id}}');" class="flex justify-center items-center">
                                    <img src="/my-project2/public/images/delete.png" alt="Logo" class="h-12">
                                </a>

                                <form id="delete-form" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h1 class="font-semibold text-3xl text-indigo-700 mb-2 mt-5 text-center ">Lịch Phòng Thí Nghiệm</h1>
    <div class="bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg mx-72 mt-18 ">
       
                <!-- Calendar -->
                <div class="bg-white rounded-sm my-8 mx-6">
                    <div class="container pt-4">
                        <div class="response"></div>
                        <div id='calendar'></div>  
                    </div>
                </div>
    </div>
    
    <script>
    function delete_route(id) {
        swal({
                title: "Xác nhận xóa?",
                text: "Bạn có chắc chắn muốn xóa đăng ký?",
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

        form.action = "{{ route('delete_route', ['id' => ':id']) }}";

        form.action = form.action.replace(':id', id);

        form.submit();

    }
    </script>
    <script>
    $(document).ready(function () {
        function capitalizeFirstLetter(string) {
             return string.charAt(0).toUpperCase() + string.slice(1);
        }

        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#calendar').fullCalendar({
            locale: 'vi',
            editable: true,
            events: "{{ route('calendaradmin') }}",
            displayEventTime: true,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
                if (view.name == 'month') {
                    // Áp dụng hàm capitalizeFirstLetter cho các chuỗi khác nhau
                    $('.fc-left h2').text(capitalizeFirstLetter($('.fc-left h2').text()));
                    $('.some-other-class').text(capitalizeFirstLetter($('.some-other-class').text()));
                    // Thay thế '.some-other-class' bằng các lớp CSS hoặc các phần tử khác cần viết hoa chữ cái đầu
                }
            },
            selectable: true,
            selectHelper: true,
            // select: function (start, end, allDay) {
            //     var title = prompt('Event Title:');

            //     if (title) {
            //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

            //         $.ajax({
            //             url: SITEURL + "/fullcalendar/create",
            //             data: {'title' : title, 'start': start, 'end': end},
            //             type: "POST",
            //             success: function (data) {
            //                 displayMessage("Added Successfully");
            //             }
            //         });
            //         calendar.fullCalendar('renderEvent',
            //             {
            //                 title: title,
            //                 start: start,
            //                 end: end,
            //                 allDay: allDay
            //             },
            //             true
            //         );
            //     }
            //     calendar.fullCalendar('unselect');
            // },

            // eventDrop: function (event, delta) {
            //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            //     $.ajax({
            //         url: SITEURL + '/fullcalendar/update',
            //         data: {'title': event.title, 'start': start, 'end': end, 'id': event.id},
            //         type: "POST",
            //         success: function (response) {
            //             displayMessage("Updated Successfully");
            //         }
            //     });
            // },

            // eventClick: function (event) {
            //     var deleteMsg = confirm("Do you really want to delete?");
            //     if (deleteMsg) {
            //         $.ajax({
            //             type: "POST",
            //             url: SITEURL + '/fullcalendar/delete',
            //             data: {'id': event.id},
            //             success: function (response) {
            //                 if(parseInt(response) > 0) {
            //                     $('#calendar').fullCalendar('removeEvents', event.id);
            //                     displayMessage("Deleted Successfully");
            //                 }
            //             }
            //         });
            //     }
            // }

        });
    });

    function displayMessage(message) {
        $(".response").html("<div class='success'>"+message+"</div>");
        setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
</script>
        @if (Session::has('Xóa Thất Bại'))
        <script>
        window.onload = function() {
            swal('Xóa Thất Bại', '{{ Session::get('
                Xóa Thất Bại ') }}', 'error', {
                    button: true,
                    button: 'OK',
                    timer: 5000,
                });
        }
        </script>
        @endif
        @if (Session::has('Xóa Thành Công') && Session::get('Xóa Thành Công') !== false)
        <script>
            window.onload = function() {
                swal('Xóa Thành Công', '{{ Session::get('Xóa Thành Công') }}', 'success').then(function() {
                    window.location.href = '{{ route('danhsachadmin') }}';
                });
            }
        </script>
     @endif


</body>

</html>