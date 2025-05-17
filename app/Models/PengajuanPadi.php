<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanPadi extends Model
{
    protected $table = 'pengajuan_padi';
    protected $primaryKey = 'id_pengajuan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pengajuan', 'id_petani', 'id_padi', 'perlu_mobil',
        'jumlah_karung', 'tanggal_pengajuan', 'status', 'keterangan'
    ];

    // relasi dengan petani
    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani', 'id_petani');
    }

    // relasi dengan padi
    public function padi()
    {
        return $this->belongsTo(Padi::class, 'id_padi', 'id_padi');
    }
}
