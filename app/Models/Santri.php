<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Str;

class Santri extends Model
{
    use CrudTrait;

    protected $table = 'santri';
    protected $primaryKey = 'kode_pendaftaran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    protected $fillable = [
        'kode_pendaftaran',
        'kode_lembaga',
        'nama',
        'tanggal_lahir',
        'negara',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'nama_pendidikan_terakhir',
        'nama_wali',
        'nomor_wa_wali',
        'tahun_masuk',
        'status_kedatangan',
        'status_verifikasi',
        'keyakinan_asrama',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_pendaftaran)) {
                $model->kode_pendaftaran = self::generateKode();
            }
        });
    }

    public static function generateKode(): string
    {
        do {
            $kode = 'PSB-' . date('y') . mt_rand(100000, 999999);
        } while (self::where('kode_pendaftaran', $kode)->exists());

        return $kode;
    }

    public function lembaga()
    {
        return $this->belongsTo(LembagaPendidikan::class, 'kode_lembaga', 'kode_lembaga');
    }

    public function logistik()
    {
        return $this->hasMany(SantriLogistik::class, 'kode_pendaftaran', 'kode_pendaftaran');
    }

    // Accessor for status labels
    public function getStatusKedatanganLabelAttribute(): string
    {
        return match($this->status_kedatangan) {
            'sudah_datang' => 'Sudah Datang',
            default => 'Belum Datang',
        };
    }

    public function getStatusVerifikasiLabelAttribute(): string
    {
        return match($this->status_verifikasi) {
            'diverifikasi' => 'Diverifikasi',
            'ditolak' => 'Ditolak',
            default => 'Proses',
        };
    }

    public function getProgressLogistikAttribute()
    {
        $total = $this->logistik->count();
        if ($total === 0) return "Tidak Ada Item";
        $diserahkan = $this->logistik->where('status_penyerahan', 'sudah_diserahkan')->count();
        return "{$diserahkan} / {$total} Item Diserahkan";
    }
}
