<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class Dokter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_dokter',
        'email',
        'telp',
        'NIK',
        'rate',
        'picturePath',
        'no_STR',
        'no_SIP',
        'rumah_sakit',
        'tanggal_lahir',
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['picturePath']);
    }
}
