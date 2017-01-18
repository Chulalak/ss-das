<!-- javascripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- custom select -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.customSelect.min.js" ></script>
    <!--custome script for all page-->
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    <!-- javascript for Dialog -->
    <script src="<?php echo base_url(); ?>assets/js/vdialog/lib/vdialog.js"></script>
    <!-- javascript for validate form -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script>
        //XXX When click save button then validation any data in fields 
       $('#btnSave').click(function(e) {           
            $("#register_form").validate({
              rules: {
                txtUsername: "required",              
                txtPassword: {
                  required: true,
                  minlength: 5
                },
                txtConPassword: {
                  required: true,
                  minlength: 5,
                  equalTo: "#txtPassword"
                },
                txtFName: "required",
                txtLName: "required",
                txtEmail: {
                  required: true,
                  email: true
                }
              },
              messages: {
                txtUsername: "กรุณากรอกชื่อผู้ใช้",               
                txtPassword: {
                    required: "กรุณากรอกรหัสผ่าน",
                    minlength: "รหัสผ่านควรมีอย่างน้อย 5 ตัวอักษร"
                },
                txtConPassword: {
                    required: "กรุณากรอกรหัสผ่านอีกครั้ง",
                    minlength: "รหัสผ่านควรมีอย่างน้อย 5 ตัวอักษร",
                    equalTo: "กรุณากรอกรหัสผ่านอีกครั้ง รหัสผ่านไม่ตรงกัน"
                },
                txtFName: "กรุณากรอกชื่อจริงของคุณ",
                txtLName: "กรุณากรอกนามสกุลของคุณ",
                txtEmail: {
                    required:"กรุณากรอกอีเมลของคุณ",
                    email: "รูปแบบอีเมลไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง"
                }
              },
              //XX when submit form
                submitHandler: function (form) { 
                    var dataString  = 'username=' + $("#txtUsername").val();
                        dataString += '&password=' + $("#txtPassword").val();
                        dataString += '&fname=' + $("#txtFName").val();
                        dataString += '&lname=' + $("#txtLName").val();
                        dataString += '&email=' + $("#txtEmail").val();
                        console.log(dataString);
                    $.ajax({
                        type	: "POST",
                        url 	: "<?php echo base_url(); ?>SignUp/signup",
                        data 	: dataString,
                        dataType    : 'text',
                        success	: function(res){
                            console.log(res);
                            if(res === "success"){
                                vdialog.success('บันทึกข้อมูลเรียบร้อยแล้ว.', function(){
                                    window.location.href = 'Home';
                                });
                            }else if(res === "fail"){
                                vdialog.error('มีชื่อผู้ใช้นี้แล้ว.');
                            }                      
                        },error    : function(err){
                            vdialog.error('พบข้อผิดพลาดบางประการ กรุณาติดต่อผู้ดูแลระบบ.');
                        }
                    });                
                }
            });
        });
    </script>

    </body>
</html>




