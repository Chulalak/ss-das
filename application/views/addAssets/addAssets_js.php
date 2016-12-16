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
    <!-- javascript for Dialog -->
    <script src="<?php echo base_url(); ?>assets/js/vdialog/lib/vdialog.js"></script>
    <!-- javascript for validate form -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <!--moment-->
    <script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
    <!--accounting JS-->
    <script src="<?php echo base_url(); ?>assets/js/accounting.min.js"></script>
    <script>
        var id = $('#durableId').val();
        $( document ).ready(function() {       
            if(id != ""){
                document.getElementById('refNumber').readOnly = true;
            }
        });
        
        $( function() {
            $(".date-picker").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd/mm/yy',
                maxDate: 0               
            });
        });
 
        
        function calculateTotal(){
            //XXX calculate total price          
            var amount = document.getElementById('amount').value; 
            var unitprice = document.getElementById('unitprice').value; 
            var total = amount * unitprice;
            total.value = parseFloat(this.value).toFixed(2);
            document.getElementById('totalprice').value = total;
            
            
            $('#totalprice').change(function(){
                //XXX calculate discount
                var totalprice = document.getElementById('totalprice').value;
                document.getElementById('discount').value = totalprice-total;
            });
       
        };
        
        function setTwoNumberDecimal(event){
             this.value = parseFloat(this.value).toFixed(2);
        }
    jQuery(function($) {     
        //XXX validation
        $('#addAssets').validate({    
            rules: {
                refAccNumber: {
                    required: true
                },
                deliveryDate: {
                    required: true
                },
                company: {
                    required: true
                },
                catetory: {
                    required: true
                },
                depRate: {
                    required: true,
                    number: true
                },
                assetName: {
                    required: true
                },
                amount: {
                    required: true,
                    number: true
                },
                unitprice: {
                    required: true,
                    number: true
                    
                },
                totalprice: {
                    required: true,
                    number: true
                    
                }
            },
            messages: {
                refAccNumber: {
                        required: "กรุณากรอกเลขอ้างอิงทางบัญชี"
                },
                deliveryDate: {
                        required: "กรุณาเลือกวันที่รับเข้ามา"
                },
                company: {
                        required: "กรุณาเลือกบริษัท"
                },
                catetory: {
                        required: "กรุณาเลือกประเภท"
                },
                depRate: {
                        required: "กรุณากรอกอัตราค่าเสื่อม",
                        number: "กรุณากรอกเฉพาะตัวเลข"
                },
                assetName: {
                        required: "กรุณากรอกชื่อครุภัณฑ์"
                },
                amount: {
                        required: "กรุณากรอกจำนวนที่รับมา",
                        number: "กรุณากรอกเฉพาะตัวเลข"
                },
                unitprice: {
                        required: "กรุณากรอกราคาของครุภัณฑ์",
                        number: "กรุณากรอกเฉพาะตัวเลข (0.00)"
                        
                },
                totalprice: {
                        required: "กรุณากรอกราคารวม",
                        number: "กรุณากรอกเฉพาะตัวเลข (0.00)"
                }
            },
            submitHandler: function(form) {
                var dataString  = 'refAccNumber=' + $("#refAccNumber").val();
                    dataString += '&assetName=' + $("#assetName").val();
                    dataString += '&deliveryDate=' + moment($("#deliveryDate").val(),'DD-MM-YYYY').format('YYYY-MM-DD');
                    dataString += '&company=' + $("#company").val();
                    dataString += '&catetory=' + $("#catetory").val();
                    dataString += '&depRate=' + $("#depRate").val();
                    dataString += '&amount=' + $("#amount").val();
                    dataString += '&unitprice=' + $("#unitprice").val();
                    dataString += '&totalprice=' + $("#totalprice").val();
                    console.log(dataString);
                if(id!=""){
                    $.ajax({
                        type	: "POST",
                        url 	: "<?php echo base_url(); ?>AddAssets/updateData",
                        data 	: dataString + '&id='+id,
                        success	: function(res){
                            console.log(res);
                            if(res==="fail"){
                                vdialog.error('มีข้อมูลอยู่แล้ว.');
                            }else if(res=="1"){
                                vdialog.success('บันทึกข้อมูลเรียบร้อยแล้ว.');
                            }
                        }
                    });
                }else{
                    $.ajax({
                        type	: "POST",
                        url 	: "<?php echo base_url(); ?>AddAssets/addData",
                        data 	: dataString,
                        success	: function(res){
                            console.log(res);
                            if(res==="fail"){
                                vdialog.error('มีข้อมูลอยู่แล้ว.');
                            }else if(res=="1"){
                                vdialog.success('บันทึกข้อมูลเรียบร้อยแล้ว.');
                            }
                        }
                    });
                }    
            }
        });
    });    
    </script>

    </body>
</html>

