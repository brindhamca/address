<?php
namespace App\Daos\Implementations;

use App\Daos\AddressDAO;
use App\Models\AddressModel;

class AddressDAOImpl implements AddressDAO{
    
    public function insertAddressDetails($address){

        $address->save();
        
    }

    public function getAddressDetails(){

        return AddressModel::all();
        
    }

    public function deleteEmployee($addressId){
        $response = AddressModel::where('id', '=', $addressId)->delete();
        return $response;
    }
    public function getAddress($addressId){
        $response = AddressModel::where('id', '=', $addressId)->get();
        return $response;
    }
    public function updateAddressDetails($address){
        $address->save();
    }

    
}

