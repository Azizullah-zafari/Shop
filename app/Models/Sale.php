<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product',
        'quantity',
        'price',
        'payment_type',
        'paid',
        'note',
    ];

    // ارتباط فروش با مشتری
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // تابع برای محاسبه مبلغ کل
    public function getTotalAmountAttribute()
    {
        return $this->quantity * $this->price;
    }

    // تابع برای محاسبه مبلغ باقی‌مانده (برای مشتری قرض‌دار)
    public function getRemainingAttribute()
    {
        return $this->getTotalAmountAttribute() - $this->paid;
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
