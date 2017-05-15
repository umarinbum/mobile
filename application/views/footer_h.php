<div class="container-fluid bck_blue foot_bar">
    <h4 class="text-center mar0">โทรสายด่วน 1723</h4>
</div>

</div> <!-- Start Main Frame -->

<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

<?php
if( isset($js_template) ){
    foreach( $js_template as $row ){
        echo "<script src='".base_url().$row."'></script>"."\n";
    }
}
?>

<script type="text/javascript">

    <?php
    if(isset($session_login)){
    if( $session_login == false ){
    ?>

    $("#myModal").modal();

    <?php
    }
    }
    ?>

</script>


</body>
</html>