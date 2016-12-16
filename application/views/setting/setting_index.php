<section id="main-content">
    <section class="wrapper">
      <!--===========================breadcrumb================================-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-cogs"></i> จัดการทั่วไป</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="Home">หน้าแรก</a></li>
                    <li><i class="fa fa-cog"></i><a href="Home">ตั้งค่า</a></li>
                    <li><i class="fa fa-cogs"></i>จัดการทั่วไป</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       บริษัท
                    </header>
                    <div class="panel-body">   
                        <div class="col-md-12 form-group">
                            <a class="btn btn-danger btn-md" type="button" data-toggle="modal" data-target="#addCompany"><span><i class="fa fa-plus"></i></span> เพิ่ม </a>
                        </div>
                        <table  id="company" class="table table-striped table-bordered" cellspacing="1" width="100%">
                            <thead text-align='center'>
                              <tr>
                                <th width="1%">ลำดับ</th>
                                <th>รหัส</th>
                                <th>ชื่อบริษัท</th>
                                <th>ที่อยู่</th>
                                <th>เบอร์โทร</th>
                                <th>Fax</th>
                                <th>ใช้งาน</th>
                                
                              </tr>                              
                            </thead>
                            <tbody>
                                    <?php
                                    $i=1;
                                      foreach ($company as $row){
                                        echo '<tr>';
                                            echo '<td>'.$i.'</td>';
                                            echo '<td>'.$row['code'].'</td>';
                                            echo '<td>'.$row['companyName'].'</td>';
                                            echo '<td>'.$row['address'].'</td>';
                                            echo '<td>'.$row['companyTel'].'</td>';
                                            echo '<td>'.$row['companyFax'].'</td>';
                                            echo '<td><input name="enable" class="form-control" style="width:100%;margin:0;" type="checkbox" checked></td>'; 
                                    echo '</tr>';
                                    $i++;
                                    }
                                  ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="panel">
                    <header class="panel-heading">
                       หมวดหมู่
                    </header>
                    <div class="panel-body">   
                        <div class="col-md-12 form-group">
                            <a class="btn btn-danger btn-md" type="button" data-toggle="modal" data-target="#addCategory"><span><i class="fa fa-plus"></i></span> เพิ่ม </a>
                        </div>
                        <table  id="category" class="table table-striped table-bordered" cellspacing="1" width="100%">
                            <thead text-align='center'>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th style="display: none;">หมายเลขตาราง</th>
                                    <th>รหัส</th>
                                    <th>ชื่อหมวดหมู่</th>
                                    <th>ใช้งาน</th>                                
                                </tr>                              
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                  foreach ($category as $row){
                                    echo '<tr>';
                                        echo '<td width="2px">'.$no.'</td>';
                                        echo '<td style="display: none;" width="2px">'.$row['TBDNO'].'</td>';
                                        echo '<td>'.$row['TBDCD'].'</td>';
                                        echo '<td>'.$row['TBDDESC'].'</td>';
                                        echo '<td><input name="enable" class="form-control" style="width:100%;margin:0;" type="checkbox" checked></td>'; 
                                    echo '</tr>';
                                $no++;
                                }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </section> 
                <!-- Modal of Company Information -->
                <div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="myModalCompany">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalCompany">ข้อมูลบริษัท</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="prod_name">รหัสบริษัท</label>
                                        <input type="text" class="form-control" id="companyCode">
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_name">ชื่อบริษัท</label>
                                        <input type="text" class="form-control" id="companyName">
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_desc">ที่อยู่บริษัท</label>
                                        <textarea id="address" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_price">เบอร์โทรติดต่อ</label>
                                        <input type="tel" class="form-control" id="companyTel">
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_price_promotion">Fax</label>
                                        <input type="text" class="form-control" id="companyFax">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button id="btnAddCompany" type="button" class="btn btn-primary">เพิ่ม</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal of Category Information -->
                <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalCategory">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalCategory">ข้อมูลประเภทครุภัณฑ์</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="prod_name">รหัสครุภัณฑ์</label>
                                        <input type="text" class="form-control" id="categoryCode">
                                    </div> 
                                    <div class="form-group">
                                        <label for="prod_name">ประเภทครุภัณฑ์</label>
                                        <input type="text" class="form-control" id="categoryDesc">
                                    </div>                                   
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button id="btnAddCategory" type="button" class="btn btn-primary">เพิ่ม</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                 
    </section>         
</section>
</section>

