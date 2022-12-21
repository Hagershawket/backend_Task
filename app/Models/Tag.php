<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = ['name'];

    public $timestamps = true;

    public function ads()
    {
        return $this->belongsToMany(Ad::class, 'ad_tag');
    }

}
