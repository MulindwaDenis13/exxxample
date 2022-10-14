<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use Image;

class DoctorController extends Controller
{
    public function DoctorView()
    {
        $doctors = Doctor::latest()->get();
        return view('backend.doctor.doctor_view',compact('doctors'));
    }

    public function DoctorStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qualification' => 'required',
            'speciality' => 'required'
        ]);

        $image = $request->file('doctor_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('upload/doctor/'.$name_gen);
    	$save_url = 'upload/doctor/'.$name_gen;

        Doctor::insert([
            'name' => $request->name,

            'qualification' => $request->qualification,

            'speciality' => $request->speciality,
            // 'brand_slug_hin' => str_replace(' ', '-',$request->brand_name_hin),
            'image' => $save_url,

            'detail' => $request->detail,

    
            ]);
    
            $notification = array(
                'message' => 'Doctor Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    }

    public function DoctorEdit($id)
    {
        $doctor = Doctor::findOrFail($id);
    	return view('backend.doctor.doctor_edit',compact('doctor'));
    }

    public function DoctorUpdate()
    {
        $doctor_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('brand_image')) {
			if(file_exists($old_img)){
				unlink($old_img);
			}

    	$image = $request->file('image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('upload/doctor/'.$name_gen);
    	$save_url = 'upload/doctor/'.$name_gen;

	Doctor::findOrFail($doctor_id)->update([
		'name' => $request->name,

        'qualification' => $request->qualification,

        'speciality' => $request->speciality,
        // 'brand_slug_hin' => str_replace(' ', '-',$request->brand_name_hin),
        'image' => $save_url,

        'detail' => $request->detail,

    	]);

	    $notification = array(
			'message' => 'Doctor Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.doctor')->with($notification);

    	}else{

    	Doctor::findOrFail($doctor_id)->update([

            'name' => $request->name,

            'qualification' => $request->qualification,
    
            'speciality' => $request->speciality,
            // 'brand_slug_hin' => str_replace(' ', '-',$request->brand_name_hin),
            'image' => $save_url,
    
            'detail' => $request->detail,

    	]);

	    $notification = array(
			'message' => 'Doctor Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.doctor')->with($notification);

    	} // end else
    }

    public function DoctorDelete($id){

    	$doctor = Doctor::findOrFail($id);
    	$img = $doctor->image;
		if (file_exists($img)){
			unlink($img);
		}

    	Doctor::findOrFail($id)->delete();

    	 $notification = array(
			'message' => 'Doctor Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end method
}
