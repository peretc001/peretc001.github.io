<?php	

require( '../wp-load.php' );
ini_set('memory_limit', '512M');
set_time_limit(20000);

setlocale(LC_ALL,"UTF-8");
mb_internal_encoding('UTF-8');

function mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}

$cat = get_terms('product_cat');	

var_dump($cat);

exit;

#$username = "startax";
#$database = "startax";
#$password = "jhgjhfghgdyrteytfi76392hgkjhg";
#$hostname = "localhost";

$username = "test.grvcp.lv";
$database = "test_grvcp_lv";
$password = "jgfhjgsdfjshdfwoeyrw";
$hostname = "localhost";

$dbhandle = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
$selected = mysql_select_db($database,$dbhandle)
  or die("Could not select ".$database);

mysql_query("SET character_set_client = 'utf8'");
mysql_query("SET NAMES 'utf8'");

echo "<pre>Import started\n";

$xmlfile = file_get_contents('php://input');
$ob= simplexml_load_string($xmlfile);
#$json  = json_encode($ob);
#$configData = json_decode($json, true);
if($ob){
  echo "XML loaded\n";
} else {
  echo "Error loading xml\n";
}

if(property_exists($ob,"item")){
foreach($ob->item as $item) {
	echo "item: ".$item->id."\n";
  $result = mysql_query("select  wp_postmeta.post_id id,
                                 wp_postmeta.meta_value mv,
                                 wp_posts.post_title title 
                         from wp_postmeta, wp_posts 
                         where wp_postmeta.meta_key = '_sku' and 
                                 wp_postmeta.meta_value = '".$item->id."' and
                                 wp_posts.id = wp_postmeta.post_id"
                        );
  if($row = mysql_fetch_array($result,MYSQL_ASSOC)){
  } else {
    print "Not found: ";
    print trim($item->id)."\t".trim($item->name)."\n";
    $result1 = mysql_query("insert into wp_posts (post_author,post_date,post_content,post_title,post_name,post_type,post_status) 
                                          values('batch',now(),'".addslashes($item->description)."',
                                                               '".addslashes($item->name)."',
                                                               '".addslashes($item->longname)."','product','draft')");
    echo mysql_error();
    $myid = mysql_insert_id();
    $result1 = mysql_query("insert into wp_postmeta (post_id,meta_key,meta_value) values (".$myid.",'_sku','".$item->id."')");
    echo mysql_error();
    $result = mysql_query("select  wp_postmeta.post_id id,
                                   wp_postmeta.meta_value mv,
                                   wp_posts.post_title title 
                           from wp_postmeta, wp_posts 
                           where wp_postmeta.meta_key = '_sku' and 
                                   wp_postmeta.meta_value = '".$item->id."' and
                                   wp_posts.id = wp_postmeta.post_id"
                          );
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
	}
  /* obnovljajem nazvanija i description */
  mysql_query("update wp_posts 
               set wp_posts.post_title = '".addslashes(str_replace("%20"," ",$item->name))."',
                   wp_posts.post_name = '',
                   wp_posts.post_content = '".addslashes($item->description)."'
               where wp_posts.id = ".trim($row["id"])."");
  echo mysql_error();

  /* obnovljajem kollichestvo na sklade */
  mysql_query("delete from wp_postmeta where wp_postmeta.meta_key in ('_stock','_manage_stock') and wp_postmeta.post_id = ".trim($row["id"])."");
  echo mysql_error();

  $result = mysql_query("insert into wp_postmeta (post_id,meta_key,meta_value) values (".$row["id"].",'_stock','".($item->qty)."')");
  echo mysql_error();
  $result = mysql_query("insert into wp_postmeta (post_id,meta_key,meta_value) values (".$row["id"].",'_manage_stock','yes')");
  echo mysql_error();

  /* perezapisivajem vse ceni */
  mysql_query("delete from wp_postmeta where wp_postmeta.meta_key like ('_price_%') and wp_postmeta.post_id = ".trim($row["id"])."");
  echo mysql_error();
  mysql_query("delete from wp_postmeta where wp_postmeta.meta_key in ('_price','_regular_price','_sale_price') and wp_postmeta.post_id = ".trim($row["id"])."");
  echo mysql_error();

  /* dobavljajem discount */
  $mprice = $item->discount;
  if($item->discount>0){
    $result1 = mysql_query("insert into wp_postmeta (post_id,meta_key,meta_value) values (".$row["id"].",'_sale_price','".($item->discount)."')");
    echo mysql_error();
	}

  /* obnovljajem ceni */
  foreach($item->prices as $price){
		foreach($price as $p){
			$attr = (string) $p->attributes()->type;
      if(!empty($attr)){
        $result1 = mysql_query("insert into wp_postmeta (post_id,meta_key,meta_value) values (".$row["id"].",'_price_".mysql_real_escape_string(trim($attr))."','".($p)."')");
        echo mysql_error();
        if($attr=="000000001"){
          if($mprice>$p&&$mprice>0){
						$mprice=$p;
					}
          $result1 = mysql_query("insert into wp_postmeta (post_id,meta_key,meta_value) values (".$row["id"].",'_price','".($mprice)."')");
          echo mysql_error();
          $result1 = mysql_query("insert into wp_postmeta (post_id,meta_key,meta_value) values (".$row["id"].",'_regular_price','".($p)."')");
          echo mysql_error();
				}
			}
		}
	}

  /* obnovljajem, kak pravilno SLUG */
  $arr = array(
		'include'				 => [$row["id"]],
    'order'          => 'ASC',
    'post_type'      => 'product',
    'post_status'    => null,
    'numberposts'    => -1,
  );

  $allposts = get_posts($arr);

  if ($allposts) {
    foreach ($allposts as $thepost) {
      $thepost->post_name = '';
      wp_update_post( $thepost );   // Update the post into the database
      echo $thepost->post_name;
    }
  }

}
}
if(property_exists($ob,"user")){
foreach($ob->user as $user) {
  $email = (string) $user->email;
  if (!empty($email)) {
		echo "user: ".$user->email."\n";

		$result = mysql_query("select wp_users.* from wp_users where LOWER(wp_users.user_email) = '".mysql_real_escape_string(strtolower($user->email))."'");
		echo mysql_error();
    if($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			echo "found user:\t".$row["user_login"]."\t".$user->name." \n";
      $result = mysql_query("update wp_users set wp_users.user_nicename = '".mysql_real_escape_string($user->name)."', wp_users.user_status = '".mysql_real_escape_string($user->status)."' where wp_users.ID = '".$row["ID"]."'");
  		echo mysql_error();
      $result = mysql_query("select count(*) CNT from wp_usermeta where wp_usermeta.user_id = '".$row["ID"]."' and wp_usermeta.meta_key = 'startax_pricecode'");
      if($row1 = mysql_fetch_array($result,MYSQL_ASSOC)){
				if($row1["CNT"]==0){
          $result = mysql_query("insert into wp_usermeta (user_id,meta_key) values ('".$row["ID"]."','startax_pricecode')");
      		echo mysql_error();
				}
        $result = mysql_query("update wp_usermeta set wp_usermeta.meta_value = '".mysql_real_escape_string((string)$user->pricecode)."' where wp_usermeta.user_id = '".$row["ID"]."' and wp_usermeta.meta_key = 'startax_pricecode'");
    		echo mysql_error();
			}
		} else {
			echo "email not found\n";
		};
	};
}
}

?>
	