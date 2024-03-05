<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Depo;

class Expedisi extends Model
{
    protected $table = 'sb_expedisi';
    protected $guarded = [];
    // use HasFactory;

    public function depo(){
        return $this->belongsTo(Depo::class,'depo_id');
    }
}
