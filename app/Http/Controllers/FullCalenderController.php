<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Redirect,Response;
use App\Http\Controllers\RegistrationController;
use Carbon\Carbon;


   
class FullCalenderController extends Controller
{
 
    public function index()
    {

        if(request()->ajax()) 
        {
            $registrationController = new RegistrationController();
            $re = $registrationController->Calendar();
   
            $events = [];
        
           foreach ($re as $r) {
                $event = [];
                $event['id'] = $r->id;
                $lab_name = explode(' - ', $r->lab_name);
                $data = array_slice($lab_name, 0, 1); 
                $event['title'] = implode(' - ', $data). "\n".$r->ID_User. "\n". $r->registration_time;  // Đặt tiêu đề sự kiện
                $time_start = Carbon::createFromFormat('Y-m-d', $r->date)->format('Y-m-d H:i');
                $event['start'] = $time_start;
                $event['end'] = $time_start;
                // $event['color'] = $colors[crc32($r->id) % count($colors)];;
                $event['allDay'] = true; // Sự kiện suốt cả ngày
            
                // Tách chuỗi thành một mảng các giá trị giờ và phút
                $events[] = $event;
            }
            
    
            return Response::json($events);
        }
        return redirect()->route('list');
    }

    public function indexpage()
    {
        if(request()->ajax()) 
        {
            $registrationControllerpage = new RegistrationController();
            $re = $registrationControllerpage->Calendar_pages();
            // $room = DB::table('Lab')->where('id', $r->room_id)->first();
         
                      
            $events = [];
        
           foreach ($re as $r) {
                $event = [];
                $event['id'] = $r->id;
                $lab_name = explode(' - ', $r->lab_name);
                $data = array_slice($lab_name, 0, 1); 
                $event['title'] = implode(' - ', $data). "\n".$r->ID_User. "\n". $r->registration_time;  // Đặt tiêu đề sự kiện
                $time_start = Carbon::createFromFormat('Y-m-d', $r->date)->format('Y-m-d H:i');
                $event['start'] = $time_start;
                $event['end'] = $time_start;
                // $event['color'] = $colors[crc32($r->id) % count($colors)];;
                $event['allDay'] = true; // Sự kiện suốt cả ngày
            
                // Tách chuỗi thành một mảng các giá trị giờ và phút
                $events[] = $event;
            }
            
    
            return Response::json($events);
        }
        return redirect()->route('danhsach');
    }
  
    public function indexadmin()
    {
        if(request()->ajax()) 
        {
            $registrationControlleradmin = new RegistrationController();
            $re = $registrationControlleradmin->Calendar_admin();
            // $room = DB::table('Lab')->where('id', $r->room_id)->first();
         
                      
            $events = [];
        
           foreach ($re as $r) {
                $event = [];
                $event['id'] = $r->id;
                $lab_name = explode(' - ', $r->lab_name);
                $data = array_slice($lab_name, 0, 1); 
                $event['title'] = implode(' - ', $data). "\n".$r->ID_User. "\n". $r->registration_time;  // Đặt tiêu đề sự kiện
                $time_start = Carbon::createFromFormat('Y-m-d', $r->date)->format('Y-m-d H:i');
                $event['start'] = $time_start;
                $event['end'] = $time_start;
                // $event['color'] = $colors[crc32($r->id) % count($colors)];;
                $event['allDay'] = true; // Sự kiện suốt cả ngày
            
                // Tách chuỗi thành một mảng các giá trị giờ và phút
                $events[] = $event;
            }
            
    
            return Response::json($events);
        }
        return redirect()->route('danhsachadmin');
    }
    public function store(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end
                    ];
        $event = Event::insert($insertArr);   
        return Response::json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();
   
        return Response::json($event);
    }    
 
 
}


