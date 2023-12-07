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

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        $labs = Lab::all();
        $times = Time::all();
        $users= User::all();
        
        return view('dk')->with(['labs'=>$labs, 'times'=> $times, 'users'=> $users]);
    }

    public function Calendar()
    {
        $datas = Registration::all();
        
        return $datas ;
    }
    
    public function Calendar_pages()
    {
        $datas = Registration::all();
        
        return $datas ;
    }
    
    public function Calendar_admin()
    {
        $datas = Registration::all();
        
        return $datas ;
    }
    public function lichptn()
    {
        $datas = Registration::all();
       
        //dd($registrations->all());
        $datas = Registration::orderBy('date')->get();
        foreach ($datas as $r) {
            $r->date = Carbon::parse($r->date)->format('d-m-Y');
          
        }
        $labs = Lab::all();
    
       return view('lich', ['labs'=>$labs, 'datas'=> $datas,]);
    }

    public function dsdk(Request $request)
    {
        $datas = Registration::all();
       
        //dd($registrations->all());
        $keyword = $request->input('keyword');

        $datas = Registration::where('ID_User', 'like', "%$keyword%")->get();
        session()->put('search_keyword', $keyword);
        foreach ($datas as $r) {
            $r->date = Carbon::parse($r->date)->format('d-m-Y');
          
        }
        $labs = Lab::all();
        
       return view('dsdangky', ['labs'=>$labs, 'datas'=> $datas]);
    }

    public function Registration()
    {  
         
        $datas = Registration::all();
       
        //dd($registrations->all());
        $datas = Registration::orderBy('date')->get();
        foreach ($datas as $r) {
            $r->date = Carbon::parse($r->date)->format('d-m-Y');
          
        }
        $labs = Lab::all();
        return  redirect()->route('lichptn', ['labs'=>$labs, 'datas'=> $datas]);
    }

    //trả về danh sách đăng ký
    public function Registration1(): View
    {   
        $datas = Registration::all();
        $userId = Auth::id(); // Lấy ID của người dùng đã đăng nhập
        $labs = Lab::all();
    // Kiểm tra nếu người dùng đã đăng nhập
        //dd($registrations->all());
        $datas = Registration::orderBy('date')->get();
        foreach ($datas as $r) {
            $r->date = Carbon::parse($r->date)->format('d-m-Y');
        }
        // return view('lich', ['datas' => $datas]);
        //return view('lich', compact('datas'))->with('danhSachData', $datas);
       
        return view('page.danhsachdk')->with(['labs'=>$labs, 'datas'=>$datas] );
    }

    //trả về danh sách đăng ký admin
    public function Registration2(Request $request): View
    {   
        $datas = Registration::all();
        $userId = Auth::id(); // Lấy ID của người dùng đã đăng nhập

    // Kiểm tra nếu người dùng đã đăng nhập
        //dd($registrations->all());
        

        $keyword = $request->input('keyword');

        $datas = Registration::where('ID_User', 'like', "%$keyword%")->get();
        session()->put('search_keyword', $keyword);
        foreach ($datas as $r) {
            $r->date = Carbon::parse($r->date)->format('d-m-Y');
        }
        // return view('lich', ['datas' => $datas]);
        //return view('lich', compact('datas'))->with('danhSachData', $datas);
       $times = Time::all();
        //dd($registrations->all());
       
        return view('admin.danhsach')->with(['datas' => $datas, 'times' => $times]);
    }

  
    
    //hàm đăn ký
    public function register(Request $request): RedirectResponse
    {
              
            // Kiểm tra xem ID đăng nhập có khớp với ID trong yêu cầu đăng ký hay không
            
            $dangKyTonTai = Registration::where('lab_name', $request->lab_name)
            ->where('registration_time', $request->registration_time)
            ->where('date', $request->date)
            ->first();
                
            if ($dangKyTonTai) {
                return redirect()->back()->with('Đăng Ký Không Thành Công', 'Phòng thí nghiệm, thời gian hoặc ngày đã tồn tại');
            }

           $quantity = $request->input('quantity');

            if ($quantity > 10) {
                return redirect()->back()->with('Sai số lượng', 'Số lượng không được vượt quá 10.');
            }
            $data = Registration::create([
                
                'ID_User' => $request->ID_User,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'lab_name' => $request->lab_name,
                'quantity' => $request->quantity,
                'registration_time' =>  $request->registration_time,
                'date' => $request->date,
            ]);
        
            event(new Registered($data));
            //dd($request->ID_User);
            $datas = Registration::all();

            // Session::put('success', 'Đăng ký thành công');
            // Alert::success('Success', 'Đăng ký thành công')->showConfirmButton();
            return redirect()->route('registrations', ['datas' => $datas])->with('Thành Công', 'Đăng ký thành công');
      
    }
   

    //hàm xóa
    public function deleteRegistration($id)
    {
        $datas = Registration::where('id', $id)->first(); // Tìm người dùng theo ID
        //  dd($id);
        if ($datas) {
        //  dd($datas); // Hiển thị thông tin người dùng

            $datas->delete(); // Xóa người dùng nếu tìm thấy
            Session::flash('Xóa Thành Công', 'Xóa đăng ký thành công.');
        } else {
            
            Session::flash('Xóa Thất Bại', 'Xóa đăng ký thất bại.');
        }

        return redirect()->route('danhsachadmin');
    }
   
    //hàm cập nhật


    public function updateRegistration($idUser, $idPTN, $update_time, $date)
    {
        // dd($id);
        // dd($idUser, $idPTN, $update_time, $date);
        $datas = Registration::where('ID_User', $idUser)->where('lab_name',$idPTN)->where('registration_time',$update_time)->where('date',$date)->get();
       
        $dataupdate = UpdateLab::where('idUser', $idUser)->where('idPTN',$idPTN)->where('update_time',$update_time)->where('date',$date)->get();
        // dd($datas, $dataupdate );
        // dd($dataupdate->status);
        foreach ($datas as $d1){
            foreach ($dataupdate as $d2){
                 if ($d1 && $d2) {
                    if($d2->status == false){
                        $d1->update(['quantity' => $d2->quantity]);
                        $d2->status = true;
                        $d2->yesno = true;
                        $d2->save();
                        $d1->save();
                
                        Session::flash('Cập Nhật Thành Công', 'Cập nhật thông tin người dùng thành công.');
                    }
                    
                } else {
                    Session::flash('Cập Nhật Thất Bại', 'Cập nhật thông tin người dùng thất bại.');
                }
            }
        }
       
    
        return redirect()->route('dsYeuCau'); // Thay 'danhsach' bằng tên route của trang bạn muốn redirect đến
    }

    public function updateRegistrationRefuse($idUser, $idPTN, $update_time, $date)
    {
        // dd($id);
        $datas = Registration::where('ID_User', $idUser)->where('lab_name',$idPTN)->where('registration_time',$update_time)->where('date',$date)->get();
       
        $dataupdate = UpdateLab::where('idUser', $idUser)->where('idPTN',$idPTN)->where('update_time',$update_time)->where('date',$date)->get();
        // dd($dataupdate);

        foreach ($datas as $d1){
            foreach ($dataupdate as $d2){
                 if ($d1 && $d2) {
                    if($d2->status == false){
                        // $d1->update(['quantity' => $d2->quantity]);
                        $d2->status = true;
                        $d2->save();
                        $d1->save();
                
                        Session::flash('Cập Nhật Thất Bại', 'Cập nhật thông tin người dùng thất bại.');
                    }
                    
                } else {
                    Session::flash('Cập Nhật Thành Công', 'Cập nhật thông tin người dùng thành công.');
                }
            }
        }
    
        return redirect()->route('dsYeuCau'); // Thay 'danhsach' bằng tên route của trang bạn muốn redirect đến
    }

    // SearchController.php
    
    
    

}    
