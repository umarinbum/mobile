
$('#modal').on('shown', function () {
    $("#modal-content").scrollTop(0);
});

var link =window.location.protocol+'//'+window.location.host+'/index.php/ajax/treatment_list';
var link2 = window.location.protocol+'//'+window.location.host+'/index.php/ajax/data_treatment';

$( "#search" ).autocomplete({
    source: function(request, response) {
        $.ajax({
            url: link2,
            dataType: "json",
            data: {
                txt : $("#search").val()
            },
            success: function(data) {
                response(data);
            }
        });
    },
    minLength: 2,
    open: function (data) {
        // If it's not already added
        if (!$('#ac-add-venue').length) {
            // Add it
            $('<li id="ac-add-venue" style=" background-color:#146aa7; font-family:supermarket; height: 40px; padding:  3px;" align="left"><img src="'+window.location.protocol+'//'+window.location.host+'/assets/img/magnifier.png"><a  data-toggle="modal" data-target="#myModal" href="'+link+'?txt='+$("#search").val()+'"><span style="font-size:18px; color:#ffffff; margin:100px;  font-family:supermarket;" >ค้นหาผลลัพธ์เพิ่มเติมสำหรับ</span></a></li>').appendTo('ul.ui-autocomplete');
        }
    },
    select: function (a, b) {
        $("#id_treatment").attr("value", b.item.data);

        doctorid(b.item.data);
    }
});


function trigger_text(id, text){
    $('#myModal').modal('hide'); 
    document.getElementById("search").value=text;

    $("#id_treatment").attr("value", id);

    doctorid(id);
}

//------------- search doctor ------------------//


function doctorid(id) {
    console.log(id);
    $.ajax({
        url: window.location.protocol+'//'+window.location.host+'/index.php/ajax/data_doctor',
        data:{"id":id},
        type:"post",
        success: function (data) {

            $('#doctor').empty();
            var data_array = '<option value="0">กรุณาเลือกแพทย์</option>';
            jQuery.each(JSON.parse(data), function (index, item) {
                data_array += '<option value=' + item.id_doctor + '>' + item.name_doctor + '</option>';
            });
            $('#doctor').append(data_array);
        }
    });
}
// $.ajax({
//     url: window.location.protocol+'//'+window.location.host+'/index.php/main/data_doctor',
//     success: function (data) {
//         //console.log(data);
//         var data_array = '';
//         jQuery.each(JSON.parse(data), function (index, item) {
//             //data_arry.push(item.name,item.id);
//             data_array += '<option value=' + item.id_doctor + '>' + item.name_doctor + '</option>';
//             //alert(item.edu_lvl_name,item.edu_lvl_id );
//         });
//         $('#doctor').append(data_array);
//     }
// });




$.fn.datepicker.dates['th'] = {
    days: ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์", "อาทิตย์"],
    daysShort: ["อา", "จ", "อ", "พ", "พฤ", "ศ", "ส", "อา"],
    daysMin: ["อา", "จ", "อ", "พ", "พฤ", "ศ", "ส", "อา"],
    months: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"],
    monthsShort: ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."],
    today: "วันนี้"
};

var nowDate = new Date();
var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), (nowDate.getDate()+3), 0, 0, 0, 0);
//Date picker
$('#datepicker').datepicker({
    minDate: 0,
    format: 'yyyy-mm-dd',
    startDate: today,
    language: 'th',
});
 
