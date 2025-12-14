<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;
    
    // START: BARIS TAMBAHAN UNTUK MEMPERBAIKI ERROR
    /**
     * Tentukan apakah model harus secara otomatis mengelola timestamps.
     * * @var bool
     */
    public $timestamps = false; 
   
    protected $fillable = ['name', 'level'];
}