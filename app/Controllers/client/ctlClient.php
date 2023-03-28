<?php

namespace App\Controllers\client;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\UserModel;
use App\Models\ReviewModel;
use App\Models\ContactModel;
class ctlClient extends BaseController
{
    public function index()
    {
        $product_model = new ProductModel();
        $cate_model = new CategoryModel();
        $cateHP=$cate_model->listCate();
        $review_model= new ReviewModel();
        $AverageReviews=$review_model->getAverageReviewsByProductsId();
        $data['AverageReviews']=$AverageReviews;
        $data['cateHP']=$cateHP;
    	$data['title']="Home Page";
        // pagination
        $productHP = $product_model->paginate(8,'productHomePage');
        $data['pager']=$product_model->pager;
        $data['productHP']=$productHP;
        $session=session();
        if(isset($_SESSION['cart'])&&$_SESSION['cart']!=null){
            foreach($_SESSION['cart'] as $key => $value){
                $item[]= $key;
            }
            $data['productCart']=$product_model->find($item);
            $data['cart']=view("Views/user/layout/cart",$data);
        }else{
            $data['cart']=view("Views/user/layout/cart");
        }
    	$data['head']=view("Views/user/layout/head");
        $data['banner']=view("Views/user/layout/banner",$data);
        $data['sidebar']=view("Views/user/layout/sidebar");
        $data['slider']=view("Views/user/layout/slider");
		$data['foot']=view("Views/user/layout/foot");
    	$data['content']=view("Views/user/Pages/productHomePage",$data);
        return view('Views/user/main',$data);
    }

    public function productList() //page products
    {
        $product_model = new ProductModel();
        $products = $product_model->paginate(12,'products');
        $data['pager']=$product_model->pager;
        $review_model= new ReviewModel();
        $AverageReviews=$review_model->getAverageReviewsByProductsId();
        $data['AverageReviews']=$AverageReviews;     
        $cate_model = new CategoryModel();
        $cateHP=$cate_model->listCate();
        $data['cateHP']=$cateHP;
    	$data['title']="List product";
    	$data['products']=$products;
        $session=session();
        if(isset($_SESSION['cart'])&&$_SESSION['cart']!=null){
            foreach($_SESSION['cart'] as $key => $value){
                $item[]= $key;
            }
            $data['productCart']=$product_model->find($item);
            $data['cart']=view("Views/user/layout/cart",$data);
        }else{
            $data['cart']=view("Views/user/layout/cart");
        }
        $data['sidebar']=view("Views/user/layout/sidebar");
        $data['head']=view("Views/user/layout/head");
        $data['foot']=view("Views/user/layout/foot");
    	$data['content']=view("Views/user/Pages/products",$data);
        return view('Views/user/main',$data);
    }

    //Product 
    public function productDetail($var)  
    {
    	$product_model= new ProductModel();
		$productDetail=$product_model->getProductDetail($var);
        $data['productDetail']=$productDetail;
        $review_model= new ReviewModel();
		$reviews=$review_model->getReviewsByProductsId($var);
        $data['reviews']=$reviews;
        $AverageReviews=$review_model->getAverageReviewsByProductsId();
        $data['AverageReviews']=$AverageReviews;
        $relatedProduct_model= new ProductModel();
		$relatedProduct=$relatedProduct_model->getProductsByCateId($productDetail[0]['category_id']);
        $data['relatedProduct']=$relatedProduct;
        $data['title']="List product";
    	$data['content']=view("Views/user/Pages/productDetail",$data);
    	$data['head']=view("Views/user/layout/head");
        $session=session();
        if(isset($_SESSION['cart'])&&$_SESSION['cart']!=null){
            foreach($_SESSION['cart'] as $key => $value){
                $item[]= $key;
            }
            $data['productCart']=$product_model->find($item);
            $data['cart']=view("Views/user/layout/cart",$data);
        }else{
            $data['cart']=view("Views/user/layout/cart");
        }
        $data['sidebar']=view("Views/user/layout/sidebar");
		$data['foot']=view("Views/user/layout/foot");
        return view('Views/user/main',$data);
    }

    public function act_AddReview(){
        $session=session();
        if($this->request->getPost('starNum'))
        {
            $star = $this->request->getPost('starNum');
        }else{
            $star = 5;
        }
        $data=[
			'product_id'=>$this->request->getPost('product_id'),
			'user_id'=>$this->request->getPost('user_id'),
			'review_content'=>$this->request->getPost('review'),
			'starNum'=>$star
		];
        $review_model= new ReviewModel();
		$review_model ->insert($data);
		return '<script>window.location ="'.base_url().'/productdetail/'.$this->request->getPost('product_id').'"</script>';
    } 

