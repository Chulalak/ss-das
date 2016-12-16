<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="">
                    <i class="icon_house_alt"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-briefcase fa-2x"></i>
                    <span>จัดการครุภัณฑ์</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?php echo base_url(); ?>FindAssets">ค้นหาครุภัณฑ์</a></li>
                    <li><a class="" href="<?php echo base_url(); ?>AddAssets">ลงทะเบียนครุภัณฑ์</a></li>
                </ul>
            </li>
            <li>
                <a class="" href="<?php echo base_url(); ?>CalDepreciation">
                    <i class="fa fa-usd fa-2x"></i>
                    <span>คำนวณค่าเสื่อมราคา</span>
                </a>
            </li>
            <li>
                <a class="" href="http://www.softsquaregroup.com/tsr/show_bug.cgi?id=13044">
                    <i class="fa fa-wrench fa-2x"></i>
                    <span>แจ้งซ่อม</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>รายงาน</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="">รายงานข้อมูลครุภัณฑ์</a></li>
                    <li><a class="" href="<?php echo base_url(); ?>DepreciationReport">รายงานค่าเสื่อมราคา</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-cog fa-2x"></i>
                    <span>ตั้งค่า</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?php echo base_url(); ?>ManageUser">จัดการผู้ใช้</a></li>
                    <li><a class="" href="<?php echo base_url(); ?>Setting">จัดการทั่วไป</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
