<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Time;
use App\Models\Registration;
use App\Models\Lab;
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


class LabController extends Controller
{
    public function showlabForm(){
        // $datas = Time::all();
        $labs = Lab::all();
        return view('page.trangchu', ['labs' => $labs]);
    }
    
    

    public function showlabsForm(){
        // $datas = Time::all();
        $labs = Lab::all();
        return view('admin.PhongThiNghiem', ['labs' => $labs]);
    }



    public function showlabtrangchu($id)
    {
        $ptn = Lab::where('id', $id)->get();
        $Devis = Device::all();
        if ($ptn->isNotEmpty()) {
            return view('laboratory', ['ptn' => $ptn, 'Devis'=> $Devis]);
        } 
    }


    public function show($id)
    {
        $ptn = Lab::where('id', $id)->get();
        $Devis = Device::all();
        if ($ptn->isNotEmpty()) {
            return view('page.PTN', ['ptn' => $ptn , 'Devis'=> $Devis]);
        } 
    }

    public function showadmin($id)
    {
        $ptn = Lab::where('id', $id)->get();
        $Devis = Device::all();
        
        if ($ptn->isNotEmpty()) {
            return view('admin.ptn', ['ptn' => $ptn, 'Devis'=> $Devis]);
        } 
    }
  

    public function updatelab(){
        // $datas = Time::all();
        $labs = Lab::all();
        return view('admin.formcapnhapPTN')->with('labs', $labs);
    }


    public function Labs(): View
    {  
         
        $labs = Lab::all();
     
        return view('admin.danhsachPTN')->with('labs', $labs);
    }

    
    public function createLab(Request $request): RedirectResponse
    {
        $pTNTonTai = Lab::where('idPTN', $request->idPTN)
        ->where('TenPTN', $request->TenPTN)
        ->first();
            
        if ($pTNTonTai) {
            return redirect()->back()->with('Tạo Phòng Thí Nghiệm Không Thành Công', 'Phòng Thí Nghiệm đã tồn tại');
        }
    
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
    
        $lab = Lab::create([
            'idPTN' => $request->idPTN,
            'TenPTN' => $request->TenPTN,
            'Nhiemvu' => $request->Nhiemvu,
            'Nghiencuu' => $request->Nghiencuu,
            'image' => $imageName, // Thêm cột hình ảnh
        ]);
        
        event(new Registered($lab));
      
        $labs = Lab::all();
       
        return redirect()->route('PTNghiem1', ['labs' => $labs])->with('Tạo Phòng Thí Nghiệm Thành Công', 'Tạo Phòng Thí Nghiệm Thành Công');
    }
    

    public function deletelab($id)
    {
        $labs = Lab::where('idPTN', $id)->first();
        if ($labs) {
            $labs->delete();
            Session::flash('Xóa Thành Công', 'Xóa thành công.');
        } else {
            
            Session::flash('Xóa Thất Bại', 'Xóa thất bại.');
        }

        return redirect()->route('dsPTN');
    }
    
    public function updatelabs($id, Request $request)
    {
        $labs = Lab::where('idPTN', $id)->get(); // Tìm người dùng theo ID
        if ($labs) {
            // $datas->update(['quantity' => $request->input('quantity')]);
            // $datas->update(['registration_time' => $request->input('registration_time')]);
            // $datas->update(['date' => $request->input('date')]);
            $labs->fill([
                'Nhiemvu' => $request->input('Nhiemvu'),
                'Nghiencuu' => $request->input('Nghiencuu'),
            ]);
           
            $labs->save();
            // dd($datas);
            // Thực hiện cập nhật các trường khác tùy thuộc vào yêu cầu của bạn
    
            Session::flash('Cập Nhật Thành Công', 'Cập nhật thành công.');
        } else {
            Session::flash('Cập Nhật Thất Bại', 'Cập nhật thất bại.');
        }
    
        return redirect()->route('capnhat'); // Thay 'danhsach' bằng tên route của trang bạn muốn redirect đến
    }
}
