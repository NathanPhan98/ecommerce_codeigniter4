<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
<base href="<?=base_url();?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="assets/user/login/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Create an account</h4>
                                    <form action="signUp_action" method="post">
                                        <div class="form-group">
                                            <label><strong>Full name</strong></label>
                                            <input type="text" class="form-control"  maxlength="25" onkeypress="return isNumberKey(event)" id="fullname" placeholder="Enter fullname" name="fullname" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" maxlength="30" onkeypress="return isNumberKey(event)"  id="email" placeholder="Enter email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" maxlength="25" onkeypress="return isNumberKey(event)" id="password" placeholder="Enter password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Address</strong></label>
                                            <input type="text" class="form-control" maxlength="100" onkeypress="return isNumberKey(event)" id="address" placeholder="Enter address" name="address" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>I already have an account <a class="text-primary" href="login">Login</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
   
</body>

</html>