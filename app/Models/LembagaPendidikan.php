<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class LembagaPendidikan extends Model
{
    use CrudTrait;

    protected $table = 'lembaga_pendidikan';
    protected $primaryKey = 'kode_lembaga';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_lembaga',
        'nama_lembaga',
        'status',
    ];

    public function santri()
    {
        return $this->hasMany(Santri::class, 'kode_lembaga', 'kode_lembaga');
    }
}
