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
<script src="//cdn.datatables.net/plug-ins/1.10.13/api/sum().js"></script>
<!-- javascript for Dialog -->
<script src="<?php echo base_url(); ?>assets/js/vdialog/lib/vdialog.js"></script>
<!--moment-->
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<!--accounting JS-->
<script src="<?php echo base_url(); ?>assets/js/accounting.min.js"></script>
<script type="text/javascript">
  
    /******* *set datepicker format year only* ********/

    
    //XXX When click save button
//    $('#btnPrint').click(function(e) {
//         if(checkRequiredCriteria()){  
//            // send ajax to controller CalDepreciation method calculate
//            $.ajax({
//                "url": "<?php echo base_url(); ?>" + "DepreciationReport/printReport",
//                "type": 'POST',
//                "dataType": 'json',
//                "data": {
//                    "company": $('#company').val(),
//                    "cate": $('#catetory').val(),
//                    "month": $('#month').val(),
//                    "year": $('#year').val()
//                },
//                "success": function(response){
//                    vdialog.success("พิมพ์งานสำเร็จ.");
//                }
//            });
//        }
//    });
    
    //** ************* Validation **************** **//
    function checkRequiredCriteria(){
        var result = true;
        var company_code = $('#company').val();
        var cate_code = $('#catetory').val();
        var month = $('#month').val();
        var year = $('#year').val();
        
        if(company_code=== 'undefined' || company_code === '' || company_code === null ||company_code.length <= 0 &&
           cate_code=== 'undefined' || cate_code === '' || cate_code === null ||cate_code.length <= 0 &&
           month=== 'undefined' || month === '' || month === null ||month.length <= 0 &&
           year=== 'undefined' || year === '' || year === null ||year.length <= 0){
       
            result = false;
            vdialog.alert('กรุณาใส่ข้อมูลให้ครบ.');
          
        }
        return result;
    }
</script>
</body>
</html>
