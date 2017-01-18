<section id="main-content">
  <section class="wrapper">
    <!--===========================breadcrumb================================-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><span class="icon_calulator"></span> คำนวณค่าเสื่อมราคา</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="Home">หน้าแรก</a></li>
          <li><span class="icon_calulator"></span>คำนวณค่าเสื่อมราคา</li>
        </ol>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-12 form-group" style="text-align: left;">
                <a class="btn btn-info btn-md" id="btnBack"  type="button" href="javascript:window.history.go(-1);"><span><i class="fa fa-arrow-left"></i></span> กลับ </a>
                <a class="btn btn-success btn-md" id="btnSave"  type="button"><span><i class="fa fa-floppy-o"></i></span> บันทึก </a>
            </div>
            <section class="panel" >
                <header class="panel-heading">
                    คำนวณค่าเสื่อมราคา
                </header>
                <div class="panel-body">  
                    <form class="form-inline" method="post" id="register_form" style="font-size: 15px;padding-left: 20px">
                        <table style="margin-left: 20px" >
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
                                    <td width="125" style="text-align: right"> &nbsp;ประเภทครุภัณฑ์ <span class="required">*</span></td>
                                    <td width="400">
                                        <select class="form-control input-md m-bot15" id="catetory" name="catetory" style="margin-left: 20px;width: 80%" required="true">
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
                                    <td width="125" style="text-align: right">&nbsp;เดือน <span class="required">*</span></td>
                                    <td width="400">
                                        <select class="form-control input-md m-bot15" id="month" name="month" style="margin-left: 20px;width: 80%" required="true">
                                            <?php
                                            $no=1;
                                              foreach ($month as $row){
                                                echo '<option value="" disabled selected hidden></option>';
                                                echo '<option value="'.$row['TBDCD'].'">'.$row['TBDDESC'].'</option>';
                                                $no++;
                                              }
                                            ?>
                                        </select>
                                    </td>
                                    <td width="125" style="text-align: right"> &nbsp;ปีงบประมาณ <span class="required">*</span></td>
                                    <td width="400">
                                        <input type="text" class="form-control" id="year" name="year" style="margin-left: 20px;width: 80%" required="true"/>                        
                                    </td>
                                </tr>
                          </tbody>
                        </table>
                        <div class="col-md-12 form-group" style="margin-top: 20px;text-align: center;">
                            <a class="btn btn-info btn-lg" id="btnSearch" style="width: 200px" title="ค้นหาค่าเสื่อมราคา" type="button"><span class="icon_search"></span> ค้นหา </a>
                            <a class="btn btn-success btn-lg" id="btnCal" style="width: 200px; margin-left:20px;" title="คำนวณค่าเสื่อมราคา" type="button"><span class="icon_calulator"></span> คำนวณ </a>
                        </div>
                        <fieldset>
                            <legend>รายการสินทรัพย์</legend>
                            <table  id="calDept" class="display compact select cell-border" cellspacing="1" width="100%" style="font-size: 12.5px">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>ชื่อครุภัณฑ์</th>
                                  <th>จำนวน</th>
                                  <th>วันเดือนปีที่ได้มา</th>
                                  <th>สินทรัพย์ยกมาจากปีก่อน(ราคาทุน)</th>
                                  <th>อัตราค่าเสื่อม</th>
                                  <th>BVยกมา</th>
                                  <th>จำนวนเดือนใช้สินทรัพย์จากปีก่อน</th>
                                  <th>จำนวนเดือนใช้สินทรัพย์ปีปัจจุบัน</th>
                                  <th>จำนวนเดือนใช้สินทรัพย์สิ้นสุดปีปัจจุบัน</th>
                                  <th>ACC-DEPจากปีก่อน</th>
                                  <th>DEPต่อเดือน</th>
                                  <th>ACC-DEPปีปัจจุบัน</th>
                                  <th>ACC-DEPสิ้นสุดปีปัจจุบัน</th>
                                  <th>BVปีปัจจุบัน</th>
                                </tr>
                              </thead>
                              <tfoot style="background-color: #71B225;color: black;">
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td width="3px"></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td border-bottom: 2px></td>
                                </tr>
                              </tfoot>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend></legend>
                        <div class="container col-md-6 form-group">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>ค่าเสื่อมราคารวมต่อเดือน</td>
                                        <td><input type="text" id="allDepPerMonth" class="form-control" style="margin-left: 5px"></td>
                                        <td></td>
                                        <td><input type="hidden" id="hdrId" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </fieldset>
                    </form>&nbsp;
                </div>
            </section>
        </div>
    </div>  
    </section>
  
</section>
</section>
