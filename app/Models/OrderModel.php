<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'order';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['date', 'user_id', 'note','status'];

    public function getOrderList(){
        return $this->db->table($this->table)
        ->join('user','order.user_id = user.user_id')
        ->get()->getResult('array');
    }
}