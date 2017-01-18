<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <header class="panel-heading">
                       ลงทะเบียนเข้าใช้งาน
                    </header>
                    <div class="panel-body">                       
                        <form class="form-inline" method="post" id="register_form" style="font-size: 15px;padding-left: 20px">
                            <!-- ******  div for button ****** -->
                            <div class="col-md-12 form-group" style="text-align: left;">
                                <a class="btn btn-info btn-md" id="btnBack"  type="button" href="javascript:window.history.go(-1);"><span><i class="fa fa-arrow-left"></i></span> กลับ </a>
                                <button class="btn btn-success btn-md" id="btnSave"  type="submit"><span><i class="fa fa-floppy-o"></i></span> บันทึก </button>
                            </div>&nbsp;
                            <!-- ******* register form ****** -->
                            <table style="margin-left: 20px">
                                <tbody>
                                    <tr>
                                        <td width="125" style="text-align: right"> &nbsp;ชื่อผู้ใช้ <span class="required">*</span></td>
                                        <td width="500">
                                            <input class="form-control" name="txtUsername" type="text" id="txtUsername" size="20" style="margin-left: 20px" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"> &nbsp;รหัสผ่าน <span class="required">*</span></td>
                                        <td><input class="form-control" name="txtPassword" type="password" id="txtPassword" style="margin-left: 20px" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"> &nbsp;ยืนยันรหัสผ่าน <span class="required">*</span></td>
                                        <td><input class="form-control" name="txtConPassword" type="password" id="txtConPassword" style="margin-left: 20px" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right">&nbsp;ชื่อ <span class="required">*</span></td>
                                        <td><input class="form-control" name="txtFName" type="text" id="txtFName" style="margin-left: 20px" required="required"></td>
                                    </tr>
                                     <tr>
                                        <td style="text-align: right">&nbsp;นามสกุล <span class="required">*</span></td>
                                        <td><input class="form-control" name="txtLName" type="text" id="txtLName" style="margin-left: 20px" required="required"></td>
                                    </tr>
                                     <tr>
                                        <td style="text-align: right">&nbsp;อีเมล <span class="required">*</span></td>
                                        <td><input class="form-control" name="txtEmail" type="email" id="txtEmail" style="margin-left: 20px" required="required"></td>
                                     </tr>
                              </tbody>
                            </table>&nbsp;
                            
                        </form>&nbsp;
                    </div>
                </section>
            </div>
        </div>                 
    </section>
        
</section>
</section>

