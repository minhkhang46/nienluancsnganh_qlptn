<!-- search.blade.php -->

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
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

    <!-- nho them vao -->
    <div class="px-20 py-20">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full-x-auto ">
            <h1 class="font-semibold text-3xl text-indigo-700 mb-8 text-center ">Danh Sách Đăng Ký</h1>
            <form action="{{ route('search') }}" method="GET">
            
            <input 
              type="text" 
              name="keyword"
              placeholder="Nhập từ khóa tìm kiếm..."
              value="{{ $keyword }}"
            >
          
            <button type="submit">Tìm kiếm</button>
          
          </form>
            
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-lg text-center font-semibold tracking-wide text-black-600 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Họ Tên</th>
                            <th class="px-4 py-3">Phòng Thí Nghiệm</th>
                            <th class="px-4 py-3">Tổng Số</th>
                            <th class="px-4 py-3">Thời Gian</th>
                            <th class="px-4 py-3">Ngày</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800 text-xl text-center">
                   
                    @if(count($users) > 0)
                        <ul>
                            @foreach($users as $user)
                            <tr class="text-black-700 dark:text-gray-400">
                                        <td class="px-4 py-3">{{$user->ID_User}}</td>
                                        <td class="px-4 py-3">{{$user->full_name}}</td>
                                        <td class="px-4 py-3">{{$user->lab_name}}</td>
                                        <td class="px-4 py-3">{{$user->quantity}}</td>
                                        <td class="px-4 py-3">{{$user->registration_time}}</td>
                                        <td class="px-4 py-3">{{$user->date}}</td>
                                        <td class="px-4 py-3">
                                            <a href ="{{route('YeuCau', ['id' => $user->id])}}" >
                                                <img src="/my-project2/public/images/edit.png" alt="Logo" class="h-10 "> 
                                            </a>
                                    
                                        </td>
                                    </tr>
                            @endforeach
                        </ul>
                        @else
                        <p class="text-red-600 font-semibold text-2xl pb-5 text-center">Không Tìm Thấy Kết Quả</p>
                        @endif

                    </tbody>
                </table>
            </div>
  
        </div>
	</div>    
    

     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />  -->
    <script>
   
    function displayMessage(message) {
        $(".response").html("<div class='success'>"+message+"</div>");
        setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
</script>

</body>

</html>