    public function act_updateReview(){
        $session=session();
        $review_model= new ReviewModel();
        $oldRate = $review_model->where('rv_id',$this->request->getPost('rv_id'))->first();
        $data=[
			'review_content'=>$this->request->getPost('review')
		];
        if($this->request->getPost('starNum')!=0)
        {
            $data['starNum'] = $this->request->getPost('starNum');
        }else{
            $data['starNum'] = $oldRate['starNum'];
        }
        $review_model= new ReviewModel();
		$review_model ->update($this->request->getPost('rv_id'), $data);
        return '<script>window.location ="'.base_url().'/productdetail/'.$this->request->getPost('product_id').'"</script>';
    }



    public function addToCart($id) // ko dùng tới 
    {
        $session=session();
            if(isset($_SESSION['cart'][$id])){ 
                if($this->checkQtyProduct($id,$_SESSION['cart'][$id]+1)){
                    $quantity = $_SESSION['cart'][$id] + 1; 
                }else{
                    return "quantity is not enough";
                }
            } 
            else if($this->getQtyProduct($id)>0)
            {
                $quantity = 1;
            }
            else{
                return "quantity is not enough";
            }
            $_SESSION['cart'][$id] = $quantity; 
            return '<script>window.location ="http://localhost:8081/"</script>';   
    }

    public function addOneToCart() {
        $session=session();
        $pID = $this->request->getPost('productID');
        if(!$this->request->getPost('quantity')){
            return '<script>
                    window.location ="http://localhost:8081/productdetail/'.$pID.'";
                    alert("please enter a quantity");
                    </script>'; 
        }else{
            $qty = $this->request->getPost('quantity');
        }
        $_SESSION['cart'][$pID] = $qty; 
        return '<script>window.location ="http://localhost:8081/"</script>';   
    }


