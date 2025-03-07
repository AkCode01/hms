<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\API\BaseController as BaseContrller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Doctor;
use Illuminate\Http\Request;


class DoctorController extends BaseContrller
{
    public function index()
    {
        $data['doctors'] = Doctor::all();
        return $this->sendResponse($data,'All Doctors Data');
    }
    public function store(Request $request)
    {
        
        $validateDoctor = Validator::make(
            $request->all(),
            [
            'dr_first_name'   => 'required|string',
            'dr_last_name'    => 'required|string',
            'dr_nic'          => 'required|string|max:20',
            'dr_contact'      => 'required|string|max:15',
            'dr_specialty'    => 'required|string|max:255',
            'dr_email'        => 'required|email',
            'dr_address'      => 'required|string',
            'dr_gender'       => 'required|in:Male,Female',
            'dr_pic'          => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'dr_license_num'  => 'required|string',
            'dr_credentials'  => 'required|string',
            'dr_experience'   => 'required|integer|min:0',
            'dr_status'       => 'required|in:active,inactive',
            ]
        );
        if($validateDoctor->fails()){
            return $this->sendError('Validation Error',$validateDoctor->errors()->all());
        }
        $dr_pic = $request->dr_pic;
        $ext = $dr_pic ->getClientOriginalExtension();
        $dr_picName = time() . '.' . $ext;
        $dr_pic ->move(public_path() . '/uploads',$dr_picName);     
        $doctor = Doctor::create([
            'dr_first_name'=>$request->dr_first_name,
            'dr_last_name'=>$request->dr_last_name,
            'dr_nic'=>$request->dr_nic,
            'dr_contact'=>$request->dr_contact,
            'dr_specialty'=>$request->dr_specialty,
            'dr_email'=>$request->dr_email,
            'dr_address'=>$request->dr_address,
            'dr_gender'=>$request->dr_gender,
            'dr_pic'=>$dr_picName,
            'dr_license_num'=>$request->dr_license_num,
            'dr_credentials'=>$request->dr_credentials,
            'dr_experience'=>$request->dr_experience,
            'dr_status'=>$request->dr_status,
        ]);
        return $this->sendResponse($doctor,'Doctor Created');
    }
    public function show(string $id)
    {
        $data['Doctor']=Doctor::select()->where(['doctor_id'=>$id])->get();
        return $this->sendResponse($data,'Your Single Doctor');
    }
    public function update(Request $request, string $id)
    {
        return "Wait Doctor update";
    }
    public function destroy(string $id)
    {
        return "Wait Doctor Delete...";
        /*
        $doctor = Doctor::where('doctor_id',$id)->delete();
        return $this->sendResponse($doctor,'Doctor Removed');
        */
    }
}
