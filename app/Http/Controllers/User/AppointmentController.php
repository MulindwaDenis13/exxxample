<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use KingFlamez\Rave\Facades\Rave as Flutterwave;

use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function openAppointmentView($id){
        $doctor = $id; 
        return view('frontend.payment.appointment',compact('doctor'));
    }

    public function initialise(Request $request)
    {
            // Generate payment Reference
            $reference = Flutterwave::generateReference();

            // Capture payment details
            $data = [
                'payment_options' => 'card,banktransfer',
                'amount' => 30000,
                'email' => request()->email,
                'tx_ref' => $reference,
                'currency' => "UGX",
                'redirect_url' => route('callback.appointment'),
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
        
            return redirect($payment['data']['link']);
    }

     public function callback()
    {
        $status = request()->status;

        if($status == 'successful'){
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
            if(Session::has('appointment_order')){
                $appointment_info = Session::get('appointment_order');
                Appointment::insert([
                    'doctor_id' => $appointment_info['doctor_id'],
                    'name' => $appointment_info['name'],
                    'email' => $appointment['email'],
                    'phone_number' => $appointment['phone'],
                    'amount' => 30000,
                    'transaction_id' => $transactionID
                ]);

            return redirect()->route('consultation');
            }
        }        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
            return 'Payment Cancelled';
        }
        else{
            //Put desired action/code after transaction has failed here
            return 'Payment Failed';
        }
    }
}
