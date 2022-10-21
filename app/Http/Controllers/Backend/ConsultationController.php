<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Appointment;

class ConsultationController extends Controller
{
    public function manageAppointment()
    {
        $appointments = Appointment::with(['doctor','user'])->latest()->get();
        return view('backend.consult.consult_view',compact('appointments'));
    }

    public function confirm($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'approved' => 1
        ]);
        $notification = array(
            'message' => 'Appointment Confirmed',
            'alert-type' => 'success'
        );
        return redirect()->route('all.consultations')->with($notification);
    }

    public function deactivate($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'approved' => 0
        ]);
        $notification = array(
            'message' => 'Appointment Inactivated',
            'alert-type' => 'success'
        );
        return redirect()->route('all.consultations')->with($notification);
    }

}
