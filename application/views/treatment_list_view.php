<style>
    .e
    {
        border-bottom:1px solid #D1D0CE;
        text-align:left;
        padding: 15px;
        height: 50px;
    }
    .e:hover{
        background-color:#d6eefe;
    }

</style>
<div class="col-md-12 col-xs-12" style="font-family: 'supermarket'; background: #fafbfa;" >
    <button type="button" class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
    <div class="col-xs-12 ">
        <div class="row">
            <div class="col-xs-12" >
                <form class="box_group" method="post" action="<?php echo site_url('/main/treatment_list');?>" >
                    <div class="col-xs-12 row" style="background-color: #F4F5F5  ; width: 105.7%; margin-left: -15px;" >
                        <div class="col-md-2" style="margin: 8px;"><br/><span class="title_content">หัตถการ</span></div>
                        <div class="col-md-9"><br/>
                            <input type="text" placeholder="Search" id="sample_search"  name="sample_search"  style="font-family:supermarket;"><div class="inline_input"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></div>
                            <div class="col-md-1" align="right"></div>
                        <div class="title_header mar0"></div>
                    </div>
                    <div class="col-md-12" id="target" style="height: 450px; padding-left: 0px; overflow: scroll; overflow-x:hidden;"><br>
                        <div align="right" id="doctor_all"><span style="font-size: 16px; color:#148de0;">ผลการค้นหา <?php echo sizeof($treatment_all)?>รายการ</span></div>
                        <?php
                        foreach ($treatment_all as $row) { ?>
                            <div class="col-md-12 e">
                                <a href="javascript:trigger_text(<?php echo $row['id_treatment']; ?>, '<?php echo $row['name_treatment']; ?>')">
                                    <div class="col-md-5">
                                        <span style="font-size: 18px;"><?php echo $row['name_treatment'];?></span>
                                    </div>
                                    <div class="col-md-2" align="center">
                                        <img src="<?php echo base_url('assets/img/arrow-right.png');?>">
                                    </div>
                                    <div class="col-md-5">
                                        <span style="font-size: 18px;"><?php echo $row['name_clinic'];?></span>
                                    </div>
                                </a>
                            </div>

                         <?php } ?>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
//    var searchRequest = null;
    $('#sample_search').keyup(function(){
        var that = this,
                value = $(this).val();
        var minlength = 2;
        if (value.length >= minlength ) {
            $.ajax({
                type: "POST",
                url: window.location.protocol + '//' + window.location.host + '/index.php/ajax/treatment_search',
                data: {'txt': value},
                success: function (data) {
                    console.log(JSON.parse(data).length);
                    console.log(JSON.parse(data));

                    var length_data = JSON.parse(data).length;
                    var data_array ='<div align="right" id="doctor_all"><span style="font-size: 16px; color:#148de0;">ผลการค้นหา '+length_data+' รายการ</span></div>';
                    jQuery.each(JSON.parse(data),function (index, item) {
                            data_array += '<div class="col-md-12 e">';

                        var name_treatment ="'"+item.name_treatment+"'";

                        data_array += '<a href="javascript:trigger_text('+item.id_treatment+','+name_treatment+')">';
                            data_array += '<div class="col-md-5">';
                                data_array += '<span style="font-size: 18px;">'+item.name_treatment+'</span>';
                            data_array += '</div>';
                            data_array += '<div class="col-md-2" align="center">';
                                data_array += '<img src="'+ window.location.protocol + '//' + window.location.host + '/assets/img/arrow-right.png'+'">';
                            data_array += '</div>';
                            data_array += '<div class="col-md-5">';
                                data_array += '<span style="font-size: 18px;">'+item.name_clinic+'</span> ';
                            data_array += '</div> ';
                        data_array += '</a> ';
                    data_array += '</div> ';
                           });
            $('#target').html(data_array);
                },
                select: function (a, b) {
                    $("#id_treatment").attr("value", b.item.data);

                    doctorid(b.item.data);
                }
            });
        }
    });

function trigger_text(id, text){
    $('#myModal').modal('hide');
    document.getElementById("search").value=text;

    $("#id_treatment").attr("value", id);

    doctorid(id);
}
</script>

