<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Updates extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'updates';

    protected $fillable = [
        'update_type',
        'update',
        'subject_id',
        'subject_type',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
