<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Session;
use Notification;
use App\Notifications\SendEmailNotification;
class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }
    public function upload(Request $request)
    {
        $doctor = new Doctor();

        $image = $request->file;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->sepciality=$request->sepciality;
        $doctor->room=$request->room;

        $doctor->save();
        return redirect()->back()->with('status','Doctor Added Successfuly');

    }
    public function showappointment()
    {
        $data = Appointment::all();
  
        return view('admin.appointment')->with('data',$data);
    }
    public function approved($id)
    {
        $data = Appointment::findOrFail($id);
        $data->status='Aproved';
        $data->save();
  
        return redirect()->back();
    }
    public function canceled($id)
    {
        $data = Appointment::findOrFail($id);
        $data->status='Canceled';
        $data->save();
  
        return redirect()->back();
    }
    public function showdoctors()
    {
        $data = Doctor::all();
  
        return view('admin.show_doctors')->with('data',$data);
    }
    public function delete_doctor($id)
    {
        
        $data = Doctor::findOrFail($id);
        $data->delete();
        Session::flash('statuscode','error');
        return redirect()->back()->with('status','Doctor Deleted Successfuly');
    }
    public function edit($id)
    {
        $data = Doctor::findOrFail($id);
        
        return view('admin.edit_doctor',compact('data'));

    }
    public function editdoctor(Request $request, $id)
    {
        $data = Doctor::findOrFail($id);
        $image = $request->file;
        if($image)
        {
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $data->image=$imagename;
        }

        $data->name=$request->name;
        $data->phone=$request->number;
        $data->sepciality=$request->sepciality;
        $data->room=$request->room;

        $data->update();
        Session::flash('statuscode','info');
        return redirect('showdoctors')->with('status','Doctor Updated Successfuly');

    }
    public function emailview($id)
    {
        $data = Appointment::findOrFail($id);
        
        return view('admin.email_view',compact('data'));

    }
    public function sendemail(Request $request, $id)
    {
        $data = Appointment::findOrFail($id);
        $details = 
        [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back();

    }
}
