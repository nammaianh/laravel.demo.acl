<?php namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\Traits\NoTimestampsModelTrait;

class AclPermission extends BaseModel {

    protected $fillable = ['identity', 'description'];

    public function groups()
    {
        return $this->belongsToMany(AclGroup::class, 'acl_group_permission');
    }

    public function getKey()
    {
        return $this->getAttribute('identity');
    }

}
