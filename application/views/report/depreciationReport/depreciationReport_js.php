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
    $(function() {
        $('.date-picker-year').datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy',
            onClose: function(dateText, inst) { 
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 1));
            }
        });
        $(".date-picker-year").focus(function () {
                $(".ui-datepicker-month").hide();
        });
    });
    
    //XXX When click save button
    $('#btnPrint').click(function(e) {
         if(checkRequiredCriteria()){  
            // send ajax to controller CalDepreciation method calculate
            $.ajax({
                "url": "<?php echo base_url(); ?>" + "DepreciationReport/printReport",
                "type": 'POST',
                "dataType": 'json',
                "data": {
                    "company": $('#company').val(),
                    "cate": $('#catetory').val(),
                    "month": $('#month').val(),
                    "year": $('#year').val()
                },
                "success": function(response){
//                    // check length of response from ajax
//                    var count = Object.keys(response).length;                  
//                    if(count > 0){
//                        table.clear();                    // clear data before add to table
//                        $.each(response, function(i, item){
//                            var CurrentMonth = '<input type="text" id="curMonth" class="form-control" value="'+item.CurrentMonth+'" style="text-align: center;"readonly="readonly">';
//                            var AllMonths = '<input type="text" id="allMonth" class="form-control" value="'+item.AllMonths+'" style="text-align: center;">';
//                            var CurrentDepAcc = '<input type="text" id="curDepAcc" class="form-control" value="'+format(item.CurrentDepAcc)+'" style="text-align: right;">';
//                            table.row.add([item.ID,item.Name,item.Amount,item.DeliveryDate,format(item.Cost),
//                                       item.DepRate,format(item.LastBV),item.LastMonths,CurrentMonth,AllMonths,
//                                       format(item.LastDepAcc), format(item.depPerMonth),CurrentDepAcc,format(item.DepAccAll),format(item.DepBVCurrent)]);
//                            table.draw();
//                        });
//                        // set value into text field to find all depreciation of month 
//                        getAllDep();
//                    }else{
//                        vdialog.alert('ไม่มีข้อมูลแสดง กรุณาตรวจสอบข้อมูล.');
//                    }
                }
            });
        }
    });
    
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
