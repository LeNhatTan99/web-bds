<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Permission extends Model
{
    use HasFactory;
    protected $fillable= [
        'permission_name',
        'description',
    ];


 /**
  * The roles that belong to the Permission
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
  */
 public function roles()
 {
     return $this->belongsToMany(Role::class);
 }
}
