<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable =
        [
            'user_id',
            'payment_id',
            'ip_address',
            'name',
            'phone_no',
            'shipping_address',
            'shipping_charge',
            'custom_discount',
            'email',
            'message',
            'is_paid',
            'is_completed',
            'is_seen_by_admin',
            'transaction_id'
        ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
