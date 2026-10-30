<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'nomor_sim',
        'exp_sim',
        'kontak',
        'status',
        'catatan',
    ];
}