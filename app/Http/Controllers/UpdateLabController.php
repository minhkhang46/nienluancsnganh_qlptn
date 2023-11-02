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
    public function showupdateForm(){
        $labs = Lab::all();
        $times = Time::all();
        return view('formyeucau' ,['labs'=>$labs, 'times'=> $times, ]);
    }

    public function listupdate(){
        $ups = UpdateLab::all();
       
        return view('admin.danhsachcapnhat' ,['ups'=>$ups ]);
    }

    public function createupdate(Request $request): RedirectResponse
    {
       
        $up = UpdateLab::create([
            'idUser' => $request->idUser,
            'idPTN' => $request->idPTN,
            'quantity' => $request->quantity,
            'update_time' => $request->update_time,
            'date' => $request->date, // Thêm cột hình ảnh
        ]);
        
        event(new Registered($up));
      
        $ups = UpdateLab::all();
       
        return redirect()->route('YeuCau', ['ups' => $ups])->with('Gửi Yêu Cầu Thành Công','Gửi Yêu Cầu Thành Công' );
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
