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
    function thai_date_week($date){
        $thai_day_arr=array("อา.","จ.","อ.","พ.","พฤ.","ศ.","ส.");
        $thai_month_arr=array("","ม.ค.","ก.พ.","มี.ค.","เม.ย","พ.ค.","ม.ย","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $date = strtotime($date);
        $thai_date_return=" ".$thai_day_arr[date("w",$date)];
        $thai_date_return.= " ".date("j",$date);
        $thai_date_return.=" ".$thai_month_arr[date("n",$date)];
        $thai_date_return.= " ".(date("Yํ",$date)+543);
        $thai_date_return.= "  ".date("H:i",$date)." น.";
        return $thai_date_return;
    }





    /******************************* Tools Functions ********************************/
    function merge_array_same_doctor($result)
    {
        $arry = array();

        foreach( $result as $row ){

            $start_time = substr($row['allot_time_start'],0,-3);
            $end_time = substr($row['allot_time_end'],0,-3);

            if( !isset($arry[$row['id_doctor']]) ){

                $arry[$row['id_doctor']][$start_time] = array(
                    'id_appointment'    => $row['id_appointment'],
                    'id_admin'          => $row['id_admin'],
                    'id_doctor'         => $row['id_doctor'],
                    'allot_date'        => $row['allot_date'],
                    'allot_time_start'  => $start_time,
                    'allot_time_end'    => $end_time,
                    'name_doctor'       => $row['name_doctor'],
                    'status'            => $row['status'],
                    'username_yhh_app'  => $row['username_yhh_app'],
                    'distance_time'     => $this->distance_time_value($start_time, $end_time),
                );

            }else{

                $arry[$row['id_doctor']][$start_time]['id_appointment'] = $row['id_appointment'];
                $arry[$row['id_doctor']][$start_time]['id_admin'] = $row['id_admin'];
                $arry[$row['id_doctor']][$start_time]['id_doctor'] = $row['id_doctor'];
                $arry[$row['id_doctor']][$start_time]['allot_date'] = $row['allot_date'];
                $arry[$row['id_doctor']][$start_time]['allot_time_start'] = $start_time;
                $arry[$row['id_doctor']][$start_time]['allot_time_end'] = $end_time;
                $arry[$row['id_doctor']][$start_time]['name_doctor'] = $row['name_doctor'];
                $arry[$row['id_doctor']][$start_time]['status'] = $row['status'];
                $arry[$row['id_doctor']][$start_time]['username_yhh_app'] = $row['username_yhh_app'];
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
}


