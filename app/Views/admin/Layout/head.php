<header class="dash-toolbar">
                <a href="javascript::void()" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a style="padding-top:7px;color:dimgray;" href=""><h5>Move to your shop</h5></a>
                <div style="padding-top:10px" class="tools">
                    <p><a class="dropdown-item" >Hello admin: <?php 
                        $session = session();
                        if($session->get('fullname')!==null){
                            echo $session->get('fullname'); 
                        }
                            else{ 
                                $session->destroy();
                     ?>
                        <script> window.location.assign('login')</script> 
                    </a>
                    </p>
                    <?php } ?>
                    <p><a class="dropdown-item" href="admin/user/updateAdminProfile">Profile</a></p>
                    <p><a class="dropdown-item" href="logout">Logout</a></p>
                    
                </div>
            </header>
            