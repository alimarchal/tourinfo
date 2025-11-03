<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_name',
        'guest_name',
        'guest_email',
        'guest_contact',
        'check_in_date',
        'booking_date',
        'total_cost',
        'total_expenses',
        'profit',
        'agent_name',
        'booking_status',
        'tour_type',
        'path_attachment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Trip.php (Model)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
