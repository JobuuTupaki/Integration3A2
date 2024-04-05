<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'transaction_id',
        'customer_name',
        'weight',
        'order_date',
        'description',
        'total',
        'created_at',
        'updated_at',
        
    ];



    
}
