<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Export extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'format',
        'exported_at',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}