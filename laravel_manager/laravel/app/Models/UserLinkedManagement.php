<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserLinkedManagement extends Model
{
    use HasFactory;
    protected $table = 'vipcard_linked_user';
    protected $fillable = [
        'user_id',
        'affiliate_id',
        'affiliate_link',
        'record_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'id');

    }
}
