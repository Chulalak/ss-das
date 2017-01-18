<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png" />
    <title>ระบบจัดการครุภัณฑ์</title>

    <!-- Bootstrap CSS -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!-- font icon -->
      <link href="<?php echo base_url(); ?>assets/css/elegant-icons-style.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
      <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
      <link href="<?php echo base_url(); ?>assets/DataTables/media/css/jquery.dataTables.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/DataTables/extensions/Editor/css/dataTables.editor.css" rel="stylesheet">
    <!-- CSS for dialog -->
      <link href="<?php echo base_url(); ?>assets/css/vdialog.css" rel="stylesheet">

  </head>
  <body>
        <section class="wrapper">
            <div class="container">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           แก้ไขข้อมูลส่วนตัว
                        </header>
                        <div class="panel-body">                       
                            <form class="form-inline" method="post" id="formProfile" style="font-size: 15px;padding-left: 20px">
                                <?php foreach ($rs as $user) { ?>                                   
                                
                                <table style="margin-left: 20px">
                                    <tbody>
                                        <tr>
                                            <td width="125" style="text-align: right"> &nbsp;ชื่อผู้ใช้ <span class="required">*</span></td>
                                            <td width="500">
                                                <input class="form-control" name="txtUsername" type="text" id="txtUsername" size="20" style="margin-left: 20px; width: 70%" required="required" readonly="readonly" value="<?php echo $user['usrname']?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right">&nbsp;ชื่อ <span class="required">*</span></td>
                                            <td><input class="form-control" name="txtFName" type="text" id="txtFName" style="margin-left: 20px; width: 70%" required="required" value="<?php echo $user['usrfname']?>"></td>
                                        </tr>
                                         <tr>
                                            <td style="text-align: right">&nbsp;นามสกุล <span class="required">*</span></td>
                                            <td><input class="form-control" name="txtLName" type="text" id="txtLName" style="margin-left: 20px; width: 70%" required="required" value="<?php echo $user['usrlname']?>"></td>
                                        </tr>
                                         <tr>
                                            <td style="text-align: right">&nbsp;อีเมล <span class="required">*</span></td>
                                            <td><input class="form-control" name="txtEmail" type="email" id="txtEmail" style="margin-left: 20px; width: 70%" required="required" value="<?php echo $user['usremail']?>"></td>
                                         </tr>
                                  </tbody>
                                </table> &nbsp;
                                
                                    <div class="col-md-12 form-group" style="margin-left: 13%;">
                                        <a class="btn btn-danger btn-md" id="btnChangePasswd"  type="button" data-toggle="modal" data-target="#changPasswd"><span><i class="icon_key_alt fa-1x"></i></span> เปลี่ยนรหัสผ่าน </a>
                                        <button class="btn btn-success btn-md" id="btnUpdate"  type="submit"><span><i class="fa fa-floppy-o"></i></span> อัพเดตข้อมูล </button>
                                        <a class="btn btn-info btn-md" id="btnBack"  type="button" href="<?php echo base_url(); ?>Home"> กลับหน้าจอหลัก </a>
                                    </div>&nbsp;
                                
                            </form>&nbsp;
                            <!-- Modal of Change Password -->
                                <div class="modal fade" id="changPasswd" tabindex="-1" role="dialog" aria-labelledby="myModalChangPasswd">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalChangPasswd">เปลี่ยนรหัสผ่าน</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formChangPasswd">
                                                    <div class="form-group">
                                                        <label for="username">ชื่อผู้ใช้</label>
                                                        <input type="text" class="form-control" id="username" name="username" readonly="readonly" value="<?php echo $user['usrname']?>">
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="oldPasswd">รหัสผ่านเดิม</label>
                                                        <input type="password" class="form-control" id="oldPasswd" name="oldPasswd">
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="newPasswd">ตั้งรหัสผ่านใหม่</label>
                                                        <input type="password" class="form-control" id="newPasswd" name="newPasswd">
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="conPasswd">ยืนยันรหัสผ่านใหม่</label>
                                                        <input type="password" class="form-control" id="conPasswd" name="conPasswd">
                                                    </div> 
                                                    <div class="modal-footer">
                                                        <button id="btnChange" type="submit" class="btn btn-danger">เปลี่ยนรหัส</button> &nbsp;
                                                        <button id="btnCancel" type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            <?php }  ?>
                        </div>
                    </section>
                </div>
            </div>                 
        </section>
      
        <!-- javascripts -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- custom select -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.customSelect.min.js" ></script>
        <!--custome script for all page-->
