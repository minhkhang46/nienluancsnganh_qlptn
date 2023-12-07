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


    public function Devices(Request $request): View
    {  
         
        $Devis = Device::all();
        $keyword = $request->input('keyword');

        $Devis = Device::where('idphong', 'like', "%$keyword%")->get();
        session()->put('search_keyword', $keyword);
        return view('admin.dsthietbi')->with('Devis', $Devis);
    }

    
    public function creatdevice(Request $request): RedirectResponse
    {
       
        $tbTonTai = Device::where('idthietbi', $request->idthietbi)->where('idphong', $request->idphong)->first();
            
        if ($tbTonTai) {
            return redirect()->back()->with('Thêm Thiết Bi Không Thành Công', 'Thiết Bị Đã Tồn Tại');
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
        $Devis = Device::where('id', $id)->first();

        // dd($id);
        if ($Devis) {
            $Devis->delete();
            Session::flash('Xóa Thành Công', 'Xóa thành công.');
        } else {
            
            Session::flash('Xóa Thất Bại', 'Xóa thất bại.');
        }

        return redirect()->route('dsthietbi');
    }

    public function updatedevices($id){
        // $datas = Time::all();
        $Devis = Device::where('idthietbi', $id)->get(); 
        //  dd($labs);
        foreach($Devis as $d){
            if($d)
                // dd($l->Nhiemvu);
                return view('admin.formcapnhattb', ['d' => $d]);
            else
                return redirect()->back()->with('error', 'Dữ liệu không tìm thấy');
        }
       
    }

    public function updatedevice($id, Request $request)
    {
        $Devis = Device::where('idthietbi', $id)->get(); // Tìm người dùng theo ID
        // dd($id);
        foreach( $Devis as $d){
            if ($d) {
                $d->update(['tinhtrang' => $request->input('tinhtrang')]);
                $d->update(['tinhnang' => $request->input('tinhnang')]);
                // $datas->update(['date' => $request->input('date')]);
                
               
                $d->save();
                // dd($datas);
                // Thực hiện cập nhật các trường khác tùy thuộc vào yêu cầu của bạn
        
                Session::flash('Cập Nhật Thành Công', 'Cập nhật thành công.');
            } else {
                Session::flash('Cập Nhật Thất Bại', 'Cập nhật thất bại.');
            }
        }
       
    
        return redirect()->route('capnhat', ['id'=> $d->idthietbi]); // Thay 'danhsach' bằng tên route của trang bạn muốn redirect đến
    }
}
