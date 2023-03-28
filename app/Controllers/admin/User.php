<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
class User extends BaseController
{
    public function listUser()
    {
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
    	$user_model= new UserModel();
    	$users=$user_model->where('role',2)->findAll();
    	$data['title']="List User";
    	$data['users']=$users;
        $data['left']=view("Views/admin/layout/left");
    	$data['head']=view("Views/admin/layout/head");
    	$data['content']=view("Views/admin/Pages/userList",$data);
        return view('Views/admin/main',$data);
    }

    public function updateAdminProfile()
    {
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
    	$user_model= new UserModel();
    	$user=$user_model->where('user_id',$_SESSION['customerID'])->first();
    	$data['title']="Update your profile";
    	$data['user']=$user;
        $data['left']=view("Views/admin/layout/left");
    	$data['head']=view("Views/admin/layout/head");
    	$data['content']=view("Views/admin/Pages/updateAdminProfile",$data);
        return view('Views/admin/main',$data);
    }

    public function act_update_admin(){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
        $data=[
			'name'=>$this->request->getPost('name'),
			'fullname'=>$this->request->getPost('fullname'),
			'email'=>$this->request->getPost('email'),
			'password'=>$this->request->getPost('password'),
			'phone'=>$this->request->getPost('phone'),
			'address'=>$this->request->getPost('address'),
		];
        $user_model = new UserModel();
        $user_model->update($this->request->getPost('user_id'), $data);
		return '<script>window.location ="'.base_url().'/admin/user/updateAdminProfile"</script>';
    }
	
	//them
	public function add(){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else

		$data['title']="Add user";
		$data['left']=view("Views/admin/layout/left");
		$data['head']=view("Views/admin/layout/head");
		$data['content']=view('Views/admin/Pages/userAdd',$data);
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
		$data=[
			'name'=>$this->request->getPost('name'),
			'fullname'=>$this->request->getPost('fullname'),
			'email'=>$this->request->getPost('email'),
			'password'=>$this->request->getPost('password'),
			'phone'=>$this->request->getPost('phone'),
			'address'=>$this->request->getPost('address'),
			'role'=>$this->request->getPost('role')
		];
		$user_model = new UserModel();
		$user_model->insert($data);
		return '<script>window.location ="'.base_url().'/admin/user/list"</script>';
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
        $user_model= new UserModel();
    	$users=$user_model->where('user_id',$var)->first();
        $data['title']="Update User";
        $data['user'] = $users; 
		$data['left']=view("Views/admin/layout/left");
		$data['head']=view("Views/admin/layout/head");
		$data['content']=view('Views/admin/Pages/userUpdate',$data);
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
			'name'=>$this->request->getPost('name'),
			'fullname'=>$this->request->getPost('fullname'),
			'email'=>$this->request->getPost('email'),
			'password'=>$this->request->getPost('password'),
			'phone'=>$this->request->getPost('phone'),
			'address'=>$this->request->getPost('address'),
			'role'=>$this->request->getPost('role')
		];
        $user_model = new UserModel();
        $user_model->update($this->request->getPost('user_id'), $data);
		return '<script>window.location ="'.base_url().'/admin/user/list"</script>';
    }

     public function delete($id){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
     	$user_model= new UserModel();
     	$user_model->delete($id);
     	return '<script>window.location ="'.base_url().'/admin/user/list"</script>';
     }
}
