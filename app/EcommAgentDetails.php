<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcommAgentDetails extends Model
{
    protected $table = 'ecomm_agent_details';
    protected $fillable = ['companyName', 'companyAddress', 'companyRcNumber', 'companyMobileNum', 'companyLogo', 'user_id'];

}
