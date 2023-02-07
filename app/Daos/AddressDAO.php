<?php
namespace App\Daos;

interface AddressDAO{
    
    public function insertAddressDetails($address); 
    public function getAddressDetails(); 
    public function deleteEmployee($addressId); 
    public function getAddress($addressId);
    public function updateAddressDetails($address);
    
}

