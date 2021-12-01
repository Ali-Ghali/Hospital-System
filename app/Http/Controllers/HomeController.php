<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Session;
class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));
            }
            else
            {
                return view('admin.home');

            }

        }
        else
        {
            return redirect()->back();

        }

    }
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
        $doctor = doctor::all();
        return view('user.home',compact('doctor'));
        }
    }
    public function appointment(Request $request)
    {
        $data = new appointment;
        
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->number;
        $data->doctor=$request->doctor;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->status='In Progress';
        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;

        }
        else
        {
            return redirect()->back();
        }
       

        $data->save();
        Session::flash('statuscode','success');
        return redirect()->back()->with('status','Appointment Request Successfull. We Will Contact You Soon');

 
    }
    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;        
            $appoint = appointment::where('user_id',$userid)->get();
       return view('user.my_appointment',compact('appoint'));
        }
        else
        {
            return redirect()->back(); 
        }
    }
    public function cancel_apoint($id)
    {
        
        $data = Appointment::findOrFail($id);
        $data->delete();
        Session::flash('statuscode','error');
        return redirect()->back()->with('status','Appointment Canceled Successfuly');
    }
}
