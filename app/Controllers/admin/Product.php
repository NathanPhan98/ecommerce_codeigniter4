<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
class Product extends BaseController
{
    public function listProduct()
    {
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
    	$product_model= new ProductModel();
		$products=$product_model->getProducts();
    	$data['title']="List Product";
    	$data['products']=$products;
        $data['left']=view("Views/admin/layout/left");
    	$data['head']=view("Views/admin/layout/head");
    	$data['content']=view("Views/admin/Pages/productList",$data);
        return view('Views/admin/main',$data);
    }

	public function add(){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		$category_model= new CategoryModel();
    	$categoryz=$category_model->findAll();
		$data['categoryz']=$categoryz;
		$data['title']="Add Product";
		$data['left']=view("Views/admin/layout/left");
		$data['head']=view("Views/admin/layout/head");
		$data['content']=view('Views/admin/Pages/productAdd',$data);
		return view('Views/admin/main',$data);
	}

	public function act_add(){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		$target_file = "assets/user/images/products";
		$file = $this->request->getFile('img');
		if($file->isValid() && !$file->hasMoved()){
			$file->move($target_file,$file->getName('img'));
		}	
		$data=[
			'name'=>$this->request->getPost('name'),
			'price'=>$this->request->getPost('price'),
			'quantity'=>$this->request->getPost('quantity'),
			'img'=>$file->getName('img'),
			'detail'=>$this->request->getPost('detail'),
			'category_id'=>$this->request->getPost('category_id')
		];
		$product_model = new ProductModel();
		$product_model->insert($data);
		return '<script>window.location ="'.base_url().'/admin/product/list"</script>';
	}

	public function update(){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
        $data=[];
        $var = $_GET['id'];
		$category_model= new CategoryModel();
    	$categoryz=$category_model->findAll();
		$data['categoryz']=$categoryz;
        $product_model= new ProductModel();
    	$products=$product_model->getProductDetailAdmin($var);
        $data['title']="Update Product";
        $data['productz'] = $products; 
		$data['left']=view("Views/admin/layout/left");
		$data['head']=view("Views/admin/layout/head");
		$data['content']=view('Views/admin/Pages/productUpdate',$data);
		return view('Views/admin/main',$data);
    }

    public function act_update(){	
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		if (empty($_FILES['img']['name'])) {
            $image_name = $_POST['oldImg'];
        } else {
			$target_file = "assets/user/images/products/";
            $image_name = $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file . $image_name);
        }
        $data=[
			'name'=>$this->request->getPost('name'),
			'price'=>$this->request->getPost('price'),
			'quantity'=>$this->request->getPost('quantity'),
			'img'=>$image_name,
			'detail'=>$this->request->getPost('detail'),
			'category_id'=>$this->request->getPost('category_id')
		];
        $product_model = new ProductModel();
        $product_model->update($this->request->getPost('product_id'), $data);
    	return '<script>window.location ="'.base_url().'/admin/product/list"</script>';
    }

	public function delete($id){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		$product_model= new ProductModel();
		$product_model->delete($id);
		return '<script>window.location ="'.base_url().'/admin/product/list"</script>';
	}
}
