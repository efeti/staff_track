<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function mark_attendance()
    {
        $data = DB::table('staffs')->get();
        // dd($data);
        return view('mark_attendance')->with('data', $data);
    }

    public function submit_attendance(Request $request)
    {
        $date = '';
        $data = array();

        foreach ($request->all() as $key => $value) {
            if ($key == "date") {
                $date = $value;
            } else if ($key != "_token") {
                $sub_array = array();
                $sub_array['date'] = $date;
                $sub_array['staff_id'] = $key;
                $sub_array['status'] = $value;
                $data[] = $sub_array;
            }
        }
        // dd($date);

        $day = date('d', strtotime($date));
        $result = DB::table('attendance')->where(DB::raw('DAY(date)'), '=', $day)->get();
        if(count($result) > 0)
        {
            $errorMsg = 'Already Marked';
            return redirect()->back()->with('error', $errorMsg)->withInput();

        }
        else
        {     
        DB::table('attendance')->insert($data);
        return redirect()->intended('/mark_attendance')->with('success', 'Attendance submitted successfully.');
        }

    }

    public function view_attendance()
    {
        $data = DB::table('staffs')->get();
        // dd($data);
        return view('view_attendance')->with('data', $data);
    }
    
    public function submit_view_attendance(Request $request)
    {
        $month = date_parse($request->month)['month'];
        $data = DB::table('attendance')->where(DB::raw('MONTH(date)'), '=', $month)
        ->where('staff_id', '=',  $request->id)->orderBy('date', 'asc')->get();
        // dd($data[0]->date);
        // return back()->with('data', $data);
        // dd(session()->all());
        return redirect()->back()->with('data', $data)->withInput();

    }

    public function payments(Request $request)
    {
        $data = DB::table('staffs')->get();
        // dd($data);
        return view('payments')->with('data', $data);
        // return view('payments');
    }

    public function submit_payments(Request $request)
    {
        $month = date_parse($request->month)['month'];
        $data = DB::table('attendance')->where(DB::raw('MONTH(date)'), '=', $month)->where('staff_id', '=',  $request->id)->get();
        
        $status = [
            'present' => 0,
            'absent' => 0,
        ];
        
        foreach($data as $records)
        {
            $result = $records->status;
            if($result == "present")
            {
                $status['present']++;
            }
            else
            {
                $status['absent']++;
            }
        }

        $year = 2023;
        $salary = 10000;
        // $month = 4; // April

        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $payment = ($salary / $days_in_month) * $status['present'];
        $status['payment'] = number_format((float)$payment, 2, '.', '');
        
        return redirect()->back()->with('status', $status)->withInput();
    }
}
