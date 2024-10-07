<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressList extends Model
{
    use HasFactory;
    protected  $fillable = [
        'address_no',
        'street',
        'city',
        'cus_id',
    ];
}
