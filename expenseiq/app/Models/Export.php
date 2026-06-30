<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $fillable = [
        'report_id',
        'format',
        'exported_at',
    ];

    protected $casts = [
        'exported_at' => 'datetime',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}