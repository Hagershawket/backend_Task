<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdTag extends Model
{
    use HasFactory;

    protected $table = 'ad_tag';

    protected $fillable = ['ad_id', 'tag_id'];

    public $timestamps = true;

}
