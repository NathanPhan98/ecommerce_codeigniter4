<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'fullname', 'email','password','avatar','phone','address','role'];

	function get_email($email) {
		$row = $this->db->table($this->table)->where('user.email',$email)->get()->getRow();
		if ($row) {
			return true;
		}
		return false;
	}
}