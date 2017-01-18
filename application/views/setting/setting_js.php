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
<!-- javascript for DataTables -->
<script src="<?php echo base_url(); ?>assets/DataTables/media/js/jquery.dataTables.js" type="text/javascript" ></script>
<!-- javascript for Dialog -->
<script src="<?php echo base_url(); ?>assets/js/vdialog/lib/vdialog.js"></script>
<!--moment-->
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<!--Table editable-->
<script src="<?php echo base_url(); ?>assets/js/jquery.tabledit.js"></script>
<script>
    $(document).ready(function() {
        //XXX Setting company table
        $('#company').Tabledit({
            url: '<?php echo base_url(); ?>Setting',
            columns: {
                identifier: [1, 'code'],
                editable: [[2, 'companyName'], [3, 'address'], [4, 'companyTel'],[5, 'companyFax']]
            },
            onAjax: function(action, serialize) {
                window.location.reload;
           }
        });
        
        //XXX Setiing category table
        $('#category').Tabledit({
            url: '<?php echo base_url(); ?>Setting',
            columns: {
                identifier: [2, 'TBDCD'],
                editable: [[1, 'TBDNO'],[3, 'TBDDESC']]
            }
        });
    });
    
    $('#btnAddCompany').click(function(e) {
        var code = $('#companyCode').val();
        var companyName = $('#companyName').val();
        var address = $('#address').val();
        var companyTel = $('#companyTel').val();
        var companyFax = $('#companyFax').val();

        $.ajax({
            method: 'post',
            data: {code:code, companyName:companyName, address:address, companyTel:companyTel, companyFax:companyFax},
            url: '<?php echo base_url(); ?>Setting/addCompany',
            success: function(res){
              location.reload();
            }
        });
    });
    
    $('#btnAddCategory').click(function(e) {
        var categoryDesc = $('#categoryDesc').val();
        var categoryCode = $('#categoryCode').val();
        
        if(categoryCode=== 'undefined' || categoryCode === '' || categoryCode === null ||categoryCode.length <= 0 &&
           categoryDesc=== 'undefined' || categoryDesc === '' || categoryDesc === null ||categoryDesc.length <= 0)  {
            vdialog.alert("กรุณาใส่ข้อมูลให้ครบ.");
        } else {
                $.ajax({
                method: 'post',
                data: {categoryDesc:categoryDesc,categoryCode:categoryCode},
                url: '<?php echo base_url(); ?>Setting/addCategory',
                success: function(res){
                  location.reload();
                }
            });
        }  

    });
</script>
</body>
</html>


