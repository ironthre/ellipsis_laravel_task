<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlModel extends Model
{
    use HasFactory;
    protected $table = 'url';
    protected $fillable = [

        'url',
        'short_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
