<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_Details extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }
}
