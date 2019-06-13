<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    protected $fillable = [
        'u_id', 'companyId', 'poType', 'poPurpose', 'poProject', 'poProjectLocation', 'poInvoice', 'poPod', 'poCompanyPo', 'poCancelled', 'poCompleted', 'updated_at'
    ];
}
