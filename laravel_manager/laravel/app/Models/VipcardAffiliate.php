<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipcardAffiliate extends Model
{
    use HasFactory;
    protected $table = 'vipcard_affiliate_templates';
    protected $fillable = [
        'affiliate_id',
        'affiliate_name',
        'affiliate_icon',
        'affiliate_link'
    ];
    public $timestamps = true;
}
