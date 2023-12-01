<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Str;
class ModelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // check if user is super_admin or not 
    // if super_admin return true and make all permissions "allow"
    public function before($user,$ability){
        if ($user->super_admin) {
            return true;
        }
    }

    public function __call($name, $arguments)
    {
        $class_name = str_replace('Policy','',class_basename($this));
        $class_name = Str::plural(Str::lower($class_name));

        if($name == "viewAny"){
            $name = "view";
        }

        $ability = $class_name . '.' . Str::kebab($name);
        $user = $arguments[0];

        // dd($user , $ability);

        if (isset($arguments[1])) {
            $model = $arguments[1];
            if ($model->store_id !== $user->store_id) {
                return true;
            }
        }

        return $user->hasAbility($ability);
    }
}
