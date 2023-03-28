<?php

namespace App\Controllers;
use App\Models\UserModel;
class Home extends BaseController
{
    public function index()
    {
        $session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else

        $data=[];
    	$data['left']=view("Views/admin/layout/left");
    	$data['head']=view("Views/admin/layout/head");
    	$data['content']="";
        return view('Views/admin/main',$data);
    }

    public function login()
    {
        return view('Views/user/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('Views/user/login');
    }

    public function login_action(){
        $user_model = new UserModel();
        $rs = $user_model->where('email',$this->request->getPost('email'))->where('password',$this->request->getPost('password'))->first();
        if($rs){
            $session = session();
            $session->set('fullname',$rs['fullname']);
            $session->set('role',$rs['role']);
            $session->set('customerID',$rs['user_id']);
            if($rs['role']==1){
                return '<script>window.location ="'.base_url().'/admin"</script>';
            }else
            return '<script>window.location ="'.base_url().'"</script>';
        }else
            return '<script>
                alert("Login Failed. Email or password is incorrect");
                window.location ="'.base_url().'/login"
                </script>';
    }   
    

    public function signUp()
    {
        return view('Views/user/signUp');
    }

    public function signUp_action(){
        $user_model = new UserModel();
        $kq = $user_model->get_email($this->request->getPost('email'));
        if($kq){  
            return '<script>alert("The email address has been used");
            window.location ="'.base_url().'/signup";
            </script>';
        }
        $data=[
			'fullname'=>$this->request->getPost('fullname'),
			'email'=>$this->request->getPost('email'),
			'password'=>$this->request->getPost('password'),
            'address'=>$this->request->getPost('address'),
			'role'=>2
		];
		$user_model->insert($data);
        $rs = $user_model->where('email',$this->request->getPost('email'))->where('password',$this->request->getPost('password'))->first();
        $session = session();
        $session->set('fullname',$rs['fullname']);
        $session->set('customerID',$rs['user_id']);
		return '<script>window.location ="'.base_url().'"</script>';
    }   
}

