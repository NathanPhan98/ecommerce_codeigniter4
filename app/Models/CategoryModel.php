<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'Category';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['category_name','cate_image'];

    public function listCate(){
        return $this->db->table($this->table)
        ->orderBy('category_id', 'RANDOM')
        ->get()->getResult('array');
    }
}