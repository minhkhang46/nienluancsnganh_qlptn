<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Time;
use App\Models\Lab;
use App\Models\Registration;
use App\Models\Device;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Response;


class DeviceController extends Controller
{
    public function showdeviceForm(){
        
        return view('admin.formthietbi');
    }


    public function Devices(): View
    {  
         
        $Devis = Device::all();
     
        return view('admin.dsthietbi')->with('Devis', $Devis);
    }

    
    public function creatdevice(Request $request): RedirectResponse
    {
       
        $tbTonTai = Device::where('idthietbi', $request->idthietbi)->where('idphong', $request->idphong)->first();
            
        if ($tbTonTai) {
            return redirect()->back()->with('Thiết Bị Đã Tồn Tại', 'Thiết Bị Đã Tồn Tại');
        }

        $Devi = Device::create([
            'idphong' => $request->idphong,
            'idthietbi' => $request->idthietbi,
            'tenthietbi' => $request->tenthietbi,
            'tinhtrang' => $request->tinhtrang,
            'tinhnang' => $request->tinhnang,
        ]);
        
        event(new Registered($Devi));
      
        $Devis = Device::all();
       
        return redirect()->route('ThietBi', ['Devis' => $Devis])->with('Thêm Thiết Bị Thành Công', 'Thêm Thiết Bị Thành Công');
    }

    public function deletedevice($id)
    {
        $Devis = Device::where('idthietbi', $id)->first();
        if ($Devis) {
            $Devis->delete();
            Session::flash('Xóa Thành Công', 'Xóa thành công.');
        } else {
            
            Session::flash('Xóa Thất Bại', 'Xóa thất bại.');
        }

        return redirect()->route('dsthietbi');
    }
    
    public function updatedevice($id, Request $request)
    {
        $Devis = Device::where('idthietbi', $id)->first(); // Tìm người dùng theo ID
        if ($Devis) {
            // $datas->update(['quantity' => $request->input('quantity')]);
            // $datas->update(['registration_time' => $request->input('registration_time')]);
            // $datas->update(['date' => $request->input('date')]);
            $Devis->fill([
                'tinhtrang' => $request->input('tinhtrang'),
                'tinhnang' => $request->input('tinhnang'),
            ]);
           
            $Devis->save();
            // dd($datas);
            // Thực hiện cập nhật các trường khác tùy thuộc vào yêu cầu của bạn
    
            Session::flash('Cập Nhật Thành Công', 'Cập nhật thành công.');
        } else {
            Session::flash('Cập Nhật Thất Bại', 'Cập nhật thất bại.');
        }
    
        return redirect()->route('dsthietbi'); // Thay 'danhsach' bằng tên route của trang bạn muốn redirect đến
    }
}
