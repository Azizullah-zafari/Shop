<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
مدل هزینه‌ها برای مدیریت داده‌های هزینه در برنامه
*/

class Expense extends Model
{
    protected $fillable = ['title', 'amount', 'expense_date', 'description'];
}
