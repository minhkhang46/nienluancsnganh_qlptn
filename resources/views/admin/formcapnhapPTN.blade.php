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

<body style="background-color: rgb(186 230 253)">
    @foreach ($labs as $l)
        <form action="{{ route('update_lab', ['id' => $l->idPTN]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="pt-48 flex items-center justify-center">
                <div class="container max-w-screen-lg mx-auto">
                    <div>
                        <h1 class="font-semibold text-3xl text-indigo-700 mb-8 text-center ">Cập Nhật Phòng Thí Nghiệm</h1>
                       
                  
                        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6 flex flex-wrap">
                            <div class="w-full md:w-1/2 pr-2">
                                <label for="idPTN">ID Phòng Thí Nghiệm</label>
                                <input type="text" name="idPTN" id="idPTN"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$l->idPTN}}"
                                    placeholder="Nhập ID Phòng Thí Nghiệm" readonly />
                            </div>
                            <div class="w-full md:w-1/2 pl-2">
                                <label for="TenPTN">Tên Phòng Thí Nghiệm</label>
                                <input type="text" name="TenPTN" id="TenPTN"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$l->TenPTN}}" readonly
                                     />
                            </div>
                            <div class="w-full">
                                <label for="Nhiemvu">Nhiệm Vụ</label>
                                <textarea type="text" name="Nhiemvu" id="Nhiemvu" l
                                    class="h-20 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$l->Nhiemvu}}"
                                    placeholder="Nhập Nhiệm vụ"></textarea>
                            </div>
                            <div class="w-full">
                                <label for="Nghiencuu">Hướng Nghiên Cứu</label>
                                <textarea type="text" name="Nghiencuu" id="Nghiencuu" value="{{$l->Nghiencuu}}"
                                    class="h-20 border mt-1 rounded px-4 w-full bg-gray-50"
                                    placeholder="Nhập Hướng Nghiên Cứu"></textarea>

                            </div>
                            <div class="w-full">
                            <label for="image">Hình ảnh</label>
                            <input type="file" name="image" id="image" class="border mt-1 rounded w-full bg-gray-50" value="{{$l->imageName}}">
                        </div>
                        </div>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center w-full mt-4  justify-center"
                            type="submit">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    </div>
   

    @if (Session::has('Cập Nhật Thất Bại'))
    <script>
    window.onload = function() {
        swal('Cập Nhật Thất Bại', '{{ Session::get('
            Cập Nhật Thất Bại ') }}', 'error', {
                button: true,
                button: 'OK',
                timer: 5000,
            });
    }
    </script>
    @endif

    @if (Session::has('Cập Nhật Thành Công') && Session::get('Cập Nhật Thành Công') !== false)
    <script>
    window.onload = function() {
        swal('Cập Nhật Thành Công', '{{ Session::get('
            Cập Nhật Thành Công ') }}', 'success').then(function() {
            window.location.href = '{{ route('dsPTN') }}';
        });
    }
    </script>
    <?php Session::forget('Cập Nhật Thành Công'); ?>
    @endif
</body>

</html>