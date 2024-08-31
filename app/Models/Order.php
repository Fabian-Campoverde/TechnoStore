<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'order_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'document_type',
        'document_number',
        'address',
        'department',
        'province',
        'district',
        'zone',
        'reference',
        'payment_method_id',
        'payment_image',
        'payment_date',
        'operation_code',
        'total',
        'user_id'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    /**
     * Generate a unique order number based on user ID and current timestamp.
     *
     * @param  int  $userId
     * @return string
     */
    public static function generateOrderNumber($userId)
    {
        $date = now()->format('Ymd'); // Current date in YYYYMMDD format
        $randomString = Str::upper(Str::random(5)); // Random alphanumeric string

        return sprintf('ORD-%s-%s-%s', $userId, $date, $randomString);
    }
}
