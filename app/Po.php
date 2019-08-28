<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    protected $fillable = [
        'u_id', 'companyId', 'selectMerchant', 'inputMerchant', 'poType', 'poPurpose', 'poMaterials', 'poProject', 'poProjectLocation', 'poInvoice', 'poPod', 'poCompanyPo', 'poCancelled', 'poCompleted', 'updated_at'
    ];
}
