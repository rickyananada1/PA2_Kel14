<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profildesa extends Model
{
    use HasFactory;

    protected $table = 'profildesa';
    protected $fillable = [
        'tentang',
        'sejarah',
        'visi',
        'misi'
    ];
}
