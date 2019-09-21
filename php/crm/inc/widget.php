<?php

   $i = 1;
   $w = array();
   $where = '';
      

   if ($_SESSION['role'] == 'manager') 						$w[] = $db->parse("company_manager = ?s", $_SESSION['name']);
   if ($_SESSION['role'] != 'manager' and $company_manager) 	$w[] = $db->parse("company_manager = ?s", $company_manager);
   
   if ($company_name) 		$w[] = $db->parse("company_name LIKE ?s", "%$company_name%");
   if ($company_code) 		$w[] = $db->parse("company_code LIKE ?s", "%$company_code%");
   if ($company_region) 	$w[] = $db->parse("company_region LIKE ?s", "%$company_region%");
   if ($company_adres) 	   $w[] = $db->parse("company_adres LIKE ?s", "%$company_adres%");
   if ($company_phone) 	   $w[] = $db->parse("company_phone LIKE ?s", "%$company_phone%");
   if ($company_email) 	   $w[] = $db->parse("company_email LIKE ?s", "%$company_email%");
   if ($company_about) 	   $w[] = $db->parse("company_about LIKE ?s", "%$company_about%");
   if ($company_time) 		$w[] = $db->parse("company_time = ?s", $company_time);
   
   if ($company_date) 		{
      $w[] = $db->parse('company_date >= ?s and company_date <= ?s', $start_date, $end_date);
   } else {
      $w[] = $db->parse('company_date >= ?s and company_date <= ?s', $start_date, $end_date);
   }

   if (count($w)) 	$where = "WHERE ". implode(' AND ', $w);
         
   $sort = 'desc';
   $company_list_control = $db->getAll("SELECT * FROM `company` ?p ORDER by company_date ". $sort .", company_time ". $sort, $where); 
?>
<div class="widget">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-2">
            <a href="" class="widget__card control">
               <p>
                  <span>На контроле</span>
               </p>
               <p class="result"><?php echo count($company_list_control); ?></p>
            </a>
         </div>
         <div class="col-md-2">
            <div class="widget__card">
               <p>
                  <b>81.300</b>
                  <span>Lorem, ipsum dolor.</span>
               </p>
               <p>chart</p>
            </div>
         </div>
         <div class="col-md-2">
            <div class="widget__card">
               <p>
                  <b>81.300</b>
                  <span>Lorem, ipsum dolor.</span>
               </p>
               <p>chart</p>
            </div>
         </div>
      </div>
   </div>
</div>