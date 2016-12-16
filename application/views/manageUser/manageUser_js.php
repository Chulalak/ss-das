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
        $('#user').Tabledit({
            url: '<?php echo base_url(); ?>ManageUser',
            columns: {
                identifier: [1,'ID'],
                editable: [[2, 'username'], [3, 'fname'], [4, 'lname'],[5, 'role','{"1": "admin", "2": "accountant", "3": "other"}']]
            }
        });

    });
    
    function edit($id){
        $.ajax({
            "url": "<?php echo base_url(); ?>" + "ManageUser/getData",
            "type": 'POST', 
            "data": {
                "id": $id
            }
        });
    }
    
    function deleteUser(id){
        vdialog.confirm('ต้องการลบผู้ใช้งานนี้หรือไม่', function(){           
            $.ajax({
                "url": "<?php echo base_url(); ?>" + "ManageUser/deleteUser?id="+id,
                "type": 'POST', 
                "data": {
                    "id": id
                },
                "success": function(res){    
                    console.log(res);
                    if(res == 1){ 
                        vdialog.success('ลบผู้ใช้งานแล้ว.', function(){
                            window.location.reload();
                        });
                    }
                },"error": function(err){
                        vdialog.alert('ไม่สามารถลบผู้ใช้งานได้ กรุณาติดต่อผู้ดูแลระบบ.');                   
                }
            });
        });      
    }
</script>
</body>
</html>


