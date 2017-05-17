<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common {

	/**** Format Thai Date  ****/
    function thai_date($date, $format)
    {
    	$arry_full_date = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    	$arry_short_date = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."); 

    	$explo = explode('-', $date);
    	switch ($format) {

		   	case 'full':
		   		return $explo[2]." ".($arry_full_date[intval($explo[1])-1])." ".(intval($explo[0])+543);
		        break;

		   	case 'short':
		        return $explo[2]." ".($arry_short_date[intval($explo[1])-1])." ".(intval($explo[0])+543);
		        break;
		}
    }

    /***************** Set Date Week ******************/
    function thai_date_week($date, $format){
        $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
        $thai_month_arr=array("","ม.ค.","ก.พ.","มี.ค.","เม.ย","พ.ค.","ม.ย","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $date = strtotime($date);
        $thai_date_return=" ".$thai_day_arr[date("w",$date)];
        $thai_date_return.= " ".date("j",$date);
        $thai_date_return.=" ".$thai_month_arr[date("n",$date)];
        $thai_date_return.= " ".(date("Yํ",$date)+543);
        $thai_date_return.= "  ".date("H:i",$date)." น.";

        switch ($format) {
            case 'full':
                return $thai_date_return;
                break;
            case 'no_time':
                return $thai_day_arr[date("w",$date)]." ". date("j",$date)." ".$thai_month_arr[date("n",$date)]." ". (date("Yํ",$date)+543);
                break;
            case 'day':
                return $thai_day_arr[date("w",$date)];
                break;
        }
    }


    function random_num($length, $chars='0123456789') {
        $string = '';
        for($i = 0; $i <= $length-1; $i++) {
            $string .= $chars[rand(0,strlen($chars)-1)];
        }
        return $string;
    }




    /******************************* Tools Functions ********************************/
    function merge_array_same_doctor($result)
    {
        $arry = array();

        foreach( $result as $row ){

            $start_time = substr($row['allot_start_time'],0,-3);
            $end_time = substr($row['allot_end_time'],0,-3);

            if( !isset($arry[$row['id_doctor']]) ){

                $arry[$row['id_doctor']][$start_time] = array(
                    'id_doctor_allotment'    => $row['id_doctor_allotment'],
                    'id_clinic'         => $row['id_clinic'],
                    'id_doctor'         => $row['id_doctor'],
                    'allot_date'        => $row['allot_date'],
                    'allot_start_time'  => $start_time,
                    'allot_end_time'    => $end_time,
                    'allot_limit'       => $row['allot_limit'],
                    'allot_use'         => $row['allot_use'],
                    'name_clinic'       => $row['name_clinic'],
                    'status'            => $row['status'],
                    'name_doctor'       => $row['name_doctor'],
                    'img_doctor'       => $row['img_doctor'],
                    'distance_time'     => $this->distance_time_value($start_time, $end_time),
                );

            }else{

                $arry[$row['id_doctor']][$start_time]['id_doctor_allotment'] = $row['id_doctor_allotment'];
                $arry[$row['id_doctor']][$start_time]['id_clinic'] = $row['id_clinic'];
                $arry[$row['id_doctor']][$start_time]['id_doctor'] = $row['id_doctor'];
                $arry[$row['id_doctor']][$start_time]['allot_date'] = $row['allot_date'];
                $arry[$row['id_doctor']][$start_time]['allot_start_time'] = $start_time;
                $arry[$row['id_doctor']][$start_time]['allot_end_time'] = $end_time;
                $arry[$row['id_doctor']][$start_time]['allot_limit'] = $row['allot_limit'];
                $arry[$row['id_doctor']][$start_time]['allot_use'] = $row['allot_use'];
                $arry[$row['id_doctor']][$start_time]['name_clinic'] = $row['name_clinic'];
                $arry[$row['id_doctor']][$start_time]['status'] = $row['status'];
                $arry[$row['id_doctor']][$start_time]['name_doctor'] = $row['name_doctor'];
                $arry[$row['id_doctor']][$start_time]['img_doctor'] = $row['img_doctor'];
                $arry[$row['id_doctor']][$start_time]['distance_time'] = $this->distance_time_value($start_time, $end_time);
            }
        }

        return $arry;
    }

    function distance_time_value( $start_time, $end_time )
    {
        $str_start_time = strtotime($start_time);
        $str_end_time = strtotime($end_time);

        $run = 0;
        while ($str_start_time <= $str_end_time) {
            $str_start_time = strtotime('+30 minutes', $str_start_time);

            $run++;
        }

        return $run;
    }

    function gen_appointment_code($last_code){

        $explode = explode("-", $last_code);
        $last_code_year = substr($explode[0], 3, 2);
        $current_year = substr(intval(date('Y'))+543, 2, 2);

        if( $last_code != NULL ){

            if( $last_code_year == $current_year ){
                $year = $last_code_year;
                $code = str_pad(intval($explode[1])+1, 7, "0", STR_PAD_LEFT);
            }else{
                $year = intval($last_code_year)+1;
                $code = "0000001";
            }
        }else{
            $year = $current_year;
            $code = "0000001";
        }

        return "อ".$year."-".$code;
    }
}