    public function deleteCart($id){ 
        $session=session();
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }
        if($id == 0){
            unset($_SESSION['cart']);
        }else{
            unset($_SESSION['cart'][$id]);
        }
        if(isset($_SESSION['cart'])){
            return '<script>window.location ="http://localhost:8081/cart"</script>';
        }
        return '<script>window.location ="http://localhost:8081/"</script>';
    }
	
    public function updateCart(){ 
        $session=session();
        if($this->request->getPost('quantity')==null){
            return '<script>window.location ="http://localhost:8081/cart"</script>';
        }else{
        foreach($this->request->getPost('quantity') as $key=>$value){
            if(($value == 0 ) and (is_numeric($value))){
                unset($_SESSION['cart'][$key]);
            }else if(($value > 0) and (is_numeric($value)) and $this->checkQtyProduct($key,$value)){
                $_SESSION['cart'][$key] = $value;
            }
        }
        return '<script>window.location ="http://localhost:8081/cart"</script>';
        }
    }

    public function cart() 
    {
        $session=session();
    	$product_model= new ProductModel();
		$productsCart=$product_model->getProducts();
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $value){
                $item[]= $key;
            }
                if($_SESSION['cart']!=null){
                    $data['productCart']=$product_model->find($item);
                    $data['cart']=view("Views/user/layout/cart",$data);
                }else{
                    $data['productCart']=[];
                }
            $data['content']=view("Views/user/Pages/cartPage",$data);
            
        }
        $data['title']="List product in Cart";
        $data['head']=view("Views/user/layout/head");
        $data['foot']=view("Views/user/layout/foot");
        $data['sidebar']=view("Views/user/layout/sidebar");
        $data['content']=view("Views/user/Pages/cartPage");
        $data['cart']=view("Views/user/layout/cart");
        return view('Views/user/main',$data);
    }


    public function AddOrder(){ 
		$session = session();
        if($session->get('fullname')==null){
            return view('Views/user/login');
        }
		$data=[
			'date'=>date("y/m/d"),
			'user_id'=>$session->get('customerID'),
			'status'=>"1"
		];
		$order_model= new OrderModel();
		$order_model->insert($data);
		$id = $order_model->getInsertID();
		$product_model= new ProductModel();
		$products=$product_model->getProducts();	
		if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $value){
                $item[]= $key;
            }
			$orderdetail_model= new OrderDetailModel();
			foreach($_SESSION['cart'] as $key => $value){
                $dataDetail=[
					'order_id'=>$id,
					'product_id'=>$key,
					'quantity'=>$value 
				];
                if($this->checkQtyProduct($key,$value)){
                    $this->subtractQtyProduct($key,$value);// trường hợp mua được
                    $orderdetail_model->insert($dataDetail);
                    unset($_SESSION['cart'][$key]);
                }else{
                    $order_model->where('order_id', $id)->delete(); //trường hợp chưa mua được
                    $orderdetail_model->where('order_id', $id)->delete();
                    echo '<script>alert("Sorry! the quantity of code '.$key.' not enough!");</script>';
                    return '<script>window.location ="http://localhost:8081/cart"</script>';
                }
            }
        }
        echo '<script>alert("Thanks for buying our product!");</script>';
		return '<script>window.location ="http://localhost:8081/"</script>';
	}

    
    public function customerInfor() 
    {
        $session=session();
    	$user_model= new UserModel();
        $product_model= new ProductModel();
        $orderdetail_model= new OrderDetailModel();
        if(isset($_SESSION['customerID'])){
            $users=$user_model->where('user_id',$_SESSION['customerID'])->first();
            $data['user'] = $users;
            $orderdetail = $orderdetail_model->getPaymentHistoryByUserID($_SESSION['customerID']);
            $data['orderdetail'] = $orderdetail; // foreach cho no ra
        }
    	$data['head']=view("Views/user/layout/head");
        $data['foot']=view("Views/user/layout/foot");
        $data['sidebar']=view("Views/user/layout/sidebar");
        $data['content']=view("Views/user/Pages/customerInfor",$data);
        if(isset($_SESSION['cart'])&&$_SESSION['cart']!=null){
            foreach($_SESSION['cart'] as $key => $value){
                $item[]= $key;
            }
            $data['productCart']=$product_model->find($item);
            $data['cart']=view("Views/user/layout/cart",$data);
        }else{
            $data['cart']=view("Views/user/layout/cart");
        } 
        return view('Views/user/main',$data);
    }

    public function act_updateCustomer(){	
        if (empty($_FILES['avatar']['name'])) {
            $avatar_name = $_POST['oldAvatar'];
        } else {
			$target_file = "assets/user/images/userAvatar/";
            $avatar_name = $_FILES['avatar']['name'];
            move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file . $avatar_name);
        }
        $data=[
			'name'=>$this->request->getPost('name'),
			'fullname'=>$this->request->getPost('fullname'),
			'password'=>$this->request->getPost('password'),
            'avatar'=>$avatar_name,
			'phone'=>$this->request->getPost('phone'),
			'address'=>$this->request->getPost('address')
		];
        $session=session();
        $session->set('fullname',$this->request->getPost('fullname'));
        $user_model = new UserModel();
        $user_model->update($this->request->getPost('user_id'), $data);
		return '<script>window.location ="'.base_url().'/customerInfor"</script>';
    }


    // About 
    public function about()
    {
        $product_model = new ProductModel();
        $productHP=$product_model->getProducts();
        $session=session();
        if(isset($_SESSION['cart'])&&$_SESSION['cart']!=null){
            foreach($_SESSION['cart'] as $key => $value){
                $item[]= $key;
            }
            $data['productCart']=$product_model->find($item);
            $data['cart']=view("Views/user/layout/cart",$data);
        }else{
            $data['cart']=view("Views/user/layout/cart");
        } 
    	$data['head']=view("Views/user/layout/head");
        $data['sidebar']=view("Views/user/layout/sidebar");
		$data['foot']=view("Views/user/layout/foot");
    	$data['content']=view("Views/user/Pages/about",$data);
        return view('Views/user/main',$data);
    }

    // Contact
    public function contact()
    {
        $product_model = new ProductModel();
        $productHP=$product_model->getProducts();
        $session=session();
        if(isset($_SESSION['cart'])&&$_SESSION['cart']!=null){
            foreach($_SESSION['cart'] as $key => $value){
                $item[]= $key;
            }
            $data['productCart']=$product_model->find($item);
            $data['cart']=view("Views/user/layout/cart",$data);
        }else{
            $data['cart']=view("Views/user/layout/cart");
        } 
    	$data['head']=view("Views/user/layout/head");
        $data['sidebar']=view("Views/user/layout/sidebar");
		$data['foot']=view("Views/user/layout/foot");
    	$data['content']=view("Views/user/Pages/contact",$data);
        return view('Views/user/main',$data);
    }

    public function act_SendContact(){
		$data=[
			'email'=>$this->request->getPost('email'),
			'msg'=>$this->request->getPost('msg'),
		];
		$contact_model = new ContactModel();
		$contact_model->insert($data);
		return '<script>
                alert("Thanks for your message, we will reply you soon.");
                window.location ="'.base_url().'"
                </script>';
	}


    // Support function 
    public function getQtyProduct($id_product){ //lấy số lượng của sản phẩm
        $product_model= new ProductModel();
		$products=$product_model->where('product_id',$id_product)->first();
        $slTon = $products['quantity'];
        return $slTon;
    }

    public function checkQtyProduct($id_product,$qty){ // kiểm tra số lượng của sản phẩm
        $slTon = $this->getQtyProduct($id_product);
        if($slTon<$qty){
            return false;//"So luong khong du cung cap";
        }
        return true;
    }

    public function subtractQtyProduct($id_product,$qty){  // trừ đi số lượng của sản phẩm
        $product_model= new ProductModel();
		$products=$product_model->where('product_id',$id_product)->first();
        $slTon = $products['quantity'];
        $products=$product_model->set('quantity', $slTon - $qty )->where('product_id',$id_product)->update();
    }
	
}
