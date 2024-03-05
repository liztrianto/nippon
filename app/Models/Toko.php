<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Signboard;
use App\Models\Depo;

class Toko extends Model
{
    protected $table = 'm_toko';
    protected $guarded = [];
    // use HasFactory;

    public function depo(){
        return $this->belongsTo(Depo::class,'depo_id');
    }
}
