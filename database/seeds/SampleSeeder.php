<?php
use App\Models\AclGroup;
use App\Models\AclPermission;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: namma
 * Date: 24/04/2015
 * Time: 05:51
 */
class SampleSeeder extends Seeder
{
    public function run()
    {
        /*
         * Create a user
         */
        $user = new User();
        $user
            ->fill([
                'email' => 'nammaianh@hotmail.com',
                'password' => bcrypt('pwd12345'),
            ])
            ->save();

        /*
         * Create a group
         */
        $group = new AclGroup();
        $group
            ->fill([
                'name' => 'Sample Group',
                'description' => 'Just a sample group',
            ])
            ->save();

        /*
         * Create a permission
         */
        $permission = new AclPermission();
        $permission
            ->fill([
                'identity' => 'user.super-secret',
                'description' => 'Permission to access /user/super-create route',
            ])
            ->save();

        // Add user to the group
        $group->users()->attach($user->id);

        // Add permission to the group
        $group->permissions()->attach($permission->id);
    }
}
