<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Depo;

class Sales extends Model
{
    protected $table = 'sales';
    protected $guarded = [];
    // use HasFactory;

    public function depo(){
        return $this->belongsTo(Depo::class,'depo_id');
    }
}
