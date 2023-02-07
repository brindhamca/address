<?php
namespace App\Services\Implementations;

use App\Services\AddressService;
use App\Daos\AddressDAO;
use App\Models\AddressModel;

class AddressServiceImpl implements AddressService{

    protected $addressDAO;

    public function __construct(AddressDAO $addressDAO){
        $this->addressDAO = $addressDAO;
    }
    
    public function insertAddressDetails($data){
        $address = new AddressModel;

        $address->first_name = $data->first_name;
        $address->last_name = $data->last_name;
        $address->date_of_birth = $data->date_of_birth;
        $address->gender = $data->gender;
        $address->contact_mobile = $data->contact_mobile;
        $address->contact_phone = $data->contact_phone;
        $address->email_address = $data->email_address;
        if($data->street !=null){
            $address->street = $data->street;
        }
        if($data->city !=null){
            $address->city = $data->city;
        }
        if($data->hobbies !=null){
            $hobbiesArray = $data->hobbies;
            $hobbbiesStr = implode(",",$hobbiesArray);
            $address->hobbies = $hobbbiesStr;
        }
        $this->addressDAO->insertAddressDetails($address);

    }

    public function getAddressDetails(){
       return $this->addressDAO->getAddressDetails();
    }

    public function deleteEmployee($addressId){
        return $this->addressDAO->deleteEmployee($addressId);
    }

    public function getAddress($addressId){
        return $this->addressDAO->getAddress($addressId);
    }

    public function updateAddressDetails($data){

        $addressId = $data->addressId;
        $address = AddressModel::find($data->addressId);
        $address->first_name = $data->first_name;
        $address->last_name = $data->last_name;
        $address->date_of_birth = $data->date_of_birth;
        $address->gender = $data->gender;
        $address->contact_mobile = $data->contact_mobile;
        $address->contact_phone = $data->contact_phone;
        $address->email_address = $data->email_address;
        $address->street = $data->street;
        $address->city = $data->city;
        $hobbiesArray = $data->hobbies;
        $hobbbiesStr = implode(",",$hobbiesArray);
        $address->hobbies = $hobbbiesStr;
        $this->addressDAO->updateAddressDetails($address);

    }
    
}
