    <!-- javascripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
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
    <script src="<?php echo base_url(); ?>assets/DataTables/media/js/jquery.dataTables.js"></script>
    <!-- javascript for Dialog -->
    <script src="<?php echo base_url(); ?>assets/js/vdialog/lib/vdialog.js"></script>
    <!--Table editable-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.tabledit.js"></script>
    <!--accounting JS-->
    <script src="<?php echo base_url(); ?>assets/js/accounting.min.js"></script>
    
    <script type="text/javascript">
        //XXX Set date from and date to
        $(function() {
            /* global setting */
            var datepickersOpt = {
                changeYear: true,
                changeMonth: true,
                showButtonPanel: true,
                dateFormat: 'yy-mm-dd'
            };
            
            $("#deliveryDateFrom").datepicker($.extend({
                onSelect: function() {
                    var minDate = $(this).datepicker('getDate');
                    minDate.setDate(minDate.getDate());
                    $("#deliveryDateTo").datepicker( "option", "minDate", minDate);
                }
            },datepickersOpt));

           $("#deliveryDateTo").datepicker($.extend({
               onSelect: function() {
                   var maxDate = $(this).datepicker('getDate');
                   maxDate.setDate(maxDate.getDate());
                   $("#deliveryDateFrom").datepicker( "option", "maxDate", maxDate);
               }
           },datepickersOpt));
        }); 


        var table = $('#durable').DataTable({
            "responsive": true,
            "bLengthChange": false,
            "bFilter": false,
            "pageLength": 10,
            "bAutoWidth": false,
            "aoColumnDefs": [
                { bSortable: true,"sClass":"alignCenter", "sWidth": "", "aTargets": [0] },
                { bSortable: true,"sClass":"alignCenter", "sWidth": "10%", "aTargets": [1] },
                { bSortable: true,"sClass":"alignLeft", "sWidth": "20%", "aTargets": [2] },
                { bSortable: true,"sClass":"alignCenter", "sWidth": "", "aTargets": [3] },
                { bSortable: true,"sClass":"alignCenter", "sWidth": "", "aTargets": [4] },
                { bSortable: true,"sClass":"alignRight", "sWidth": "", "aTargets": [5] },
                { bSortable: true,"sClass":"alignRight", "sWidth": "", "aTargets": [6] },
                { bSortable: true,"sClass":"alignLeft", "sWidth": "", "aTargets": [7] },
                { bSortable: true,"sClass":"alignCenter", "sWidth": "", "aTargets": [8] },
                { bSortable: true,"sClass":"alignCenter", "sWidth": "15%", "aTargets": [9] }
            ]
        });


    //XXX When click search button
    $('#btnSearch').click(function(e) {
        if(checkRequiredCriteria()){
            var company_code = $('#company').val();
            var cate_code = $('#catetory').val();
            var dateFrom = $('#deliveryDateFrom').val();
            var dateTo = $('#deliveryDateTo').val();
            var status = $('#status').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "FindAssets/search",
                dataType: 'json',
                data: { company: company_code, 
                        cate: cate_code, 
                        dateFrom: dateFrom,
                        dateTo: dateTo,
                        status: status},
                success: function(res) {
                    var count = Object.keys(res).length;                  
                    if(count > 0){                    
                        table.clear();
                        $.each(res, function(i, item){
                            var manage = '<button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;" onclick="doView('+item.DurableId+')"><span class="glyphicon glyphicon-pencil"></span></button>'+
                                         '<button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;" onclick="deleteData('+item.DurableId+')"><span class="glyphicon glyphicon-trash"></span></button>';
                            var status = '';
                            table.row.add([item.DurableId,item.DurableType,item.DurableName,item.DeliveryDate,item.Amount,format(item.UnitPrice),
                                       format(item.TotalPrice),item.ACC,status,manage]);
                            table.draw();
                        });
                    }else{
                        vdialog.alert('ไม่มีข้อมูลแสดง.');
                    }
                }
            });
        }
    });

      //** ************* Validation **************** **//
    function checkRequiredCriteria(){
        var result = true;
        var company_code = $('#company').val();

        if(company_code=== 'undefined' || company_code === '' || company_code === null ||company_code.length <= 0){
          result = false;
          vdialog.alert('กรุณาใส่ข้อมูลให้ครบ.');
        }
        return result;
    }
    
    function format(number) {
       return  accounting.formatMoney(number, { 
                format: "%v"
                });
    }
    
    function deleteData(id){
        vdialog.confirm('ต้องการลบข้อมูลนี้หรือไม่?', function(){           
            $.ajax({
                "url": "<?php echo base_url(); ?>" + "FindAssets/deleteData",
                "type": 'POST', 
                "data": {
                    "id": id
                },
                "success": function(res){    
                    console.log(res);
                    vdialog.success('ลบข้อมูลเรียบร้อยแล้ว.');  
                },
                "error": function(err){
                    vdialog.alert('พบข้อผิดพลาดบางประการ กรุณาติดต่อผู้ดูแลระบบ.' + err);
                }
            });
        });      
    }
    
    function doView(id){
        window.location.href = "<?php echo base_url(); ?>" + "AddAssets/editData?id="+id;
    }
    </script>
  </body>
</html>
