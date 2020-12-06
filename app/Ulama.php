<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulama extends Model
{
    protected $table = "ulama";
    protected $primaryKey = "ulama_id";
    protected $fillable = ['nama_ulama','tahun_ulama','tempat_lahir','biografi'];
}
