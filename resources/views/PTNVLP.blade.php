<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="stylesheet" href="build/tailwind.css">
    @vite('resources/css/app.css')
    <title>Hệ Thống Quản Lý</title>
</head>

<body class="antialiased bg-white font-sans text-gray-900" style="background-color: rgb(186 230 253)">
    <nav class="bg-white ">
        <div class="flex flex-wrap items-center justify-center max-w-screen-xl mx-auto py-4">

            <div class="flex items-center md:order-2 ">
                <a class="mr-1 md:mr-2">
                    @if(session()->has('name'))
                    <span
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-5 md:px-5 md:py-2.5 ml-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        href="{{url('/login')}}">Xin chào, {{ session('name') }}</span>
                    @else
                    <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
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
                <div class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1 ">
                    @if(session()->has('name'))
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 pr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <a href="{{url('/logout')}}"
                        class=" flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0 py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Đăng
                        xuất</a>
                    </a>
                    @endif
                </div>
            </div>

            <div id="mega-menu" class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1 ">
                <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="{{url('/welcome')}}"
                            class="block py-2 pl-3 pr-4 text-blue-600 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-blue-500 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                            aria-current="page">Trang Chủ</a>
                    </li>
                    <li>
                        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                            <div class="dropdown inline-block relative">
                                <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                    Danh Mục <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" fill="none"
                                        viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu fixed hidden text-gray-700 pl-2">
                                    <li class=""><a
                                            class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{url('/PTNCNVL')}}">Phòng Thí Nghiệm Công Nghệ Vật Liệu</a></li>
                                    <li class=""><a
                                            class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{url('/PTNKTVL')}}">Phòng Thí Nghiệm Kỹ Thuật Vật Liệu</a></li>
                                    <li class=""><a
                                            class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{url('/PTNVLYS')}}">Phòng Thí Nghiệm Vật Liệu Y Sinh</a></li>
                                    <li class=""><a
                                            class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                            href="{{url('/PTNVLP')}}">Phòng Thí Nghiệm Vật Liệu Polymer</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{url('/lich')}}"
                            class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Danh
                            Sách Đăng Ký</a>
                    </li>
                    <li>
                        <a href="{{url('/dk')}}"
                            class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Đăng
                            Ký Phòng Thí Nghiệm</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class=" bg-gray-100 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-16 lg:py-28"
        style="background-color: rgb(243 244 246)">
        <div class="flex flex-col lg:flex-row lg:-mx-8">
            <div class="w-full ">
                <h1 class="text-2xl leading-tight font-bold mt-4 text-center text-blue-700">PHÒNG THÍ NGHIỆM VẬT LIỆU
                    POLYMER</h1>
                <h2 class="text-xl leading-tight font-bold mt-4 text-center text-blue-700">POLYMER MATERIALS LABORATORY
                </h2>
                <h3 class="text-xl leading-relaxed mt-5 px-64 text-blue-700">Nhiệm vụ</h3>
                <p class="mt-2 leading-relaxed px-72 text-justify">Phòng thí nghiệm vật liệu polymer được xây dựng hỗ
                    trợ công tác đào tạo, PTN thực hiện các nhiệm vụ nghiên cứu khoa học,
                    thử nghiệm, triển khai công nghệ cao về polymer..</p>

                <h3 class="text-xl leading-relaxed mt-3 px-64 text-blue-700">Hướng nghiên cứu</h3>
                <ul class="mt-2 leading-relaxed px-72 text-justify">
                    <li>Chế tạo vật liệu mới bằng phương pháp trộn hợp polymer</li>
                    <li>Chế tạo và ứng dụng nanocellulose từ các nguồn phụ/phế phẩm nông nghiệp</li>
                    <li>Tái chế nhựa</li>
                    <li>Chế tạo vật liệu composite/nanocomposite</li>
                </ul>
                <h3 class="text-xl leading-relaxed mt-3 px-64 text-blue-700">Phòng thí nghiệm</h3>
                <div class="mt-2 leading-relaxed px-72">
                    <a class="text-justify">Phòng thí nghiệm vật liệu polymer 1 </a>
                    <div class="flex items-center mb-4 px-10">
                        <input id="default-radio-1" type="radio" value="" name="default-radio"
                            class="mt-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="mt-2 leading-relaxed px-2">Phòng đã đăng ký</label>
                    </div>
                    <div class="flex items-center mb-2 px-10">
                        <input id="default-radio-1" type="radio" value="" name="default-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="leading-relaxed px-2">Phòng chưa đăng ký</label>
                    </div>
                    <a class="text-justify">Phòng thí nghiệm vật liệu polymer 2 </a>
                    <div class="flex items-center mb-4 px-10">
                        <input id="default-radio-1" type="radio" value="" name="default-radio"
                            class="mt-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="mt-2 leading-relaxed px-2">Phòng đã đăng ký</label>
                    </div>
                    <div class="flex items-center mb-2 px-10">
                        <input id="default-radio-1" type="radio" value="" name="default-radio"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="leading-relaxed px-2">Phòng chưa đăng ký</label>
                    </div>
                </div>
                <h3 class="text-xl leading-relaxed mt-3 px-64 text-blue-700">Trang thiết bị</h3>
                <div class="relative overflow-x-auto px-64 ">
                    <table class="table-fixed text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xm text-gray-700 uppercase bg-gray-400 dark:bg-gray-900 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="text-center px-6 py-3">Tên Thiết Bị</th>
                                <th scope="col" class="text-center px-64 py-3">Tính Năng Thiết Bị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 test-sm">
                                <th scope="row"
                                    class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white text-justify"> Kính
                                    hiển vi huỳnh quang</th>
                                <td class="px-40 py-4 text-gray-900 text-justify">Khảo sát cấu trúc vật liệu</td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 test-sm">
                                <th scope="row"
                                    class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white text-justify"> Đèn
                                    UV</th>
                                <td class="px-40 py-4 text-gray-900 text-justify">Chế tạo vật liệu bằng phản ứng quang
                                    hóa</td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 test-sm">
                                <th scope="row"
                                    class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white text-justify">Tủ vi
                                    khí hậu</th>
                                <td class="px-40 py-4 text-gray-900 text-justify"> Khảo sát/đánh giá ảnh hưởng của môi
                                    trường đến tính chất của vật liệu</td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 test-sm">
                                <th scope="row"
                                    class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white text-justify"> Máy
                                    đo điện trở bề mặt</th>
                                <td class="px-40 py-4 text-gray-900 text-justify">Đánh giá tính chất điện của vật liệu
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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