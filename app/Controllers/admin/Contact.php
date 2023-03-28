<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\ContactModel;
class Contact extends BaseController
{
    public function listContact()
    {
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
    	$contact_model= new ContactModel();
    	$contact=$contact_model->findAll();
    	$data['title']="List Contact";
    	$data['contact']=$contact;
        $data['left']=view("Views/admin/layout/left");
    	$data['head']=view("Views/admin/layout/head");
    	$data['content']=view("Views/admin/Pages/contactList",$data);
        return view('Views/admin/main',$data);
    }

	public function delete($id){
		$session = session();
        if(!isset($_SESSION['role'])||$_SESSION['role']!=1){
            return '<div style="text-align: center;padding-top:300px;">
                    <h1 >You do not have permission to access this</h1>
                    <br>
                    <a href="'.base_url().'">Go back to shopping</a></div>';
        }else
		$contact_model= new ContactModel();
		$contact_model->delete($id);
		return '<script>window.location ="'.base_url().'/admin/contact/list"</script>';
	}
}
