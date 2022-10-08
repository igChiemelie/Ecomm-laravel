<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'checkout';
    protected $fillable = ['contactName', 'contactEmail', 'contactNumber', 'subject', 'quantity', 'products_id'];

}
