<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'product';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['name','price','quantity','img','detail','category_id'];

    public function getProducts(){
        return $this->db->table($this->table)->join('category','product.category_id = category.category_id')->get()->getResult('array');
    }
    
    public function getProductsByCateId($var){
        return $this->db->table($this->table)->join('category','product.category_id = category.category_id')
        ->where('product.category_id',$var)->get()->getResult('array');
    }

    public function getProductDetail($var){
        return $this->db->table($this->table)->join('category','product.category_id = category.category_id')
        ->where('product.product_id',$var)->get()->getResult('array');
    }
    
    //admin
    public function getProductDetailAdmin($var){
        return $this->db->table($this->table)->join('category','product.category_id = category.category_id')
        ->where('product.product_id',$var)->get()->getResult('array');
    }  
}

