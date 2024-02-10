<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_ormawa
 * @property string $nama_kategori
 * @property Ormawa $ormawa
 * @property Tim[] $tims
 */
class Kategori extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id_ormawa', 'nama_kategori', 'kategori'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ormawa()
    {
        return $this->belongsTo('App\Ormawa', 'id_ormawa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tims()
    {
        return $this->hasMany('App\Tim', 'id_kategori');
    }
}
