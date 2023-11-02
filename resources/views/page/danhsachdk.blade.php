<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
     <title>Hệ Thống Quản Lý</title>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

<body style="background-image: url('/my-project2/public/images/anhnen5.png'); background-size: cover; background-repeat: repeat; background-position: center; justify-content: center; align-items: center; height: 100vh;">
   

<div class="antialiased font-sans text-gray-900">
        <nav class="bg-white ">
            <div class="flex flex-wrap items-center justify-center max-w-screen-xl mx-auto ">
                 <img src="/my-project2/public/images/logo_3.png" alt="Logo" class="h-24 mr-12 "> 
                <div class="flex items-center md:order-2 px-8 ">
                    <a href="{{url('/login')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-8 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800  text-xl">Đăng Nhập</a>
                    <button data-collapse-toggle="mega-menu" type="button" class="inline-flex items-center p-4 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                    
                </div>
                
                <div id="mega-menu" class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1 ">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                        <li>
                            <a href="{{route('trangchu1')}}" class="block py-2 pl-3 pr-4 text-xl text-blue-600 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-blue-500 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Trang Chủ</a>
                        </li>
                        <li>
                        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                        <div class="dropdown inline-block relative">
                            <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="  text-xl flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Danh Mục <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg>
                            </button>
                            <ul class="dropdown-menu fixed hidden text-gray-700 pl-2">
                            @foreach($labs as $l)
                                <li class=""><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{route('Phongtn', ['id'=>$l->id])}}">{{$l->TenPTN}}</a></li>                     
                            @endforeach
                            
                            </ul>
                        </div>
                        </div>
                        </li>
                        <li>
                            <a href="{{route('calendarpage')}}" class="  text-xl block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Lịch Phòng Thí Nghiệm</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="bg-gray-500 overflow-hidden shadow-sm sm:rounded-lg mx-72 mt-20 ">
       
       <!-- Calendar -->
       <div class="bg-white rounded-sm my-8 mx-6">
           <div class="container pt-4">
               <div class="response"></div>
               <div id='calendar'></div>  
           </div>
       </div>
    </div>
    <div class="px-20 py-20">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full-x-auto ">
            <h1 class="font-semibold text-3xl text-indigo-700 mb-8 text-center ">Danh Sách Đăng Ký</h1>
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-lg text-center font-semibold tracking-wide  text-black-600 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Họ Tên</th>
                            <th class="px-4 py-3">Phòng Thí Nghiệm</th>
                            <th class="px-4 py-3">Tổng Số</th>
                            <th class="px-4 py-3">Thời Gian</th>
                            <th class="px-4 py-3">Ngày</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-xl text-center">
    
						@php
							$registeredSlots = []; // Mảng lưu trữ các giá trị đã được đăng ký trước đó
						@endphp
                        
						@foreach ($datas as $r)
							@php
								$slot = $r->date . $r->registration_time . $r->lab_name; // Kết hợp ngày, giờ và phòng lab thành một chuỗi duy nhất
							@endphp

							@if (!in_array($slot, $registeredSlots))
								@php
									$registeredSlots[] = $slot; // Thêm giá trị vào mảng đã đăng ký
								@endphp

								<tr class="text-black-600 dark:text-black-400">
									<td class="px-4 py-3">{{$r->ID_User}}</td>
									<td class="px-4 py-3">{{$r->full_name}}</td>
									<td class="px-4 py-3">{{$r->lab_name}}</td>
                                    <td class="px-4 py-3">{{$r->quantity}}</td>
									<td class="px-4 py-3">{{$r->registration_time}}</td>
									<td class="px-4 py-3">{{$r->date}}</td>
								</tr>
							@endif
						@endforeach 

                    </tbody>
                </table>
            </div>
  
        </div>
	</div>
 
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
            events: "{{ route('calendarpage') }}",
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
</body>

</html>