<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Hệ Thống Quản Lý</title>
</head>

<body style="background-image: url('/my-project2/public/images/anhnen5.png'); background-size: cover; background-repeat: repeat; background-position: center; justify-content: center; align-items: center; height: 100vh;">
    <nav class="bg-white px-40" style="display: flex; align-items: center;">
        <a href="{{route('trangchu1')}}" style="display: flex; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="back" class="h-15 w-12">
                <g data-name="Left arrow">
                    <path fill="#8c9eff"
                        d="M25 15H9.14l3.63-4.36a1 1 0 0 0-1.54-1.28l-5 6a1.19 1.19 0 0 0-.09.15c0 .05 0 .08-.07.13A1 1 0 0 0 6 16a1 1 0 0 0 .07.36c0 .05 0 .08.07.13a1.19 1.19 0 0 0 .09.15l5 6A1 1 0 0 0 12 23a1 1 0 0 0 .64-.23 1 1 0 0 0 .13-1.41L9.14 17H25a1 1 0 0 0 0-2Z">
                    </path>
                    <path fill="#5f7cf9"
                        d="M6.07 16.36c0 .05 0 .08.07.13a1.19 1.19 0 0 0 .09.15l5 6A1 1 0 0 0 12 23a1 1 0 0 0 .64-.23 1 1 0 0 0 .13-1.41L9.14 17H25a1 1 0 0 0 1-1H6a1 1 0 0 0 .07.36Z">
                    </path>
                </g>
            </svg>
        </a>
        <div class="max-w-xs" style="display: flex; align-items: center;">
            <img src="/my-project2/public/images/logo_3.png" alt="Logo" class="h-24 ml-16">
        </div>
    </nav>
    <section class=" bg-gray-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-5 " style="background-color: rgb(243 244 246)">
        
        @foreach($ptn as $p)
        <div class="flex flex-col lg:flex-row lg:-mx-8">
            <div class="w-full ">
                <h1 class="text-2xl leading-tight font-bold text-center text-blue-700">{{$p->TenPTN}}</h1>
                <!-- <h2 class="text-xl leading-tight font-bold mt-4 text-center text-blue-700">MATERIALS TECHNOLOGY
                    LABORATORY</h2> -->
                <div class="mt-8 flex items-center justify-center">
                    <img src="{{ asset('images/' . $p->image) }}" alt="Hình ảnh" class="w-4/12 ">
                </div>
                <h3 class="text-xl leading-relaxed mt-5 px-64 text-blue-700">Nhiệm vụ</h3>
                <p class="mt-2 leading-relaxed px-72 text-justify">{{$p->Nhiemvu}}</p>

                <h3 class="text-xl leading-relaxed mt-3 px-64 text-blue-700">Hướng nghiên cứu</h3>
                <p class="mt-2 leading-relaxed px-72 text-justify">{{$p->Nghiencuu}}</p>
                
            </div>
        </div>
        @endforeach
        <div class="flex flex-col lg:flex-row lg:-mx-8">
            <h3 class="text-xl leading-relaxed mt-3 px-64 text-blue-700">Trang thiết bị</h3>
        </div>
        <div class="relative overflow-x-auto px-56 pt-5 ">
            <table class="table-fixed text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xm text-gray-900 uppercase bg-gray-400 dark:bg-gray-900">
                    <tr>
                        <th scope="col" class="text-center px-6 py-3">Tên Thiết Bị</th>
                        <th scope="col" class="text-center px-6 py-3">Tính Năng Thiết Bị</th>
                        <th scope="col" class="text-center px-6 py-3">Tình Trạng Thiết Bị</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Devis as $d)
                    @if($d->idphong === $p->idPTN)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 test-sm">
                            <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white text-justify">{{$d->tenthietbi}}</th>
                            <th scope="row" class="px-6 py-4 text-gray-600 text-justify">{{$d->tinhnang}}</th>
                            <th scope="row" class="px-6 py-4  text-gray-600 text-justify">{{$d->tinhtrang}}</th>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

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