<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulama extends Model
{
    protected $table = "ulama";
    protected $primaryKey = "ULAMA_ID";
    protected $fillable = ['NAMA_ULAMA','TAHUN_LAHIR','TEMPAT_LAHIR','BIOGRAFI'];
}
