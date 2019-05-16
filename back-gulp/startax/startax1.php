<?php	

require( '../wp-load.php' );
ini_set('memory_limit', '512M');
set_time_limit(20000);
#error_reporting(E_ALL ^ E_WARNING);

setlocale(LC_ALL,"UTF-8");
mb_internal_encoding('UTF-8');

function Generate_Featured_Image( $image_url, $post_id  ){
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = basename($image_url);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
}

function echo_b($str) {
	echo $str;
	error_log($str);
}

function mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}

$username = "srv157453_r0lexx";
$database = "srv157453_startaks";
$password = "htmlr0lexx";
$hostname = "mysql-157453.srv.hoster.ru";

// $username = "startax";
// $database = "startax";
// $password = "jhgjhfghgdyrteytfi76392hgkjhg";
// $hostname = "localhost";

#$username = "test.grvcp.lv";
#$database = "test_grvcp_lv";
#$password = "jgfhjgsdfjshdfwoeyrw";
#$hostname = "localhost";

$link = mysqli_connect($hostname, $username, $password, $database)
  or die("Unable to connect to MySQL");
#$selected = mysqli_select_db($database,$dbhandle)
#  or die("Could not select ".$database);

mysqli_query($link,"SET character_set_client = 'utf8'");
mysqli_query($link,"SET NAMES 'utf8'");

echo_b("\nImport started\n");
echo_b("Got content length: ".$_SERVER['CONTENT_LENGTH']."\n");

#$xmlfile = file_get_contents('php://input');
$xmlfile = file_get_contents('tmp/import.xml');
#file_put_contents("tmp/import.xml",$xmlfile);
#unlink("tmp/import.xml");
$ob= simplexml_load_string($xmlfile);
#$json  = json_encode($ob);
#$configData = json_decode($json, true);
if($ob){
  echo_b( "XML loaded\n");
} else {
  echo_b( "Error loading xml\n");
	http_response_code(500);
}

/*
$pid = pcntl_fork();
if ($pid == -1) {
     die('could not fork');
} else if ($pid) {
    //     pcntl_wait($status); //Protect against Zombie children
    posix_kill(getmypid(),9);
}
*/

