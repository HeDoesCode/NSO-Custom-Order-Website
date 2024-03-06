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

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'order_id', 'id');
    }
}
