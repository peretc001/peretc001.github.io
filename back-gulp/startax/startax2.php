<?php	

require( '../wp-load.php' );
ini_set('memory_limit', '512M');
set_time_limit(20000);
#error_reporting(E_ALL ^ E_WARNING);

setlocale(LC_ALL,"UTF-8");
mb_internal_encoding('UTF-8');

function echo_b($str) {
	echo $str;
	error_log($str);
}

function mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}

$username = "startax";
$database = "startax";
$password = "jhgjhfghgdyrteytfi76392hgkjhg";
$hostname = "localhost";

#$username = "test.grvcp.lv";
#$database = "test_grvcp_lv";
#$password = "jgfhjgsdfjshdfwoeyrw";
#$hostname = "localhost";

$link = mysqli_connect($hostname, $username, $password, $database)
  or die("Unable to connect to MySQL");

mysqli_query($link,"SET character_set_client = 'utf8'");
mysqli_query($link,"SET NAMES 'utf8'");

  $result = mysqli_query($link,"select  wp_postmeta.post_id id,
                                 wp_postmeta.meta_value mv,
                                 wp_posts.post_title title 
                         from wp_postmeta, wp_posts 
                         where wp_postmeta.meta_key = '_sku' and 
                                 wp_posts.id = wp_postmeta.post_id"
                        );
  while($row = mysqli_fetch_array($result)){
    $post_id = $row["id"];
		print $post_id."-".$row["mv"]."\n";
    file_put_contents("tmp/".$row["mv"].".jpg", file_get_contents("http://www.startax.net/thumb.php?imgname=".$row["mv"]));
  } 

?>
	