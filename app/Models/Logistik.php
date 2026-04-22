<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Logistik extends Model
{
    use CrudTrait;

    protected $table = 'logistik';
    protected $primaryKey = 'kode_logistik';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_logistik',
        'nama_logistik',
        'kategori',
        'status',
    ];

    public function santriLogistik()
    {
        return $this->hasMany(SantriLogistik::class, 'kode_logistik', 'kode_logistik');
    }
}
