<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CategoryModel;
class Category extends BaseController
{
    public function listCategory()
    {
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
    	$category_model= new CategoryModel();
    	$categoryz=$category_model->findAll();
    	$data['title']="List Category";
    	$data['categories']=$categoryz;
        $data['left']=view("Views/admin/layout/left");
    	$data['head']=view("Views/admin/layout/head");
    	$data['content']=view("Views/admin/Pages/categoryList",$data);
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
		$data['title']="Add Category";
		$data['left']=view("Views/admin/layout/left");
		$data['head']=view("Views/admin/layout/head");
		$data['content']=view('Views/admin/Pages/categoryAdd',$data);
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
		$target_file = "assets/user/images/cateimages";
		$file = $this->request->getFile('img');
		if($file->isValid() && !$file->hasMoved()){
			$file->move($target_file,$file->getName('img'));
		}

		$data=[
			'category_name'=>$this->request->getPost('cate_name'),
			'cate_image'=>$file->getName('img'),
		];

		$category_model = new CategoryModel();
		$category_model->insert($data);
		return '<script>window.location ="'.base_url().'/admin/category/list"</script>';
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
    	$categoryz=$category_model->where('category_id',$var)->first();
        $data['title']="Update Category";
        $data['categories'] = $categoryz; 
		$data['left']=view("Views/admin/layout/left");
		$data['head']=view("Views/admin/layout/head");
		$data['content']=view('Views/admin/Pages/categoryUpdate',$data);
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
        $data=[
			'category_name'=>$this->request->getPost('cate_name')
		];
        $category_model = new CategoryModel();
        $category_model->update($this->request->getPost('category_id'), $data);
    	return '<script>window.location ="'.base_url().'/admin/category/list"</script>';
    }

	public function delete($id){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		$category_model= new CategoryModel();
		$category_model->delete($id);
		return '<script>window.location ="'.base_url().'/admin/category/list"</script>';
	}
}
