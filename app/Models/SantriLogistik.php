<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class SantriLogistik extends Model
{
    use CrudTrait;

    protected $table = 'santri_logistik';

    protected $fillable = [
        'kode_pendaftaran',
        'kode_logistik',
        'diserahkan_oleh',
        'ukuran',
        'status_penyerahan',
        'tanggal_diserahkan',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_diserahkan' => 'datetime',
    ];

    protected static function booted()
    {
        static::saving(function ($item) {
            if ($item->isDirty('status_penyerahan') && $item->status_penyerahan === 'sudah_diserahkan') {
                $item->tanggal_diserahkan = now();
                /** @var \App\Models\User|null $user */
                $user = backpack_user();
                $item->diserahkan_oleh = $user ? $user->id : null;
            } elseif ($item->isDirty('status_penyerahan') && $item->status_penyerahan === 'belum_diserahkan') {
                $item->tanggal_diserahkan = null;
                $item->diserahkan_oleh = null;
            }
        });
    }

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'kode_pendaftaran', 'kode_pendaftaran');
    }

    public function logistik()
    {
        return $this->belongsTo(Logistik::class, 'kode_logistik', 'kode_logistik');
    }

    public function petugasLogistik()
    {
        return $this->belongsTo(User::class, 'diserahkan_oleh');
    }
}
