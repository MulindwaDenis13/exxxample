<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use KingFlamez\Rave\Facades\Rave as Flutterwave;

use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function __construct(){
        $this->middleware(['user:auth']);
    }
    
    public function openAppointmentView($id){
        $doctor = $id; 
        if(auth()->check()){
            return view('frontend.payment.appointment',compact('doctor'));
        } else {
            return redirect()->route('login');
        }
    }

    public function initialise(Request $request)
    {
        // dd($request->all());
            // Generate payment Reference
            $reference = Flutterwave::generateReference();

            // Capture payment details
            $data = [
                'payment_options' => 'card,banktransfer',
                'amount' => 30000,
                'email' => request()->email,
                'tx_ref' => $reference,
                'currency' => "UGX",
                'redirect_url' => route('finish.appointment'),
                'customer' => [
                    'email' => request()->email,
                    "phone_number" => request()->phone,
                    "name" => request()->name
                ],
        
                "customizations" => [
                    "title" => 'Appointment Payment',
                    "description" => "Appointment"
                ]
             ];
        
            $payment = Flutterwave::initializePayment($data);
        
            if ($payment['status'] !== 'success') {
                // notify something went wrong
                return 'Something went wrong';
            }
        
            Session::put('appointment_order', $request->all());

            // dd(Session::get('appointment_order'));
        
            return redirect($payment['data']['link']);
    }

     public function finish()
    {
        $status = request()->status;

        if($status == 'successful'){
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            if(Session::has('appointment_order')){
                $appointment_info = Session::get('appointment_order');
                $appointment = Appointment::insertGetId([
                    'doctor_id' => $appointment_info['doctor_id'],
                    'amount' => 30000,
                    'transaction_id' => $transactionID,
                    'user_id' => auth()->user()->id,
                    'approved' => 0,
                    'created_at' => \Carbon\Carbon::now()
                ]);
                $waiting = Appointment::with(['doctor'])->findorFail($appointment);
                return view('frontend.user.appointment.waiting',compact('waiting'));
            }elseif($status == 'cancelled'){
                return 'Payment Cancelled';
            } else {
                return 'Payment Failed';
            }
        }

    }
}
