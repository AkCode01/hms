<?php

namespace App\Http\Controllers\Api;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseContrller;
use Illuminate\Support\Facades\Validator;

class HospitalController extends BaseContrller
{
    public function index()
    {
        $data['hospitals'] = Hospital::all();
        return $this->sendResponse($data,'All Hospitals Data');
    }
    public function store(Request $request)
    {
        $validateHospital = Validator::make(
            $request->all(),
            [
            'hospital_name' => 'required|string|max:255',
            'hospital_code' => 'required|string|unique:hospitals,hospital_code',
            'hospital_address' => 'required|string|max:255',
            'hospital_contact_number' => 'required|string|max:20',
            'hospital_email' => 'nullable|email|unique:hospitals,hospital_email',
            'hospital_website' => 'nullable|url',
            'hospital_status' => 'required|in:active,inactive',
            ]
        );
        if($validateHospital->fails()){
            return $this->sendError('Validation Error',$validateHospital->errors()->all());
        }
        
        $Hospital = Hospital::create([
            'hospital_name'=>$request->hospital_name,
            'hospital_code'=>$request->hospital_code,
            'hospital_address'=>$request->hospital_address,
            'hospital_contact_number'=>$request->hospital_contact_number,
            'hospital_email'=>$request->hospital_email,
            'hospital_website'=>$request->hospital_website,
            'hospital_status'=>$request->hospital_status,
           
        ]);
        return $this->sendResponse($Hospital,'Hospital Created');
    }
    public function show(string $id)
    {
        $data['Hospital']=Hospital::select()->where(['hospital_id'=>$id])->get();
        return $this->sendResponse($data,'Your Single Hospital');
    }
    public function update(Request $request, string $id)
    {
        $validateHospital = Validator::make(
            $request->all(),
            [
            'hospital_name' => 'required|string|max:255',
            'hospital_code' => 'required|string|unique:hospitals,hospital_code',
            'hospital_address' => 'required|string|max:255',
            'hospital_contact_number' => 'required|string|max:20',
            'hospital_email' => 'nullable|email|unique:hospitals,hospital_email',
            'hospital_website' => 'nullable|url',
            'hospital_status' => 'required|in:active,inactive',
            ]
        );
        if($validateHospital->fails())
        {
            return $this->sendError('Validation Error',$validateHospital->errors()->all());
        }
        
        $hospital = Hospital::where(['hospital_id'=>$id])-> update([
            'hospital_name'=>$request->hospital_name,
            'hospital_code'=>$request->hospital_code,
            'hospital_address'=>$request->hospital_address,
            'hospital_contact_number'=>$request->hospital_contact_number,
            'hospital_email'=>$request->hospital_email,
            'hospital_website'=>$request->hospital_website,
            'hospital_status'=>$request->hospital_status,
        ]);
        return $this->sendResponse($hospital,'Hospital Updated successfully');
    }

    public function destroy(string $id)
    {
        $hospital = Hospital::where('hospital_id',$id)->delete();
        return $this->sendResponse($hospital,'Hospital Removed');
    }
}
