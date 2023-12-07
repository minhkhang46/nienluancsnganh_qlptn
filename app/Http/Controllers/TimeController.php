<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Time;
use App\Models\Registration;
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

class TimeController extends Controller
{
    public function showTimeForm(){
        $datas = Time::all();
        return view('admin.formthoigian')->with('datas', $datas);
    }
    
    public function Times(): View
    {  
         
        $datas = Time::all();
     
        return view('admin.formthoigian')->with('datas', $datas);
    }

 
    public function createTime(Request $request): RedirectResponse
    {
   
        $data = Time::create([
            'ThoiGianBd' => $request->ThoiGianBd,
            'ThoiGianKT' => $request->ThoiGianKT,
        
           
        ]);
    
        event(new Registered($data));
       
   
        //dd($request->ID_User);
        $datas = Time::all();
        return redirect()->route('times', ['datas' => $datas])->with('Tạo Thành Công', 'Tạo Thời Gian thành công');
    }

    
    public function destroy($id)
    {
        $times = Time::where('id', $id)->first();
        // dd($times);
        if ($times) {
            $times->delete();
            Session::flash('Xóa Thành Công', 'Xóa thành công.');
        } else {
            
            Session::flash('Xóa Thất Bại', 'Xóa thất bại.');
        }

        return redirect()->route('times');
    }
}
