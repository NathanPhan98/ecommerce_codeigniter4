<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ProductModel;
class Order extends BaseController
{

    public function listOrder()
    {
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
    	$order_model= new OrderModel();
		$orders=$order_model->getOrderList();
    	$data['title']="List Order";
    	$data['orders']=$orders;
        $data['left']=view("Views/admin/layout/left");
    	$data['head']=view("Views/admin/layout/head");
    	$data['content']=view("Views/admin/Pages/orderList",$data);
        return view('Views/admin/main',$data);
    }

	public function listDetailOrder()
    {
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		$var = $_GET['id'];
    	$orderdetail_model= new OrderDetailModel();
		$orderdetails=$orderdetail_model->getOrderDetail($var);
    	$data['title']="List Order details";
    	$data['orderdetails']=$orderdetails;
        $data['left']=view("Views/admin/layout/left");
    	$data['head']=view("Views/admin/layout/head");
    	$data['content']=view("Views/admin/Pages/orderDetailList",$data);
        return view('Views/admin/main',$data);
    }//admin


	public function ctlGetProductQty($var){
		$product_model= new ProductModel();
    	$product=$product_model->where('product_id',$var)->first(); 
		return $product;
	}

	public function ctlGetOrderDetailQty($var){
		$order_model= new OrderDetailModel();
    	$order=$order_model->where('order_id',$var)->findAll(); 
		return $order;
	}

	function cancelOrder(){
		$orderdetail = $this->ctlGetOrderDetailQty($this->request->getPost('orderId'));
		for($i = 0;$i< count($orderdetail);$i++){
			$qty = $this->ctlGetProductQty($orderdetail[$i]['product_id']);
			$data[]=[
				'product_id' => $orderdetail[$i]['product_id'],
				'quantity' => $orderdetail[$i]['quantity'] + $qty['quantity']
			];
		}
		$product_model = new ProductModel();
		$product_model->updateBatch($data,'product_id'); 
	}

	public function act_update($mode){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		$order_model = new OrderModel();
		$id = $this->request->getPost('orderId');
		$order = $order_model->where('order_id',$id)->first();
		if(!isset($order) || $order['status']!=1){
			return "Bạn không thể thực hiện động tác này";
		}
		if($mode == 'done'){
			$data=[
				'status'=>2
			];
		}else if($mode == 'cancel'){
			$data=[
				'status'=>3
			];
			$this->cancelOrder();
		}
        $order_model->update($id, $data);
		return '<script>window.location ="'.base_url().'/admin/order/list"</script>';
    }

	public function delete($id){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		$order_model= new OrderModel();
		$orderdetail_model= new OrderDetailModel();
		$order_model->delete($id);
		$orderdetail_model->where('order_id',$id)->delete();
		return '<script>window.location ="'.base_url().'/admin/order/list"</script>';
	}
}
