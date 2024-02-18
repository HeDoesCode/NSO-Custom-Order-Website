<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'username',
        'deliveryAddress',
        'type',
        'design_text',
        'design_img',
        'size',
        'quantity',
        'price',
        'mode_of_payment',
        'order_date',
        'recieved_date',
        'status',
    ];
}
