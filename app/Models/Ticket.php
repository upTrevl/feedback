<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d.m.Y',
    ];

    protected $fillable = [
        'name',
        'phone',
        'company',
        'title',
        'message',
        'creator_id'
    ];

    protected $with = [
        'file',        
    ];

    

    public function getPathAttribute()
    {
        return asset('storage/'.$this->src);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($ticket) {
            $ticket->creator_id = Auth::id();
        });
    }

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
