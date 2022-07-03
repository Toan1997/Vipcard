<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class UserInfoManagement extends Model
{
    use HasFactory;
    protected $table = 'vipcard_user_management';
    protected $fillable = [
        'link_user',
        'name',
        'phone',
        'greeting',
        'link_avatar'
    ];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
