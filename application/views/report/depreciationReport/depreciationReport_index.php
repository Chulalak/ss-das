<section id="main-content">
  <section class="wrapper">
    <!--===========================breadcrumb================================-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file"></i> รายงานค่าเสื่อมราคา</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="Home">หน้าแรก</a></li>
          <li><i class="fa fa-file"></i>รายงาน</li>
          <li><i class="fa fa-file-text"></i>รายงานค่าเสื่อมราคา</li>
        </ol>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel" >
                <header class="panel-heading">
                    พิมพ์รายงานค่าเสื่อมราคา
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
                                        <input type="text" class="date-picker-year form-control" id="year" name="year" style="margin-left: 20px;width: 80%" required="true"/>                        
                                    </td>
                                </tr>
                          </tbody>
                        </table>
                        <div class="col-md-12 form-group" style="margin-top: 20px;text-align: center;">
                            <a class="btn btn-warning btn-lg" id="btnPrint" style="width: 200px" type="button"><i class="fa fa-print"></i> พิมพ์งาน </a>
                            
                        </div>
                    </form>&nbsp;
                </div>
            </section>
        </div>
    </div>  
    </section>
  
</section>
</section>

