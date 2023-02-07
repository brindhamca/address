<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model{

    /*Table Name type string*/
    protected $table='addresses';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
       	'id',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'contact_mobile',
        'contact_phone',
        'email_address',
        'street',
        'city',
        'hobbies',
        'created_at',
        'updated_at'
    ];


}