<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AddressService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;




class AddressController extends Controller{
   protected $addressService;

   public function __construct(AddressService $addressService){

        $this->addressService = $addressService;
   }

   public function addAddressForm(){
         $perform = "add";
         $addressData = null;
   		return view('add_address',compact('perform','addressData'));
   }

   public function registerAddress(Request $request){

      $validator  = Validator::make($request->all(),[
        'first_name' => 'required|max:30',
        'last_name' => 'required|max:30',
        'date_of_birth' => 'required',
        'gender' => 'required|in:male,female',
        'contact_mobile' => 'required|numeric|digits_between:10,16',
        'contact_phone' => 'numeric|digits_between:10,16',
        'email_address' => 'required|max:120|email',
        'street' => 'max:120',
        'city' => 'max:120',
        'hobbies' => 'max:250'
      ]);

      if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();

     }else{
         if($request->addressId != null && $request->addressId != ''){
            $this->addressService->updateAddressDetails($request); 
            return redirect('/')->with('success','Address Updated successfully');
         }else{

            $this->addressService->insertAddressDetails($request); 
            return redirect('/')->with('success','Address inserted successfully');
            
         }
         return response()->json(['error' => 'Something error is there']);
     }
   }

   public function showAddress(){
        $addressList = $this->addressService->getAddressDetails();   
         return view('show_address',compact('addressList'));
   }

   public function delete(Request $request){
      $addressId = $request->addressId;
      $response = $this->addressService->deleteEmployee($addressId); 
      $addressList = $this->addressService->getAddressDetails(); 
      $view = view('ajax_address_show', ['addressList' =>$addressList])->render();
       return response()->json([
           'html' => $view,'success' => 'Address deleted successfully'
       ]);
   }

   public function edit(Request $request){
         $addressId = $request->addressId;
         $addressDetail = $this->addressService->getAddress($addressId); 
         
         $perform = "update";
         $addressStr = $addressDetail[0]['hobbies'];
         $DBHobbiesArray = explode(",",$addressStr);
         $addressDetail[0]['hobbies'] = $DBHobbiesArray;
         /*$AllHobbiesArray = array('Drawing','Sing','Dance');
         $UncheckedHobbbies = array_diff($AllHobbiesArray,$DBHobbiesArray);
         $addressDetail[0]['checkedHobbies'] = $DBHobbiesArray;
         $addressDetail[0]['uncheckedHobbies'] = $UncheckedHobbbies;*/
         $addressData = $addressDetail[0];
         return view('add_address',compact('perform','addressData'));
   }
}