<!--        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>-->
        <!-- javascript for Dialog -->
        <script src="<?php echo base_url(); ?>assets/js/vdialog/lib/vdialog.js"></script>
        <!-- javascript for validate form -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

        <script>

            $("#formChangPasswd").validate({
                rules: {            
                    oldPasswd: {
                        required    : true,
                        minlength   : 5
                    },
                    newPasswd: {
                        required    : true,
                        minlength   : 5
                    },
                    conPasswd: {
                        required    : true,
                        minlength   : 5,
                        equalTo     : "#newPasswd"
                    }
                },
                messages: {            
                    oldPasswd: {
                        required    : "กรุณากรอกรหัสผ่านเดิม",
                        minlength   : "รหัสผ่านความยาวอย่างน้อย 5 ตัวอักษร"
                    },
                    newPasswd: {
                        required    : "กรุณากรอกรหัสผ่านใหม่",
                        minlength   : "รหัสผ่านความยาวอย่างน้อย 5 ตัวอักษร"
                    },
                    conPasswd: {
                        required    : "กรุณากรอกยืนยันรหัสผ่าน",
                        minlength   : "รหัสผ่านความยาวอย่างน้อย 5 ตัวอักษร",
                        equalTo     : "รหัสผ่านไม่ตรงกัน"
                    }
                },
                submitHandler: function (form) { 
                    console.log("submit")
                    var dataString  = 'username=' + $("#username").val();
                        dataString += '&oldPasswd=' + $("#oldPasswd").val();
                        dataString += '&newPasswd=' + $("#newPasswd").val();
                        console.log(dataString);
                    $.ajax({
                        type	: "POST",
                        url 	: "<?php echo base_url(); ?>Profile/changePasswd",
                        data 	: dataString,
                        dataType    : 'text',
                        success	: function(res){
                            console.log(res);
                            if(res === "success"){
                                vdialog.success('อัพเดตข้อมูลเรียบร้อยแล้ว.', function(e){
                                    window.location.href="Profile";
                                });
                            } else if(res === "fail"){
                                vdialog.error('คุณกรอกรหัสผ่านเดิมไม่ถูกต้อง.');
                            }                 
                        },error    : function(err){
                            vdialog.error('พบข้อผิดพลาดบางประการ กรุณาติดต่อผู้ดูแลระบบ.');
                        }
                    });
                }
            });
            
            $("#formProfile").validate({
                rules: {
                    txtUsername: "required",              
                    txtFName: "required",
                    txtLName: "required",
                    txtEmail: {
                      required: true,
                      email: true
                    }
                },
                messages: {
                    txtUsername: "กรุณากรอกชื่อผู้ใช้",               
                    txtFName: "กรุณากรอกชื่อจริงของคุณ",
                    txtLName: "กรุณากรอกนามสกุลของคุณ",
                    txtEmail: {
                        required:"กรุณากรอกอีเมลของคุณ",
                        email: "รูปแบบอีเมลไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง"
                  }
                },
                submitHandler: function (form) { // for demo
                    var dataString  = 'username=' + $("#txtUsername").val();
                        dataString += '&fname=' + $("#txtFName").val();
                        dataString += '&lname=' + $("#txtLName").val();
                        dataString += '&email=' + $("#txtEmail").val();
                        console.log(dataString);
                    $.ajax({
                        type	: "POST",
                        url 	: "<?php echo base_url(); ?>Profile/changeProfile",
                        data 	: dataString,
                        dataType    : 'text',
                        success	: function(res){
                            console.log(res);
                            if(res === "success"){
                                vdialog.success('อัพเดตข้อมูลเรียบร้อยแล้ว.');
                            }                  
                        },error    : function(err){
                            vdialog.error('พบข้อผิดพลาดบางประการ กรุณาติดต่อผู้ดูแลระบบ.');
                        }
                    });
                }
            });

        </script>
    </body>
</html>

