<?php
if(!function_exists('level_help')){
	function level_help($params){

		if($params == 1){
			$res = 'administrator';
		}else if($params != 1){
			$res = 'member';
		  
		}

		return $res;
	}


if (!function_exists('tanggalan')) {

    function tanggalan($tanggal) {
        $getyear = substr($tanggal, 0, 4);
        $getmonth = substr($tanggal, 5, 2);
        $getdate = substr($tanggal, 8, 2);

        switch ($getmonth) {
            case "01":
                $bulan = "Januari";
                break;

            case "02":
                $bulan = "Februari";
                break;

            case "03":
                $bulan = "Maret";
                break;

            case "04":
                $bulan = "April";
                break;

            case "05":
                $bulan = "Mei";
                break;

            case "06":
                $bulan = "Juni";
                break;

            case "07":
                $bulan = "Juli";
                break;

            case "08":
                $bulan = "Agustus";
                break;

            case "09":
                $bulan = "September";
                break;

            case "10":
                $bulan = "Oktober";
                break;

            case "11":
                $bulan = "November";
                break;

            case "12":
                $bulan = "Desember";
                break;

            default:
                $bulan = "Bulan tidak diketahui";
                break;
        }

        $hasil = $getdate . ' ' . $bulan . ' ' . $getyear;

        return $hasil;
    }

}
if(!function_exists('limit_to_numwords')){
    function limit_to_numwords($string, $numwords) {
        $excerpt = explode(' ', $string, $numwords + 1);
        if (count($excerpt) >= $numwords) {
            array_pop($excerpt);
        }
        $excerpt = implode(' ', $excerpt);
        return $excerpt;
    }
}

 

if(!function_exists('e')){
    function e($string) {
        return htmlentities($string);
    }
}

}
?>
