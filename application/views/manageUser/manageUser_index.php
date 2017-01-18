<section id="main-content">
    <section class="wrapper">
      <!--===========================breadcrumb================================-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user"></i> ตั้งค่าผู้ใช้</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="Home">หน้าแรก</a></li>
                    <li><i class="fa fa-cog"></i><a href="Home">ตั้งค่า</a></li>
                    <li><i class="fa fa-user"></i>ตั้งค่าผู้ใช้</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       ตั้งค่าผู้ใช้งาน
                    </header>
                    <div class="panel-body">   
                        <div class="col-md-12 form-group">
                            <a class="btn btn-info btn-md" id="btnBack"  type="button" href="javascript:window.history.go(-1);"><span><i class="fa fa-arrow-left"></i></span> กลับ </a>
                            <a class="btn btn-danger btn-md" id="btnAdd"  type="button" href="ManageUser/addUserPage"><span><i class="fa fa-plus"></i></span> เพิ่มผู้ใช้งาน </a>
                        </div>&nbsp;
                        <table  id="user" class="table table-striped table-bordered" cellspacing="1" width="100%">
                            <thead text-align='center'>
                              <tr>
                                <th>ลำดับ</th>
                                <th style="display:none;">ID</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>สถานะผู้ใช้งาน</th>
                                </tr>                              
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                  foreach ($rs as $row){
                                    echo "<tr>";
                                        echo "<td width='1%'>".$no."</td>";
                                        echo "<td style=\"display:none;\" >".$row['ID']."</td>";
                                        echo "<td width='20%'>".$row['username']."</td>";
                                        echo "<td width='20%'>".$row['fname']."</td>";
                                        echo "<td width='20%'>".$row['lname']."</td>";
                                        echo "<td width='10%'>".$row['role']."</td>";
                                    echo '</tr>';
                                    $no++;
                                  }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>                 
    </section>
        
</section>
</section>
