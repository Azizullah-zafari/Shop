<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name',  'phone', 'address' /* سایر فیلدهای شما */];
    // App\Models\Customer.php

    public function sales()
    {
        return $this->hasMany(\App\Models\Sale::class);
    }
}
