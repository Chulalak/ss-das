<section id="main-content">
    <section class="wrapper">
      <!--===========================breadcrumb================================-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-book"></i> ลงทะเบียนครุภัณฑ์</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="Home">หน้าแรก</a></li>
                    <li><i class="fa fa-briefcase"></i><a href="Home">จัดการครุภัณฑ์</a></li>
                    <li><i class="fa fa-book"></i>ลงทะเบียนครุภัณฑ์</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       แบบฟอร์มลงทะเบียนครุภัณฑ์
                    </header>
                    <div class="panel-body">
                        
                        <form class="form-inline" method="post" id="addAssets">                            
                            <div class="container">
                                <div class="col-md-12 form-group" style="text-align: left;">
                                    <a class="btn btn-info btn-md" id="btnBack" type="button" href="javascript:window.history.go(-1);"><span><i class="fa fa-arrow-left"></i></span> กลับ </a>
                                    <button class="btn btn-success btn-md" id="btnSave"  type="submit"><span><i class="fa fa-floppy-o"></i></span> บันทึก </button>
                                </div>&nbsp;
                            </div>
                            <?php $no=1; if($rs != null ){foreach ($rs as $result){?>
                            <div class="form" style="margin-right: 0;margin-left: 0">
                                <input type="hidden" id="durableId" name="durableId" value="<?php echo $result['DurableId']?>"/>
                                <div class="container">
                                    <div class="col-lg-4 form-group">
                                        <label style="font-size:15px;"> เลขที่อ้างอิง </label>
                                        <input type="text" class="form-control input-md m-bot15" id="refNumber" />
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label style="font-size:15px;"> เลขที่อ้างอิงทางบัญชี <span class="required">*</span></label>
                                        <input type="text" class="form-control input-md m-bot15" id="refAccNumber" name="refAccNumber" value="<?php echo $result['ACC']?>" required="true"/>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label style="font-size:15px;"> วันที่รับเข้ามา <span class="required">*</span></label>
                                        <input type="text" class="date-picker form-control" id="deliveryDate" name="deliveryDate" value="<?php echo $result['DeliveryDate']?>" required="true"/>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-lg-12 form-group">
                                        <label style="font-size:15px;"> บริษัท <span class="required">*</span></label>
                                        <select class="form-control" id="company" name="company"  required="true">
                                            <?php
                                                foreach ($company as $row){
                                                    if($row['CMPCD'] == $result['company']){
                                                        echo '<option value="'.$row['CMPCD'].'" selected>'.$row['CMPLNAME'].'</option>';
                                                    }else{
                                                        echo '<option value="'.$row['CMPCD'].'" >'.$row['CMPLNAME'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>&nbsp;
                                </div>
                                <div class="container">
                                    <div class="col-lg-8 form-group">
                                        <label style="font-size:15px;">ประเภทครุภัณฑ์ <span class="required">*</span></label>
                                        <select class="form-control input-md m-bot15" id="catetory" name="catetory" required="true">
                                          <?php
                                            
                                            foreach ($category as $row){
                                                if($row['TBDCD'] == $result['DurableType']){
                                                        echo '<option value="'.$row['TBDCD'].'" selected>'.$row['TBDDESC'].'</option>';
                                                    }else{
                                                        echo '<option value="'.$row['TBDCD'].'">'.$row['TBDDESC'].'</option>';
                                                    }
                                                        
                                              
                                            }
                                          ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label style="font-size:15px;"> อัตราค่าเสื่อมราคา(%) <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="depRate" name="depRate" width="50%" value="<?php echo $result['DepRate']?>" required="true"/>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-lg-12 form-group">
                                        <label style="font-size:15px;"> ชื่อครุภัณฑ์ <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="assetName" name="assetName" value="<?php echo $result['DurableName']?>" required="true"/>
                                    </div>
                                </div>&nbsp;
                                <div class="container">
                                    <div class="col-md-3 form-group">
                                        <label style="font-size:15px;"> จำนวนที่รับ <span class="required">*</span></label>
                                        <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $result['Amount']?>" required="true" min="1"/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="font-size:15px;"> ราคาต่อหน่วย <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="unitprice" name="unitprice" value="<?php echo $result['UnitPrice']?>" onchange="setTwoNumberDecimal(this)" onblur="calculateTotal()" required="true" placeholder='0.00'/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="font-size:15px;"> ราคารวม <span class="required" >*</span></label>
                                        <input type="text" class="form-control" id="totalprice" name="totalprice" value="<?php echo $result['TotalPrice']?>" placeholder='0.00'/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="font-size:15px;"> ส่วนลด </label>
                                        <input type="text" class="form-control" id="discount" readonly="readonly"/>
                                    </div>
                                </div>
                            </div>
                            <?php $no++; } }else{ ?>
                            <div class="form" style="margin-right: 0;margin-left: 0">
                                <input type="hidden" id="durableId" name="durableId" value=""/>
                                <div class="container">
                                    <div class="col-lg-4 form-group">
                                        <label style="font-size:15px;"> เลขที่อ้างอิง </label>
                                        <input type="text" class="form-control input-md m-bot15" id="refNumber" />
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label style="font-size:15px;"> เลขที่อ้างอิงทางบัญชี <span class="required">*</span></label>
                                        <input type="text" class="form-control input-md m-bot15" id="refAccNumber" name="refAccNumber" value="" required="true"/>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label style="font-size:15px;"> วันที่รับเข้ามา <span class="required">*</span></label>
                                        <input type="text" class="date-picker form-control" id="deliveryDate" name="deliveryDate" required="true"/>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-lg-12 form-group">
                                        <label style="font-size:15px;"> บริษัท <span class="required">*</span></label>
                                        <select class="form-control" id="company" name="company" required="true">
                                            <?php
                                            $no=1;
                                            foreach ($company as $row){
                                              echo '<option value="" disabled selected hidden></option>';
                                              echo '<option value="'.$row['CMPCD'].'">'.$row['CMPLNAME'].'</option>';
                                              $no++;
                                            }
                                            ?>
                                        </select>
                                    </div>&nbsp;
                                </div>
                                <div class="container">
                                    <div class="col-lg-8 form-group">
                                        <label style="font-size:15px;">ประเภทครุภัณฑ์ <span class="required">*</span></label>
                                        <select class="form-control input-md m-bot15" id="catetory" name="catetory"  required="true">
                                          <?php
                                            $no=1;
                                            foreach ($category as $row){
                                              echo '<option value="" disabled selected hidden></option>';
                                              echo '<option value="'.$row['TBDCD'].'">'.$row['TBDDESC'].'</option>';
//                                              echo '<option ';
//                                                 if($row['TBDCD']== $result['DurableType']){
//                                                     echo 'selected="selected"';
//                                                 }
//                                                 echo '">'.$row['TBDDESC'].'</option>';
                                              $no++;
                                            }
                                          ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label style="font-size:15px;"> อัตราค่าเสื่อมราคา(%) <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="depRate" name="depRate" width="30%" value="20" required="true"/>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="col-lg-12 form-group">
                                        <label style="font-size:15px;"> ชื่อครุภัณฑ์ <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="assetName" name="assetName" required="true"/>
                                    </div>
                                </div>&nbsp;
                                <div class="container">
                                    <div class="col-md-3 form-group">
                                        <label style="font-size:15px;"> จำนวนที่รับ <span class="required">*</span></label>
                                        <input type="number" class="form-control" id="amount" name="amount" required="true" min="1"/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="font-size:15px;"> ราคาต่อหน่วย <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="unitprice" name="unitprice" onchange="setTwoNumberDecimal(this)" onblur="calculateTotal()" required="true" placeholder='0.00'/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="font-size:15px;"> ราคารวม <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="totalprice" name="totalprice" placeholder='0.00'/>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label style="font-size:15px;"> ส่วนลด </label>
                                        <input type="text" class="form-control" id="discount" readonly="readonly"/>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </form>&nbsp;
                    </div>
                </section>
            </div>
        </div>                 
    </section>       
</section>
</section>
