<section id="main-content">
    <section class="wrapper">
      <!--===========================breadcrumb================================-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-search"></i> ค้นหาครุภัณฑ์</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="Home">หน้าแรก</a></li>
                    <li><i class="fa fa-briefcase"></i><a href="Home">จัดการครุภัณฑ์</a></li>
                    <li><i class="fa fa-search"></i>ค้นหาครุภัณฑ์</li>
                </ol>
            </div>
        </div>
            <div class="row">
        <div class="col-lg-12">
            <div class="col-md-12 form-group" style="text-align: left;">
                <a class="btn btn-info btn-md" id="btnBack"  type="button" href="javascript:window.history.go(-1);"><span><i class="fa fa-arrow-left"></i></span> กลับ </a>
                <a class="btn btn-danger btn-md" id="btnAdd"  type="button" href="AddAssets"><span><i class="fa fa-plus"></i></span> เพิ่มข้อมูล </a>
            </div>
            <section class="panel">
                <header class="panel-heading">
                    ค้นหาครุภัณฑ์
                </header>
                <div class="panel-body">  
                    <form class="form-inline" method="get" id="register_form" style="font-size: 15px;padding-left: 20px">
                        <table style="margin-left: 20px">
                            <tbody>
                                <tr>
                                    <td width="125" style="text-align: right">บริษัท <span class="required">*</span></td>
                                    <td width="400">
                                        <select class="form-control input-md m-bot15" id="company" name="company" style="margin-left: 20px;width: 80%" required="true">
                                            <?php
                                              $no=1;
                                              foreach ($company as $row){
                                                echo '<option value="" disabled selected hidden></option>';
                                                echo '<option value="'.$row['CMPCD'].'">'.$row['CMPLNAME'].'</option>';
                                                $no++;
                                              }
                                            ?>
                                        </select>
                                    </td>
                                    <td width="125" style="text-align: right"> &nbsp;ประเภทครุภัณฑ์ </td>
                                    <td width="400">
                                        <select class="form-control input-md m-bot15" id="catetory" style="margin-left: 20px;width: 80%">
                                            <?php
                                              $no=1;
                                              foreach ($category as $row){
                                                echo '<option value="" disabled selected hidden></option>';
                                                echo '<option value="'.$row['TBDCD'].'">'.$row['TBDDESC'].'</option>';
                                                $no++;
                                              }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>                
                                    <td width="125" style="text-align: right"> &nbsp;วันที่นำเข้า จาก : </td>
                                    <td width="400">
                                        <input type="text" class="date-picker form-control input-md m-bot15" id="deliveryDateFrom" name="deliveryDateFrom" style="margin-left: 20px;width: 80%" />                        
                                    </td>
                                    <td width="125" style="text-align: right"> &nbsp;ถึง : </td>
                                    <td width="400">
                                        <input type="text" class="date-picker form-control input-md m-bot15" id="deliveryDateTo" name="deliveryDateTo" style="margin-left: 20px;width: 80%" />                        
                                    </td>
                                </tr
                                <tr>
                                    <td width="125" style="text-align: right">&nbsp;สถานะ </td>
                                    <td width="400">
                                        <select class="form-control input-md m-bot15" id="status" name="status" style="margin-left: 20px;width: 80%">
                                            <option value="" disabled selected hidden></option>
                                            <option value="1">ยังใช้งานอยู่</option>
                                            <option value="2">ตัดจำหน่าย</option>
                                            <option value="3">สูญหาย</option>
                                        </select>
                                    </td>
                                </tr>
                          </tbody>
                        </table>
                        <div class="col-md-12 form-group" style="margin-top: 20px;text-align: center;">
                            <a class="btn btn-info btn-lg" id="btnSearch" style="width: 200px" title="ค้นหาครุภัณฑ์" type="button"><span class="icon_search"></span> ค้นหา </a>
                        </div>
                        <fieldset>
                            <legend>รายการสินทรัพย์</legend>
                            <table  id="durable" class="table table-striped table-bordered" cellspacing="1" width="100%" style="font-size: 12.5px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ประเภทครุภัณฑ์</th>
                                        <th>ชื่อครุภัณฑ์</th>
                                        <th>วันที่นำเข้า</th>
                                        <th>จำนวน</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>ราคารวม</th>
                                        <th>เลขที่อ้างอิง</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>

                            </table>

                        </fieldset>
                    </form>&nbsp;
                </div>
            </section>
        </div>
    </div>  
    </section>
    
</section>
</section>
