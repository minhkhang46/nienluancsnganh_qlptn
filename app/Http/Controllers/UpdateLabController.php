<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Time;
use App\Models\Lab;
use App\Models\Registration;
use App\Models\UpdateLab;
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
use Illuminate\Database\Eloquent\Collection;

class UpdateLabController extends Controller
{
    public function showupdateForm($id){
        // dd($id);
        $labs = Lab::all();
 
        $datas = Registration::where('id', $id)->first();
        if($datas){
            return view('formyeucau' ,['labs'=>$labs, 'datas'=>$datas]);
        }
        else {
            return redirect()->back()->with('error', 'không tìm tháy du lieu');
        }
        
      
       
    }

    public function listupdate(){
        $ups = UpdateLab::all();
       
      
        return view('admin.danhsachcapnhat' ,['ups'=>$ups ]);
    }

    
    public function createupdate(Request $request): RedirectResponse
    {
        $uplab = UpdateLab::where('idUser', $request->idUser)->get();
        // dd($uplab);
        // dd($request->idPTN, $request->idUser, $request->update_time, $request->date);
        $quantity = $request->input('quantity');

        if ($quantity > 10) {
            return redirect()->back()->with('Sai số lượng', 'Số lượng không được vượt quá 10.');
        }

        foreach($uplab as $u){
            if  ($u->idUser == $request->idUser && 
                $u->idPTN == $request->idPTN && 
                $u->update_time == $request->update_time && 
                $u->date == $request->date ){
                    
                if($u->status == 0 ){

                    return redirect()->back()->with('error', 'Đợi admin xử lý yêu cầu trước đó');
                }
            }
        }

        $up = UpdateLab::create([
            'idUser' => $request->idUser,
            'idPTN' => $request->idPTN,
            'quantity' => $request->quantity,
            'update_time' => $request->update_time,
            'date' => $request->date, // Thêm cột hình ảnh
        ]);
        
        event(new Registered($up));
      
        return redirect()->back()->with('success','Gửi Yêu Cầu Thành Công' );
    }


    public function deleteupdate(Request $request, $id)
    {
        $ups = UpdateLab::where('idUser', $id)->first();
        if ($ups) {
            $ups->delete();
            Session::flash('Xóa Thành Công', 'Xóa thành công.');
        } else {
            
            Session::flash('Xóa Thất Bại', 'Xóa thất bại.');
        }

        return redirect()->route('dsYeuCau');
    }
    
}
