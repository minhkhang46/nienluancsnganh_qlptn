<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lab;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function index(){
        return view('trangchu');
    }

    public function showdashboard(){
      
        
        $labs = Lab::all();
        return view('welcome', ['labs' => $labs]);
    }

     public function admindashboard(){
        $labs = Lab::all();
        return view('admin.dasboard', ['labs' => $labs]);
    }

    public function showaccount()
    {
        return view('admin.taikhoan');
    }   

  



    
    // public function dashboard(Request $request)
    // {
    //     $credentials = $request->only('macv', 'password');
    
    //     if (Auth::attempt($credentials)) {
    //         dd($credentials);
    //         // Đăng nhập thành công
    //         $user = Auth::user();
    //         session()->put('name', $user->name);
    //         session()->put('id', $user->id);
    
    //         return redirect('/welcome');
    //     } 
    //     // else {
    //     //     session()->flash('message', 'Mật khẩu hoặc tài khoản bị sai. Vui lòng nhập lại.');
    
    //     //     return redirect('/login');
    //     // }
    // }
    public function dashboard(Request $request)
    {
    $macv = $request->macv;
    $password = $request->password;
   
   
    $labs = Lab::all();
    // Thực hiện kiểm tra điều kiện xác thực tùy chỉnh
    if ($this->customAuthentication($macv, $password)) {
        // Đăng nhập thành công
        $user = User::where('macv', $macv)->where('password',$password)->first();

       

        session()->put('name', $user->name);
        session()->put('id', $user->id);
        session()->put('macv', $user->macv);
        session()->put('email', $user->email);
        if($user->role == 'Admin'){
            return view('admin.dasboard', ['labs' => $labs]);
        }  
        else{
            return redirect()->route('welcome');
        }
    } else {
        session()->flash('message', 'Tài Khoản Hoặc Mật Khẩu Không Đúng. Vui Lòng Nhập Lại.');

        return view('login');
    }
}

    private function customAuthentication($macv, $password)
    {
        // Kiểm tra và so sánh thông tin đăng nhập với dữ liệu trong cơ sở dữ liệu hoặc xác thực theo logic riêng

        $user = User::where('macv', $macv)->where('password',$password)->first();
        //dd($user);
        if ($user) {
            // Thông tin đăng nhập đúng
            return true;
        } else {
            // Thông tin đăng nhập sai
            return false;
        }
    }

    public function log_out(){
        session()->put('name', null);
        session()->put('id', null);

        return redirect()->route('trangchu1');
        
    }

    public function Account(): View
    {  
         
        $datas = User::all();
       
        //dd($registrations->all());
     
        return view('admin.danhsachtaikhoan')->with('datas', $datas);
    }



    public function createAccount(Request $request): RedirectResponse
    {
        $taikhoanTonTai = User::where('macv', $request->macv)->where('name', $request->name)->where('email', $request->email)->first();
            
        if ($taikhoanTonTai) {
            return redirect()->back()->with('Tạo Tài Khoản Không Thành Công', 'Tài khoản đã tồn tại');
        }
        $data = User::create([
                
            'macv' => $request->macv,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
           
        ]);
    
        event(new Registered($data));
        //dd($request->ID_User);
        $datas = User::all();
        return redirect()->route('account', ['datas' => $datas])->with('Tạo Tài Khoản Thành Công', 'Tạo Tài Khoản thành công');
    }

// LoginController
    
    public function login() {
      $showPassword = false;
    
      return view('login')->with('showPassword', $showPassword);
    }
    


    public function deleteAccount($id)
    {
        $datas = User::where('id', $id)->first(); // Tìm người dùng theo chức vụ
        // dd($id);
        if ($datas){
            $datas->delete(); // Xóa từng người dùng nếu tìm thấy
    
            Session::flash('Xóa Thành Công', 'Xóa tài khoản thành công.');
        }
        else {
            Session::flash('Xóa Thất Bại', 'Xóa tài khoản thất bại.');
        }
    
        return redirect()->route('accounts');
    }

    public function updateAccount($id, Request $request)
    {
        $datas = User::where('macv', $id)->first(); // Tìm người dùng theo ID

    
        if ($datas) {
            $datas->update(['macv' => $request->input('macv')]);
            $datas->update(['name' => $request->input('name')]);
            $datas->update(['email' => $request->input('email')]);
           
            $datas->save();
            // dd($datas);
            // Thực hiện cập nhật các trường khác tùy thuộc vào yêu cầu của bạn
    
            Session::flash('Cập Nhật Thành Công', 'Cập nhật thông tin người dùng thành công.');
        } else {
            Session::flash('Cập Nhật Thất Bại', 'Cập nhật thông tin người dùng thất bại.');
        }
    
        return redirect()->route('accounts'); // Thay 'danhsach' bằng tên route của trang bạn muốn redirect đến
    }
}
