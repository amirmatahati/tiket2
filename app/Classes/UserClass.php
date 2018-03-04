<?php
 
namespace App\Classes;

use App\User;
use App\Usercategory;

class UserClass {
	public function GetByIdUser($id)
    {
		$user		= User::where('users.id',$id)->get();
		return $user;
	}
	public function GetUserCat($id)
    {
		$user		= Usercategory::
					where('id',$id)->get();
		return $user;
	}
	public function GetUserId($id)
	{
		$user		= User::join('user_category','users.category_user','departments.id')
					->where('users.id', $id)
					->select('users.id as iduser','users.name as username','user_category.id as iddepartments','user_category.name as departmentsname')
					->get();
		return $user;
	}
	public function GetPosition($id)
	{
		return Usercategory::where('id', $id)->first()->name;
	}
 
}