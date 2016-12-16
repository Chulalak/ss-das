<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">

    <title>ระบบจัดการครุภัณฑ์ | ลงชื่อเข้าใช้</title>

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />
    <!-- CSS for dialog -->
      <link href="<?php echo base_url(); ?>assets/css/vdialog.css" rel="stylesheet">
   
</head>

  <body class="login-img3-body">
        <form class="login-form" id="login" method="post" action="<?php echo base_url(); ?>Login/authen">
            <div class="login-wrap">
                <p class="login-img"><img src="<?php echo base_url(); ?>assets/img/logo.png" height="100px"></i></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa-1x"></i></span>
                  <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้" autofocus required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt fa-1x"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required>
                </div>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right"> <a href="#"> ลืมรหัสผ่าน?</a></span>
                </label>
                <button class="btn btn-primary btn-lg btn-block" id="btnLogin" name="btnLogin" type="button">ลงชื่อเข้าใช้</button>
                <button class="btn btn-info btn-lg btn-block" type="button" onclick="window.location.href='SignUp';">ลงทะเบียน</button>
            </div>
        </form>
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- custom select -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.customSelect.min.js" ></script>
         <!-- javascript for Dialog -->
        <script src="<?php echo base_url(); ?>assets/js/vdialog/lib/vdialog.js"></script>
        <script>
            $('#btnLogin').click(function(e) {                
                var username = $('#username').val();
                var password = $('#password').val();
                $.ajax({                                
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "Login/authen",
                    dataType: 'json',
                    data: {username: username, password: password},
                    success: function(res) {
                       console.log(res);
//                       var count = Object.keys(res).length;
//                       console.log(count);
                       if(res == 1){
                           console.log("res=1");
                           window.location.href = 'Home';
                       }else if(res == 0){
                           console.log("res=2");
                           vdialog.error("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง.");
                       }
                    },error: function(err){
                        vdialog.error("พบข้อผิดพลาดบางประการ กรุณาติดต่อผู้ดูแลระบบ.");    
                    }
                });
            });
            
        </script>
		
	</body>
</html>
