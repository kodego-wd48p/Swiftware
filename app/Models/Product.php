<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'remarks', 'is_active'];

    public function getIsActiveAttribute($value)
    {
        return $value ? 'Active' : 'Inactive';
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function stockroom()
    {
        return $this->belongsTo(Stockroom::class, 'stockroom_id');
    }

    
}
