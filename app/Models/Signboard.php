<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Depo;
use App\Models\Expedisi;
use App\Models\Toko;

class Signboard extends Model
{
    protected $table = 'signboards';
    protected $guarded = [];
    

    public function depo(){
        return $this->belongsTo(Depo::class,'depo_id');
    }
    public function dept(){
        return $this->belongsTo(Departemen::class);
    }
    public function toko(){
        return $this->belongsTo(Toko::class,'toko_id');
    }
    public function expedisi(){
        return $this->belongsTo(Expedisi::class,'expedisi_id');
    }
    public function atasan(){
        return $this->belongsTo(User::class); 
    }
    // use HasFactory;
}
