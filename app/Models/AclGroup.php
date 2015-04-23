<?php namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\Traits\NoTimestampsModelTrait;

class AclGroup extends BaseModel {

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'acl_user_groups');
    }

    public function permissions()
    {
        return $this->belongsToMany(AclPermission::class, 'acl_group_permissions');
    }

}
