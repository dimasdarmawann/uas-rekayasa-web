<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Kegiatan extends Model {
    protected $table      = 'kegiatans';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable   = ['gambar','nama_kegiatan','hari','waktu','pembina'];
}
