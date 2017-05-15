
var appointment_cover_width = $(".appointment_cover_table").width();
var cover_table1_width = $(".cover_table1").width();
$(".cover_table2").css("width", ((appointment_cover_width-cover_table1_width)-17)+"px");

$(window).resize(function(){
	appointment_cover_width = $(".appointment_cover_table").width();
	cover_table1_width = $(".cover_table1").width();
	$(".cover_table2").css("width", ((appointment_cover_width-cover_table1_width)-17)+"px");
});

// Create And Add into Table
var tb = "<div class='cover_head' style='z-index:15; width:1151px;'>";
tb += "<div style='display:inline-block; width:20%;'>";

tb += "<table class='table table-bordered tb_head1' style='border-right:none;'><thead>";
tb += "<tr style='background:#f0efeb;'><th style='height:45px; border-right:none;'>"+$("#table1 th:eq(0)").text()+"</th></tr>";
tb += "<tr style='background:#fff;'><th style='height:45px; border-top:none; text-align:center;'>เวลา</th></tr>";
tb += "</thead></table>";


tb += "</div><div class='cover_inner_head2'>";
tb += "<table class='table table-bordered' style='border-left:none; overflow:hidden; width:"+$("#table2").width()+"px;'><thead>";
tb += "<tr style='background:#f0efeb;'><th colspan=24 style='border-left:none;'></th></tr><tr style='background:#fff;'>";
for( var i=0; i<24; i++ ){
	tb += "<th style='width:"+($("#table2 thead tr:eq(1) th:eq("+i+")").width()+17)+"px;'>"+$("#table2 thead tr:eq(1) th:eq("+i+")").text()+"</th>";
}

tb += '</tr></thead></table></div></div>';
$(".appointment_cover_table").append(tb);


// When Scroll-Y In Table
$(".appointment_cover_table").scroll(function(){
	var distance_top = $(".appointment_cover_table").scrollTop();
	var appointment_cover_table_height = $(".appointment_cover_table").height();

	// ทำให้สูงขึ้นตามที่ scroll ลงมา
	$(".cover_table2").css("height", (appointment_cover_table_height+distance_top)+"px");
	// ทำให้ head table  slide ตาม scroll
	$(".cover_head").css("top", distance_top+"px");
});
// When Scroll-X In Table
$(".cover_table2").scroll(function(){
	$(".cover_inner_head2 table").css("marginLeft", "-"+$(".cover_table2").scrollLeft()+"px");
});





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

$("#calendar_btn").datepicker({
    minDate: 0,
	format: 'dd/mm/yyyy',
	startDate: today,
	language: 'th',
}).on("changeDate", function (e) {
    window.location.href = window.location.protocol+'//'+window.location.host+'/index.php/doctor/doctor_allotment/?search='+getAllUrlParams().search+'&id_treatment='+getAllUrlParams().id_treatment+'&doctor='+getAllUrlParams().doctor+'&front_date='+e.date.getFullYear()+'-'+("0"+(e.date.getMonth()+1)).slice(-2)+'-'+("0"+(e.date.getDate())).slice(-2);
});




function getAllUrlParams(url) {
  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
  var obj = {};
  if (queryString) {
    queryString = queryString.split('#')[0];
    var arr = queryString.split('&');
    for (var i=0; i<arr.length; i++) {
      var a = arr[i].split('=');
      var paramNum = undefined;
      var paramName = a[0].replace(/\[\d*\]/, function(v) {
        paramNum = v.slice(1,-1);
        return '';
      });
      var paramValue = typeof(a[1])==='undefined' ? true : a[1];
      paramName = paramName.toLowerCase();
      paramValue = paramValue.toLowerCase();
      if (obj[paramName]) {
        if (typeof obj[paramName] === 'string') {
          obj[paramName] = [obj[paramName]];
        }
        if (typeof paramNum === 'undefined') {
          obj[paramName].push(paramValue);
        }
        else {
          obj[paramName][paramNum] = paramValue;
        }
      }
      else {
        obj[paramName] = paramValue;
      }
    }
  }
  return obj;
}