if(property_exists($ob,"item")){
foreach($ob->item as $item) {
#  if($item->id!='01-1012') {
#		continue;
#  }
	echo_b( "item: ".$item->id."\n");
  
  $result = mysqli_query($link,"select  wp_postmeta.post_id id,
                                 wp_postmeta.meta_value mv,
                                 wp_posts.post_title title 
                         from wp_postmeta, wp_posts 
                         where wp_postmeta.meta_key = '_sku' and 
                                 wp_postmeta.meta_value = '".$item->id."' and
                                 wp_posts.id = wp_postmeta.post_id"
                        );
  if($row = mysqli_fetch_array($result)){
    $post_id = $row["id"];
		print $post_id."\n";
  } else {
    print "Not found: ";
    print trim($item->id)."\t".trim($item->name)."\n";

    $post_id = wp_insert_post( array(
    	'post_title' => (string) ($item->name),
    	'post_name' => (string) ($item->longname),
    	'post_content' => (string) ($item->description),
    	'post_status' => 'publish',
    	'post_type' => "product",
    ));
		wp_set_object_terms( $post_id, 'simple', 'product_type' );
    update_post_meta( $post_id, '_sku', (string) ($item->id));
	}

/*
  if(!has_post_thumbnail($post_id)){
		echo "generate image\n";
		file_put_contents("tmp/".(string) ($item->id).".jpg", file_get_contents("http://www.startax.net/thumb.php?imgname=".(string) ($item->id)));
		if(filesize("tmp/".(string) ($item->id).".jpg")!=1550){
			Generate_Featured_Image("tmp/".(string)($item->id).".jpg", $post_id);
		} else {
      unlink("tmp/".(string) ($item->id).".jpg");
			echo "no image\n";
		}
	}
*/
  $arr = array(
		'include'				 => [$post_id],
    'post_type'      => 'product',
  );

  $allposts = get_posts($arr);
  if ($allposts) {
    foreach ($allposts as $thepost) {
      $thepost->post_name = '';
      $thepost->post_title = (string) ($item->name);
			$thepost->post_name = (string) ($item->longname);
			if((string) ($item->description) != ""){
      	$thepost->post_content = (string) ($item->description);
			}
      wp_update_post( $thepost );   // Update the post into the database
    }
  }

  /* perezapisivajem vse ceni */
  mysqli_query($link,"delete from wp_postmeta where wp_postmeta.meta_key like ('_price_%') and wp_postmeta.post_id = ".trim($post_id)."");
  echo_b( mysqli_error($link));
  mysqli_query($link,"delete from wp_postmeta where wp_postmeta.meta_key in ('_price','_regular_price','_sale_price') and wp_postmeta.post_id = ".trim($post_id)."");
  echo_b( mysqli_error($link));

	update_post_meta( $post_id, '_stock_status', (string)$item->stock == '1' ? 'instock' : 'onbackorder');
	update_post_meta( $post_id, 'total_sales', '0' );
	update_post_meta( $post_id, '_downloadable', 'no' );
	update_post_meta( $post_id, '_virtual', 'yes' );
	update_post_meta( $post_id, '_regular_price', '' );
	update_post_meta( $post_id, '_sale_price', '' );
	update_post_meta( $post_id, '_purchase_note', '' );
	update_post_meta( $post_id, '_featured', 'no' );
	update_post_meta( $post_id, '_weight', '' );
	update_post_meta( $post_id, '_length', '' );
	update_post_meta( $post_id, '_width', '' );
	update_post_meta( $post_id, '_height', '' );
	update_post_meta( $post_id, '_product_attributes', array() );
	update_post_meta( $post_id, '_sale_price_dates_from', '' );
	update_post_meta( $post_id, '_sale_price_dates_to', '' );
	update_post_meta( $post_id, '_price', '' );
	update_post_meta( $post_id, '_sold_individually', '' );
	update_post_meta( $post_id, '_backorders', 'yes' );
	update_post_meta( $post_id, '_manage_stock', 'yes' );
	//update_post_meta( $post_id, '_stock', '0');
	update_post_meta( $post_id, '_stock', (string)($item->qty));

	/* dobavljajem discount */
	$mprice = $item->discount;
	if($item->discount>0){
		update_post_meta( $post_id, '_sale_price', (string)($item->discount));
	}
	/* update price if has sale position */
	$startax_sale = $item->sale;
	if($item->sale == 'yes'){
		foreach($item->prices as $price){
			foreach($price as $p){
				update_post_meta( $post_id, '_startax_sale_price', (string)($p));
				echo_b($p);
			}
		}
	}
	/* obnov	ljajem ceni */
	foreach($item->prices as $price){
		foreach($price as $p){
			$attr = (string) $p->attributes()->type;
			if(!empty($attr)){
				update_post_meta( $post_id, '_price_'.mysqli_real_escape_string($link,trim($attr)), (string)($p));
				if($attr=="000000004"){
					if($mprice>$p||$mprice==0){
						$mprice=$p;
					}
					update_post_meta( $post_id, '_price', (string)($mprice));
					update_post_meta( $post_id, '_regular_price', (string)($p));
				}else if($attr=="000000006"){
					update_post_meta( $post_id, '_sale_price', (string)($p));
				}
			}
		}
	}

  /* kategorii produktov */
  /* sperva ubirajem starije */
  //var_dump($item->categories[0]->category[0]->attributes()->id);
	$term = term_exists(htmlentities($item->categories[0]->category[0]->attributes()->name),"product_cat");
	if($term===0||$term===null){
		$term = wp_insert_term(
    htmlentities($item->categories[0]->category[0]->attributes()->name),
    'product_cat',
    array(
        'description' => htmlentities($item->categories[0]->category[0]->attributes()->name),
        'slug' => htmlentities($item->categories[0]->category[0]->attributes()->name),
				)
		);
	} else {
		wp_update_term(
    $term["term_id"],
    'product_cat',
    array(
        'description' => htmlentities($item->categories[0]->category[0]->attributes()->name),
        'slug' => htmlentities($item->categories[0]->category[0]->attributes()->name),
				'parent' => NULL,
				)
		);
	};
	delete_option('product_cat_children');
	wp_cache_flush();
  wp_set_post_terms( $post_id, array($term['term_id']), 'product_cat', false);

  if(property_exists($item->categories[0]->category[0],'category')) {
	$term1 = term_exists(htmlentities($item->categories[0]->category[0]->category[0]->attributes()->name),"product_cat");
	if($term1===0||$term1===null){
		$term1 = wp_insert_term(
    htmlentities($item->categories[0]->category[0]->category[0]->attributes()->name),
    'product_cat',
    array(
        'description' => htmlentities($item->categories[0]->category[0]->category[0]->attributes()->name),
        'slug' 				=> htmlentities($item->categories[0]->category[0]->category[0]->attributes()->name),
				'parent' 			=> $term["term_id"],
				)
		);
	} else {
		wp_update_term(
    $term1["term_id"],
    'product_cat',
    array(
				'name' 				=> htmlentities($item->categories[0]->category[0]->category[0]->attributes()->name), 
        'description' => htmlentities($item->categories[0]->category[0]->category[0]->attributes()->name),
        'slug' 				=> htmlentities($item->categories[0]->category[0]->category[0]->attributes()->name),
				'parent'      => $term["term_id"],
				)
		);
	};
	delete_option('product_cat_children');
	wp_cache_flush();
  wp_set_post_terms( $post_id, array($term1['term_id']), 'product_cat', true);

  if(property_exists($item->categories[0]->category[0]->category[0],'category')) {
	$term2 = term_exists(htmlentities($item->categories[0]->category[0]->category[0]->category[0]->attributes()->name),"product_cat");
	if($term2===0||$term2===null){
		$term2 = wp_insert_term(
    htmlentities($item->categories[0]->category[0]->category[0]->category[0]->attributes()->name),
    'product_cat',
    array(
        'description' => htmlentities($item->categories[0]->category[0]->category[0]->category[0]->attributes()->name),
        'slug' 				=> htmlentities($item->categories[0]->category[0]->category[0]->category[0]->attributes()->name),
				'parent' 			=> $term1["term_id"],
				)
		);
	} else {
		wp_update_term(
    $term2["term_id"],
    'product_cat',
    array(
				'name' 				=> htmlentities($item->categories[0]->category[0]->category[0]->category[0]->attributes()->name), 
        'description' => htmlentities($item->categories[0]->category[0]->category[0]->category[0]->attributes()->name),
        'slug' 				=> htmlentities($item->categories[0]->category[0]->category[0]->category[0]->attributes()->name),
				'parent'      => $term1["term_id"],
				)
		);
	};
	delete_option('product_cat_children');
	wp_cache_flush();
  wp_set_post_terms( $post_id, array($term2['term_id']), 'product_cat', true);
  }
  }

	wp_cache_flush();

}
}
if(property_exists($ob,"user")){
foreach($ob->user as $user) {
  $email = (string) $user->email;
  if (!empty($email)) {
		echo_b( "user: ".$user->email."\n");

		$result = mysqli_query($link,"select count(*) cnt from wp_users where LOWER(wp_users.user_email) = '".mysqli_real_escape_string($link,strtolower($user->email))."'");
		echo_b( mysqli_error($link));
    if($row = mysqli_fetch_array($result)){
      if($row["cnt"]==0){
				echo_b( "email not found\n");
				$customer = wc_create_new_customer( $user->email, $user->email, wp_generate_password());
			}
		};

		$result = mysqli_query($link,"select wp_users.* from wp_users where LOWER(wp_users.user_email) = '".mysqli_real_escape_string($link,strtolower($user->email))."'");
		echo_b( mysqli_error($link));
    if($row = mysqli_fetch_array($result)){
			echo_b( "found user:\t".$row["user_login"]."\t".$user->name." \n");
      $result = mysqli_query($link,"update wp_users set wp_users.user_nicename = '".mysqli_real_escape_string($link,$user->name)."', wp_users.user_status = '".mysqli_real_escape_string($link,$user->status)."' where wp_users.ID = '".$row["ID"]."'");
  		echo_b( mysqli_error($link));
      $result = mysqli_query($link,"update wp_users set wp_users.display_name = '".mysqli_real_escape_string($link,$user->name)."', wp_users.user_status = '".mysqli_real_escape_string($link,$user->status)."' where wp_users.ID = '".$row["ID"]."'");
  		echo_b( mysqli_error($link));
			update_user_meta($row["ID"],"first_name",(string)$user->name);
      $result = mysqli_query($link,"select count(*) CNT from wp_usermeta where wp_usermeta.user_id = '".$row["ID"]."' and wp_usermeta.meta_key = 'startax_pricecode'");
      if($row1 = mysqli_fetch_array($result)){
				if($row1["CNT"]==0){
          $result = mysqli_query($link,"insert into wp_usermeta (user_id,meta_key) values ('".$row["ID"]."','startax_pricecode')");
      		echo_b( mysqli_error($link));
				}
        $result = mysqli_query($link,"update wp_usermeta set wp_usermeta.meta_value = '".mysqli_real_escape_string($link,(string)$user->pricecode)."' where wp_usermeta.user_id = '".$row["ID"]."' and wp_usermeta.meta_key = 'startax_pricecode'");
    		echo_b( mysqli_error($link));
			}
      $result = mysqli_query($link,"select count(*) CNT from wp_usermeta where wp_usermeta.user_id = '".$row["ID"]."' and wp_usermeta.meta_key = 'startax_userid'");
      if($row1 = mysqli_fetch_array($result)){
				if($row1["CNT"]==0){
          $result = mysqli_query($link,"insert into wp_usermeta (user_id,meta_key) values ('".$row["ID"]."','startax_userid')");
      		echo_b( mysqli_error($link));
				}
        $result = mysqli_query($link,"update wp_usermeta set wp_usermeta.meta_value = '".mysqli_real_escape_string($link,(string)$user->id)."' where wp_usermeta.user_id = '".$row["ID"]."' and wp_usermeta.meta_key = 'startax_userid'");
    		echo_b( mysqli_error($link));
			}
		} else {
			echo_b( "email not found\n");
		};
	};
}
}

?>
	