<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table      = 'order_detail';
    protected $primaryKey = 'order_detail_id';
    protected $allowedFields = ['order_id','product_id', 'quantity'];

    public function getOrderDetail($var){
        return $this->db->table($this->table)
        ->select('order_detail_id,order_detail.order_id,order_detail.product_id,name,order_detail.quantity,date,user_id,note,status')
        ->join('order','order_detail.order_id = order.order_id')
        ->join('product','order_detail.product_id = product.product_id')
        ->where('order_detail.order_id',$var)->get()->getResult('array');
    }

    public function getBestSellerProduct(){
        return $this->db->table($this->table)->select('order_detail.product_id, img,price,name, sum(order_detail.quantity) as sl')->join('product','product.product_id = order_detail.product_id')->groupBy("order_detail.product_id")->orderBy('sl', 'DESC')->limit(8)->get()->getResult('array');
    }

    public function getPaymentHistoryByUserID($var){
        return $this->db->table($this->table)
        ->select('order_detail.order_id,date,name,order_detail.quantity,note,status')
        ->join('order','order_detail.order_id = order.order_id')
        ->join('product','order_detail.product_id = product.product_id')
        ->where('order.user_id',$var)->get()->getResult('array');
    }
}