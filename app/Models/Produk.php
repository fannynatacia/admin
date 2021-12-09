<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produk extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'produk';
    protected $primaryKey = 'id';
    // protected $guarded
    protected $fillable = [
        'jenis_kode',
        'nomor',
        'tahun',
        'tentang',
        'tanggal_penetapan',
        'tanggal_pengundangan',
        'berkas'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_kode', 'kode');
        // OR return $this->hasOne('App\Phone');
    }
}
