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
    var hdrId = $('#hdrId').val()
    //XXX Jquery for sum function in Datatable 
    /* Ex. 
     *      var t = $('#table').DataTable();
     *      t.column( 1 ).data().sum();
     */
    jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
	return this.flatten().reduce( function ( a, b ) {
		if ( typeof a === 'string' ) {
			a = a.replace(/[^\d.-]/g, '') * 1;
		}
		if ( typeof b === 'string' ) {
			b = b.replace(/[^\d.-]/g, '') * 1;
		}

		return a + b;
	}, 0 );
    });
    
    /*** * Function for get sum value in column and set value in textfield * ***/
    
    function getAllDep(){
        var t = $('#calDept').DataTable();
        var result = t.column( 11 ).data().sum();
            $("#allDepPerMonth").val(format(result));
            $("#allDepPerMonth").css("background-color", "yellow");
            $("#allDepPerMonth").css("font-weight", "bold");
            $("#allDepPerMonth").css("color", "black");
//            console.log(result);
    }
    
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
    
    /********** *Global variable for datatable* *********/
    var table = $('#calDept').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bFilter": false,
        "pageLength": 10,
        "bAutoWidth": false,
        "aoColumnDefs": [
            { bSortable: true,"sClass":"center", "sWidth": "", "aTargets": [0] },
            { bSortable: true,"sClass":"center", "sWidth": "20%", "aTargets": [1] },
            { bSortable: true,"sClass":"alignCenter", "sWidth": "", "aTargets": [2] },
            { bSortable: true,"sClass":"alignCenter", "sWidth": "", "aTargets": [3] },
            { bSortable: true,"sClass":"alignRight", "sWidth": "7%", "aTargets": [4] },
            { bSortable: true,"sClass":"alignCenter", "sWidth": "", "aTargets": [5] },
            { bSortable: true,"sClass":"alignRight", "sWidth": "6%", "aTargets": [6] },
            { bSortable: true,"sClass":"alignCenter", "sWidth": "5px", "aTargets": [7] },
            { bSortable: true,"sClass":"alignCenter", "sWidth": "5px", "aTargets": [8] },
            { bSortable: true,"sClass":"alignCenter", "sWidth": "5px", "aTargets": [9] },
            { bSortable: true,"sClass":"alignRight", "sWidth": "", "aTargets": [10] },
            { bSortable: true,"sClass":"alignRight", "sWidth": "", "aTargets": [11] },
            { bSortable: true,"sClass":"alignRight", "sWidth": "", "aTargets": [12] },
            { bSortable: true,"sClass":"alignRight", "sWidth": "", "aTargets": [13] },
            { bSortable: true,"sClass":"alignRight", "sWidth": "", "aTargets": [14] }
        ],
        "footerCallback": function ( row, data, start, end, display ) {
//            var data = $('#calDept').DataTable.$('input, select').serialize();
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            function number_format(x) {
                var num = Number(x).toFixed(2);
                var string = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                
                return string;
            };

            //XXX ราคาทุนรวม
            total = api.column( 4 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            $( api.column( 4 ).footer() ).html(number_format(total));
            
            //XXX BV ยกมา
            total = api.column( 6 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            $( api.column( 6 ).footer() ).html(number_format(total));
           
            
            //XXX BV ยกมา
            total = api.column( 10 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            $( api.column( 10 ).footer() ).html(number_format(total));
            
            //XXX BV ยกมา
            total = api.column( 11 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            $( api.column( 11 ).footer() ).html(number_format(total));
            
            //XXX BV ยกมา
            total = api.column( 12 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            $( api.column( 12 ).footer() ).html(number_format(total));
            
            //XXX BV ยกมา
            total = api.column( 13 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            $( api.column( 13 ).footer() ).html(number_format(total));
            
            //XXX BV ยกมา
            total = api.column( 14 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
            }, 0 );
            $( api.column( 14 ).footer() ).html(number_format(total));
        }
    });
        
    
    //XXX When click search button
    $('#btnSearch').click(function(e) {
        // validate criteria
        if(checkRequiredCriteria()){  
            // send ajax to controller CalDepreciation method search
            $.ajax({
                "url": "<?php echo base_url(); ?>" + "CalDepreciation/search",
                "type": 'POST',
                "dataType": 'json',
                "cache": false,
                "data": {
                    "company": $('#company').val(),
                    "cate": $('#catetory').val(),
                    "month": $('#month').val(),
                    "year": $('#year').val()
                },
                "success": function(response){
                    // check length of response from ajax
                    var count = Object.keys(response).length;                  
                    if(count > 0){
                        table.clear();                  // clear data before add to table
                        $.each(response, function(i, item){
                            $('#hdrId').val(item.DPHHDR);
                            $("#allDepPerMonth").val(format(item.DPHSUMDEP));
                            $("#allDepPerMonth").css("background-color", "yellow");
                            $("#allDepPerMonth").css("font-weight", "bold");
                            $("#allDepPerMonth").css("color", "black");
                            table.row.add([item.DRAID,item.DRANAME,item.DRAAMT,item.DEPDAT,format(item.DEPLASTCST),
                                       item.DRADEPRT,format(item.DEPLASTBV),item.DEPLASTMNT,item.DEPCURMNT,item.DEPALLMNT,
                                       format(item.DEPACCDEPLAST), format(item.DEPDEPPERMNT),format(item.DEPACCDEPCUR),format(item.DEPACCDEPALL),format(item.DEPBVCUR)]);
                            table.draw();                           
                        });   
                    }else{
                        vdialog.alert('ไม่มีข้อมูลแสดง กรุณาตรวจสอบข้อมูล.');
                    }
                }
            });

           }   
    });
  
    //XXX When click calculate button
    $('#btnCal').click(function(e) {
        if(checkRequiredCriteria()){  
            // send ajax to controller CalDepreciation method calculate
            $.ajax({
                "url": "<?php echo base_url(); ?>" + "CalDepreciation/calculate",
                "type": 'POST',
                "dataType": 'json',
                "data": {
                    "company": $('#company').val(),
                    "cate": $('#catetory').val(),
                    "month": $('#month').val(),
                    "year": $('#year').val()
                },
                "success": function(response){
                    // check length of response from ajax
                    var count = Object.keys(response).length;                  
                    if(count > 0){
                        table.clear();                    // clear data before add to table
                        $.each(response, function(i, item){
                            var CurrentMonth = '<input type="text" id="curMonth" class="form-control" value="'+item.CurrentMonth+'" style="text-align: center;"readonly="readonly">';
                            table.row.add([ item.ID,item.Name,item.Amount,item.DeliveryDate,format(item.Cost),
                                            item.DepRate,format(item.LastBV),item.LastMonths,CurrentMonth,item.AllMonths,
                                            format(item.LastDepAcc), format(item.depPerMonth),format(item.CurrentDepAcc),format(item.DepAccAll),format(item.DepBVCurrent)]);
                            table.draw();
                        });
                        // set value into text field to find all depreciation of month 
                        getAllDep();
                    }else{
                        vdialog.alert('ไม่มีข้อมูลแสดง กรุณาตรวจสอบข้อมูล.');
                    }
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
  
    //** *************** fotmat number use accounting js ***************** **//
    function format(value){
        return  accounting.formatMoney(value, { 
                format: "%v"
                });
    }
    
    //XXX When click save button
    $('#btnSave').click(function(e) {
        var size = table.data().length;
//        console.log(size);
        var param = "{ \"data\": [";
        table.data().each( function ( value, index ) {
            var month       = $('#month').val();
            var year        = $('#year').val();
            var id          = value[0];
            var name        = value[1].replace("\"","\\\"");
            var amount      =  value[2];
            var date        = moment(value[3],'DD-MM-YYYY').format('YYYY-MM-DD');
            var cost        = (value[4]).replace(",","");
            var rate        = value[5];
            var lastBV      = (value[6]).replace(",","");
            var lastMonth   = value[7];
            var curMonth    = getValueInputTag(value[8]);
            var allMonth    = value[9];
            var lastAccDep  = (value[10]).replace(",","");
            var dep         = (value[11]).replace(",","");
            var curAccDep   = (value[12]).replace(",","");
            var allAccDep   = (value[13]).replace(",","");
            var curBV       = (value[14]).replace(",","");
            var  str  = "";
            if (index >= 0 && index <= size-2){
                str  =   '{"month" : "'+month+'","year" : "'+year+'","id" : "'+id+'","name" : "'+name+'","amount" : "'+amount+'","date" : "'+date+'","cost" : "'+cost+'","rate" : "'+rate+'","lastBV" : "'+lastBV+'","lastMonth" : "'+lastMonth+'","curMonth" : "'+curMonth+'","allMonth" : "'+allMonth+'","dep" : "'+dep+'","curAccDep" : "'+curAccDep+'","allAccDep" : "'+allAccDep+'","curBV" : "'+curBV+'","lastAccDep" : "'+lastAccDep+'"'+' },';                         
            }else{
                 str  =  '{"month" : "'+month+'","year" : "'+year+'","id" : "'+id+'","name" : "'+name+'","amount" : "'+amount+'","date" : "'+date+'","cost" : "'+cost+'","rate" : "'+rate+'","lastBV" : "'+lastBV+'","lastMonth" : "'+lastMonth+'","curMonth" : "'+curMonth+'","allMonth" : "'+allMonth+'","dep" : "'+dep+'","curAccDep" : "'+curAccDep+'","allAccDep" : "'+allAccDep+'","curBV" : "'+curBV+'","lastAccDep" : "'+lastAccDep+'"'+' }] }';
            }
            
             param = param + str;       
        });  
//        console.log(param);
        if(hdrId == ""){
            $.ajax({
                url: "<?php echo base_url(); ?>" + "CalDepreciation/prepareSave",
                type: 'POST',
                dataType: 'json',
                data: {
                    //XX parameter of prepare save for check duplicate.
                    "company": $('#company').val(),
                    "cate": $('#catetory').val(),
                    "month": $('#month').val(),
                    "year": $('#year').val(),
                    "sumDep": $('#allDepPerMonth').val().replace(",","")
                },
                "success": function(response){
                    // check length of response from ajax
                    var count = Object.keys(response).length; 
    //                console.log(count);
                    if(count == 1){
                        $.ajax({
                            url: "<?php echo base_url(); ?>" + "CalDepreciation/save",
                            type: 'POST',
                            dataType: 'json',
                            data: param,
                            "success": function(response){
                                if(response == "1"){
                                    vdialog.success('บันทึกเรียบร้อยแล้ว.',function(event){
                                        window.location.reload;
                                    });
                                }
                            }
                        });
                    }else{
                        vdialog.alert('คำนวณข้อมูลของเดือนนี้แล้ว กรุณาเลือกเดือนใหม่ หรือค้นหาข้อมูลได้จากปุ่มค้นหา.');
                    }
                }
            });
        }else{
            $.ajax({
                url: "<?php echo base_url(); ?>" + "CalDepreciation/updateSum",
                type: 'POST',
                dataType: 'json',
                data: {
                    "hdrId"  : hdrId,
                    "sumDep" : $("#allDepPerMonth").val().replace(",","")
                },
                "success": function(response){
                    if(response == "1"){
                        vdialog.success('อัพเดตเรียบร้อยแล้ว.',function(event){
                            window.location.reload;
                        });
                    }
                },"error" : function(err){
                    vdialog.error("พบข้อผิดพลาดบางประการ กรุณาติดต่อผู้ดูแลระบบ.");
                }
            });
        }      
    });
    
    /********* *function for get value in input tag using substring* ***********/
    function getValueInputTag(str){
        var n = str.search('value="');
        var res = str.substring(n+7);
        n = res.search('"');
        res = res.substring(0,n);
        
        return res;
    }
    
    
</script>
</body>
</html>
