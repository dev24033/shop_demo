
<script src="<?php echo base_url(); ?>assets/admin/js/jquery-3.3.1.js"></script> 
<script src="<?php echo base_url(); ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js" ></script>


<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>


	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/admin/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/admin/js/dataTables.responsive.min.js"></script>

<!--
<script src="<?php echo base_url('socket/node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script> 
-->
 

<script >
$(document).ready(function() {
    $('#example').DataTable();
} );


$(document).ready(function() {
        $('.onlypriceinput').keypress(function (event) {
            return isNumber(event, this)
        });
});

function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
            return false;

        return true;
}  
	
</script>