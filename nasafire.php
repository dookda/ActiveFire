<?php
/* <!--
 * Name: Import Active Fire Data into PostGIS Database
 * Active Fire: https://earthdata.nasa.gov/earth-observation-data/near-real-time/firms/active-fire-data
 * GitHub: https://github.com/chingchai
 * Purpose: GIST@NU (www.cgistln.nu.ac.th)
 * Date: 2016/04/22
 * Author: Chingchai Humhong (chingchaih@nu.ac.th, chingchai.h@gmail.com)
 !--> */
//database connection details
header("content-type: text/html; charset=utf-8");
include "connect_fire.php";

// path where your CSV file is located
define('CSV_PATH','https://firms.modaps.eosdis.nasa.gov/active_fire/c6/text/');

// Name of your CSV file
$csv_file = CSV_PATH . "MODIS_C6_SouthEast_Asia_24h.csv";


if (($handle = fopen($csv_file, "r")) !== FALSE) {
   fgetcsv($handle);
   while (($data = fgetcsv($handle, 1000000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $col[$c] = $data[$c];
        }
		 $col1 = $col[0];
		 $col2 = $col[1];
		 $col3 = $col[2];
		 $col4 = $col[3];
		 $col5 = $col[4];
		 $col6 = $col[5];
		 $col7 = $col[6];
		 $col8 = $col[7];
		 $col9 = $col[8];
		 $col10 = $col[9];
		 $col11 = $col[10];
		 $col12 = $col[11];
		 $col13 = $col[12];

// PostgreSQL Query to insert data into DataBase
$query = "INSERT INTO sea_hotspot(latitude,longitude,brightness,scan,track,acq_date,acq_time,satellite,confidence,version,bright_t31,frp,daynight,geom)
		VALUES($col1,$col2,$col3,$col4,$col5,'$col6','$col7','$col8',$col9,'$col10',$col11,$col12,'$col13',ST_GeomFromText('POINT($col2  $col1)',4326))";
$s     = pg_query($query);
 }
    fclose($handle);
}

echo "File data successfully imported to database!!";

?>
