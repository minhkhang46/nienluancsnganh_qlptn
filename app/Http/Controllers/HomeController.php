<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Time;
use App\Models\Registration;
use App\Models\Lab;
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

class HomeController extends Controller
{
    public function index(){
        $labs = Lab::all();
        return view('page.trangchu', ['labs' => $labs]) ;
    }

    public function list(){
        return view('page.danhsachdk');
    }
}
