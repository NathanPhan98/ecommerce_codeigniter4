<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table      = 'review_product';
    protected $primaryKey = 'rv_id';
    protected $allowedFields = ['product_id','user_id','review_content','starNum'];

    public function getReviewsByProductsId($var){
        return $this->db->table($this->table)
        ->join('user','user.user_id = review_product.user_id')
        ->where('product_id',$var)->get()->getResult('array');
    }
    public function getAverageReviewsByProductsId(){
        return $this->db->table($this->table)
        ->select('product_id as pdID','starNum')->selectCount('product_id')->selectSum('starNum')
        ->groupBy('product_id')
        ->get()->getResult('array');
    }
}