<?php
namespace App\classes;

use DB;
/**
 * Users and Roles
 */
class UsersAndRoles
{

  public static function getAllUsersWithRole()
  {

    $users = DB::table('users')->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                               ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                               ->select('users.id', 'users.name', 'users.email', 'roles.name as role')->get();
    $user_table = "";
    foreach ($users as $user) {
      $user_table .= "
      <tr>
        <td>".$user->id."</td>
        <td>".$user->name."</td>
        <td>".$user->email."</td>
        <td>".$user->role."</td>
        <td><button class=\"btn btn-success\"></button></td>
      </tr>";
    }

    return $user_table;
  }


  public static function getAllRoles()
  {

    $roles = DB::table('roles')->select('id', 'name')->get();
    $role_table = "";
    foreach ($roles as $role) {
      $role_table .= "
      <tr>
        <td>".$role->id."</td>
        <td>".$role->name."</td>
        <td><button class=\"btn btn-success\"></button></td>
      </tr>";
    }

    return $role_table;
  }


}
