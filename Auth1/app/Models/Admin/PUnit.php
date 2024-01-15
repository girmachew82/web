<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PUnit extends Model
{
    use HasFactory;
    protected $table ='punits';
    protected $fillable =[
        'id',
        'name'
    ];
    // public function institute(): HasOne
    // {
    //     return $this->hasOne(Institute::class);
    // }
}
