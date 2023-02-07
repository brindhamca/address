<?php
namespace App\Services;

interface AddressService{
    
    public function insertAddressDetails($data); 
    public function getAddressDetails(); 
    public function deleteEmployee($addressId); 
    public function getAddress($addressId); 
    public function updateAddressDetails($data);
    
}

