<?php 
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php include ("./admin/ewconfig.php") ?>
<?php include ("./admin/db.php") ?>
<?php include ("./admin/subgrouppinfo.php") ?>
<?php include ("./admin/advsecu.php") ?>
<?php /*?><?php include ("phpmkrfn.php") ?><?php */?>
<?php include ("./admin/ewupload.php") ?>
<?php /*?><?php
if (!IsLoggedIn()) {
	ob_end_clean();
	header("Location: login.php");
	exit();
}
?><?php */?>
<?php

// Initialize common variables
$x_subgroupp = NULL;
$ox_subgroupp = NULL;
$z_subgroupp = NULL;
$ar_x_subgroupp = NULL;
$ari_x_subgroupp = NULL;
$x_subgrouppList = NULL;
$x_subgrouppChk = NULL;
$cbo_x_subgroupp_js = NULL;
$x_name = NULL;
$ox_name = NULL;
$z_name = NULL;
$ar_x_name = NULL;
$ari_x_name = NULL;
$x_nameList = NULL;
$x_nameChk = NULL;
$cbo_x_name_js = NULL;
$x_txt = NULL;
$ox_txt = NULL;
$z_txt = NULL;
$ar_x_txt = NULL;
$ari_x_txt = NULL;
$x_txtList = NULL;
$x_txtChk = NULL;
$cbo_x_txt_js = NULL;
$x_groupp = NULL;
$ox_groupp = NULL;
$z_groupp = NULL;
$ar_x_groupp = NULL;
$ari_x_groupp = NULL;
$x_grouppList = NULL;
$x_grouppChk = NULL;
$cbo_x_groupp_js = NULL;
$x_sort = NULL;
$ox_sort = NULL;
$z_sort = NULL;
$ar_x_sort = NULL;
$ari_x_sort = NULL;
$x_sortList = NULL;
$x_sortChk = NULL;
$cbo_x_sort_js = NULL;
$x_show = NULL;
$ox_show = NULL;
$z_show = NULL;
$ar_x_show = NULL;
$ari_x_show = NULL;
$x_showList = NULL;
$x_showChk = NULL;
$cbo_x_show_js = NULL;
?>
<?php
$nStartRec = 0;
$nStopRec = 0;
$nTotalRecs = 0;
$nRecCount = 0;
$nRecActual = 0;
$sKeyMaster = "";
$sDbWhereMaster = "";
$sSrchAdvanced = "";
$psearch = "";
$psearchtype = "";
$sDbWhereDetail = "";
$sSrchBasic = "";
$sSrchWhere = "";
$sDbWhere = "";
$sOrderBy = "";
$sSqlMaster = "";
$sListTrJs = "";
$bEditRow = "";
$nEditRowCnt = "";
$sDeleteConfirmMsg = "";
$bMasterRecordExist = false;
$nDisplayRecs = "1000";
$nRecRange = 10;

// Set up records per page dynamically
SetUpDisplayRecs();

// Open connection to the database
$conn = phpmkr_db_connect(HOST, USER, PASS, DB, PORT);

// Handle reset command
ResetCmd();

// Set up master detail parameters
SetUpMasterDetail();

// Build filter condition
$sDbWhere = "";
$sDbWhere = "`show`=1";
if ($sDbWhereDetail <> "") {
	if ($sDbWhere <> "") $sDbWhere .= " AND ";
	$sDbWhere .= "(" . $sDbWhereDetail . ")";
}
if ($sSrchWhere <> "") {
	if ($sDbWhere <> "") $sDbWhere .= " AND ";
	$sDbWhere .= "(" . $sSrchWhere . ")";
}

// Set up sorting order
$sOrderBy = "";
SetUpSortOrder();
$sSql = ewBuildSql(ewSqlSelect, ewSqlWhere, ewSqlGroupBy, ewSqlHaving, ewSqlOrderBy, $sDbWhere, $sOrderBy);

// echo $sSql . "<br>"; // Uncomment to show SQL for debugging
// Build master record SQL

if ($sDbWhereMaster <> "") {
	$sSqlMaster = ewBuildSql(ewSqlMasterSelect, ewSqlMasterWhere, ewSqlMasterGroupBy, ewSqlMasterHaving, ewSqlMasterOrderBy, $sDbWhereMaster, "");
	$rs = phpmkr_query($sSqlMaster, $conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSqlMaster);
	$bMasterRecordExist = (phpmkr_num_rows($rs) > 0);
	if (!$bMasterRecordExist) {
		$_SESSION[ewSessionTblMasterWhere] = "";
		$_SESSION[ewSessionTblDetailWhere] = "";
		$_SESSION[ewSessionMessage] = "Информация не найдена";
		phpmkr_free_result($rs);
		phpmkr_db_close($conn);
		header("Location: groupplist.php");
		exit();
	}
}
?>

<?php
		$row = phpmkr_fetch_array($rs);
		$x_groupp = $row["groupp"];
		$x_name = $row["name"];
		$x_txt = $row["txt"];		
		$x_sort = $row["sort"];
		$x_show = $row["show"];
?>

<? $title=$x_name."."; ?>
<?php include ("header.php") ?>
<?php /*?><script type="text/javascript">
<!--
EW_LookupFn = "ewlookup.php"; // ewlookup file name
EW_AddOptFn = "ewaddopt.php"; // ewaddopt.php file name

//-->
</script>
<script type="text/javascript" src="ewp.js"></script>
<script type="text/javascript">
<!--
EW_dateSep = "/"; // set date separator
EW_UploadAllowedFileExt = "gif,jpg,jpeg,bmp,png,doc,xls,pdf,zip"; // allowed upload file extension

//-->
</script>
<script type="text/javascript">
<!--
var firstrowoffset = 1; // first data row start at
var tablename = 'ewlistmain'; // table name
var lastrowoffset = 0; // footer row
var usecss = true; // use css
var rowclass = 'ewTableRow'; // row class
var rowaltclass = 'ewTableAltRow'; // row alternate class
var rowmoverclass = 'ewTableHighlightRow'; // row mouse over class
var rowselectedclass = 'ewTableSelectRow'; // row selected class
var roweditclass = 'ewTableEditRow'; // row edit class
var rowcolor = '#FFFFFF'; // row color
var rowaltcolor = '#F5F5F5'; // row alternate color
var rowmovercolor = '#FFCCFF'; // row mouse over color
var rowselectedcolor = '#CCFFFF'; // row selected color
var roweditcolor = '#FFFF99'; // row edit color

//-->
</script>
<script type="text/javascript">
<!--
	var EW_DHTMLEditors = [];

//-->
</script><?php */?>
<?php
if ($sDbWhereMaster <> "") {
	if ($bMasterRecordExist) { ?>
<?php /*?><p><span class="phpmaker"><img src='/i/main.png' width='16' height='16' border='0'>: Работы
<br><a href="groupplist.php"><img src='/i/back.png' alt='Назад' title='Вернуться назад' width='16' height='16' border='0'>Вернуться назад</a></span>
</p><?php */?>

<p><span class="zag01"><a href="/">Главная</a>&nbsp;/&nbsp;</span><span class="zag01"><?php echo $x_name; ?></span></p>	
<h2><img src="/i/bullet02.gif">&nbsp;<span class="zag02"><?php echo $x_name; ?></span></h2>
<p><?php echo $x_txt; ?></p>
<?php
	}
	phpmkr_free_result($rs);
}
?>
<?php

// Set up recordset
$rs = phpmkr_query($sSql, $conn) or die("Failed to execute query at line " . __LINE__ . ": " . phpmkr_error($conn) . '<br>SQL: ' . $sSql);
$nTotalRecs = phpmkr_num_rows($rs);
if ($nDisplayRecs <= 0) { // Display all records
	$nDisplayRecs = $nTotalRecs;
}
$nStartRec = 1;
SetUpStartRec(); // Set up start record position
?>
<?php /*?><p><span class="phpmaker"><a href='/admin/'><img src='/i/home.png' width='16' height='16' border='0' alt='На главную' title='На главную'></a> : Подгруппы
</span></p>
<table class="ewListAdd">
	<tr>
		<td><span class="phpmaker"><a href="subgrouppadd.php"><img src='/i/add.gif' width='16' height='16' border='0'><b>Добавить</b></a></span></td>
	</tr>
</table>
<p>
<?php */?><?php
if (@$_SESSION[ewSessionMessage] <> "") {
?>
<span class="ewmsg"><?php echo $_SESSION[ewSessionMessage]; ?></span>
<?php
	$_SESSION[ewSessionMessage] = ""; // Clear message
}
?>
<?php if ($nTotalRecs > 0)  { ?>
<table width="85%"><tr>
		<td class="td-col-groupp">
<?php /*?>	<tr>
		<td valign="top"><span>
	<a href="subgroupplist.php?order=<?php echo urlencode("name"); ?>">
	Название<?php if (@$_SESSION[ewSessionTblSort . "_x_name"] == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif (@$_SESSION[ewSessionTblSort . "_x_name"] == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?>
	</a>
		</span></td>
	</tr><?php */?>
<?php

// Set the last record to display
$nStopRec = $nStartRec + $nDisplayRecs - 1;

// Move to the first record
$nRecCount = $nStartRec - 1;
if (phpmkr_num_rows($rs) > 0) {
	phpmkr_data_seek($rs, $nStartRec -1);
}
$nRecActual = 0;
while (($row = @phpmkr_fetch_array($rs)) && ($nRecCount < $nStopRec)) {
	$nRecCount = $nRecCount + 1;
	if ($nRecCount >= $nStartRec) {
		$nRecActual++;

		// Set row color
		$sItemRowClass = " class=\"ewTableRow\"";
		$sListTrJs = " onmouseover='ew_mouseover(this);' onmouseout='ew_mouseout(this);' onclick='ew_click(this);'";

		// Display alternate color for rows
		if ($nRecCount % 2 <> 1) {
			$sItemRowClass = " class=\"ewTableAltRow\"";
		}
		$x_subgroupp = $row["subgroupp"];
		$x_name = $row["name"];
		$x_groupp = $row["groupp"];
		$x_sort = $row["sort"];
		$x_show = $row["show"];
?>	

	<div class="subgroupp__list <?php 
			if ($x_groupp == '6') { echo 'two__columns'; } 
			else { echo 'three__columns'; } 
		?>">
		<span class="zag0001">
			<a href="work.php?showmaster=1&subgroupp=<?php echo urlencode($x_subgroupp); ?>">
				<img class="subgroupp__list__img" src="/img/subgroupp/<?php echo urlencode($x_subgroupp); ?>.jpg" alt="">
				<?php echo $x_name; ?>
			</a>
		</span>
	</div>
<?php
	}
}
?></td>
	</tr>
</table>
<?php 
}

// Close recordset and connection
phpmkr_free_result($rs);
phpmkr_db_close($conn);
?>
<?php /*?><form action="subgroupplist.php" name="ewpagerform" id="ewpagerform">
<table>
	<tr>
		<td nowrap>
		<span class="phpmaker">
<?php

// Display page numbers
if ($nTotalRecs > 0) {
	$rsEof = ($nTotalRecs < ($nStartRec + $nDisplayRecs));
	if ($nTotalRecs > $nDisplayRecs) {

		// Find out if there should be Prev/Next links
		if ($nStartRec == 1) {
			$isPrev = False;
		} else {
			$isPrev = True;
			$PrevStart = $nStartRec - $nDisplayRecs;
			if ($PrevStart < 1) { $PrevStart = 1; } ?>
		<a href="subgroupplist.php?start=<?php echo $PrevStart; ?>"><b>Предыдущая страница</b></a>
		<?php
		}
		if ($isPrev || (!$rsEof)) {
			$x = 1;
			$y = 1;
			$dx1 = intval(($nStartRec-1)/($nDisplayRecs*$nRecRange))*$nDisplayRecs*$nRecRange+1;
			$dy1 = intval(($nStartRec-1)/($nDisplayRecs*$nRecRange))*$nRecRange+1;
			if (($dx1+$nDisplayRecs*$nRecRange-1) > $nTotalRecs) {
				$dx2 = intval($nTotalRecs/$nDisplayRecs)*$nDisplayRecs+1;
				$dy2 = intval($nTotalRecs/$nDisplayRecs)+1;
			} else {
				$dx2 = $dx1+$nDisplayRecs*$nRecRange-1;
				$dy2 = $dy1+$nRecRange-1;
			}
			while ($x <= $nTotalRecs) {
				if (($x >= $dx1) && ($x <= $dx2)) {
					if ($nStartRec == $x) { ?>
		<b><?php echo $y; ?></b>
					<?php } else { ?>
		<a href="subgroupplist.php?start=<?php echo $x; ?>"><b><?php echo $y; ?></b></a>
					<?php }
					$x += $nDisplayRecs;
					$y += 1;
				} elseif (($x >= ($dx1-$nDisplayRecs*$nRecRange)) && ($x <= ($dx2+$nDisplayRecs*$nRecRange))) {
					if ($x+$nRecRange*$nDisplayRecs < $nTotalRecs) { ?>
		<a href="subgroupplist.php?start=<?php echo $x; ?>"><b><?php echo $y; ?>-<?php echo ($y+$nRecRange-1);?></b></a>
					<?php } else {
						$ny=intval(($nTotalRecs-1)/$nDisplayRecs)+1;
							if ($ny == $y) { ?>
		<a href="subgroupplist.php?start=<?php echo $x; ?>"><b><?php echo $y; ?></b></a>
							<?php } else { ?>
		<a href="subgroupplist.php?start=<?php echo $x; ?>"><b><?php echo $y; ?>-<?php echo $ny; ?></b></a>
							<?php }
					}
					$x += $nRecRange*$nDisplayRecs;
					$y += $nRecRange;
				} else {
					$x += $nRecRange*$nDisplayRecs;
					$y += $nRecRange;
				}
			}
		}

		// Next link
		if (!$rsEof) {
			$NextStart = $nStartRec + $nDisplayRecs;
			$isMore = True;  ?>
		<a href="subgroupplist.php?start=<?php echo $NextStart; ?>"><b>Следующая</b></a>
		<?php } else {
			$isMore = False;
		} ?>
		<br>
<?php	}
	if ($nStartRec > $nTotalRecs) { $nStartRec = $nTotalRecs; }
	$nStopRec = $nStartRec + $nDisplayRecs - 1;
	$nRecCount = $nTotalRecs - 1;
	if ($rsEof) { $nRecCount = $nTotalRecs; }
	if ($nStopRec > $nRecCount) { $nStopRec = $nRecCount; } ?>
	Записей <?php echo  $nStartRec;  ?> в <?php  echo $nStopRec; ?> из <?php echo  $nTotalRecs; ?>
<?php } else { ?>
	<?php if ($sSrchWhere == "0=101") {?>
	<?php } else { ?>
	Информация не найдена
	<?php } ?>
<?php }?>
		</span>
		</td>
<?php if ($nTotalRecs > 0) { ?>
		<td nowrap>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td align="right" valign="top" nowrap><span class="phpmaker">Записей на странице&nbsp;
		<select name="<?php echo ewTblRecPerPage; ?>" onChange="this.form.submit();" class="phpmaker">
			<option value="10"<?php if ($nDisplayRecs == 10) { echo " selected";  }?>>10</option>
			<option value="20"<?php if ($nDisplayRecs == 20) { echo " selected";  }?>>20</option>
			<option value="50"<?php if ($nDisplayRecs == 50) { echo " selected";  }?>>50</option>
			<option value="1000"<?php if ($nDisplayRecs == 1000) { echo " selected";  }?>>1000</option>
			<option value="ALL"<?php if (@$_SESSION[ewSessionTblRecPerPage] == -1) { echo " selected";  }?>>Все записи</option>
		</select>
		</span></td>
<?php } ?>
	</tr>
</table>
</form><?php */?>
	<?php if ($x_groupp == '2') { ?>
		<div class="notes__page">
			<h1>Наружная реклама в Саратове</h1>
			<p><strong>Наружная реклама</strong> — мощное средство привлечения внимания. Качественное исполнение способствует формированию позитивного имиджа и узнаваемости. <strong>Заказать наружную рекламу</strong> можно в разных вариантах: таблички на фасадах, неоновые вывески, объемные буквы, щиты, баннеры, стенды без подсветки, стелы, световые коробы, реклама для крыш и другая.</p>
			<p><strong>Цена на наружную рекламу</strong> варьируется в зависимости от её типа. Вы можете получить консультацию по программе размещения, рекламных плоскостях, разработке дизайна.</p>
			<p>Рекламное агентство «Корица» устанавливает <strong>наружную рекламу в Саратове</strong> и регионе.</p>

		</div>
	<?php } ?>
	<?php if ($x_groupp == '3') { ?>
		<div class="notes__page">
			<h1>Оформление магазинов в Саратове под ключ</h1>
			<p><strong>Оформление магазинов</strong> важно не только в день открытия, но и на протяжении их существования. Грамотный дизайн с максимумом информации и минимум навязчивости сформирует позитивный имидж и усилит желание посетителей возвращаться за новыми покупками.</p>
			<p><strong>Оформление магазинов заказать</strong> можно через наш сайт. Для деталей лучше связаться с нашими консультантами.</p>
			<p><strong>Цена оформления магазинов</strong> состоит из видов рекламы (лайтбоксы, вывески, инфопанели, штендеры, и т.д.), которые заказчик пожелал, материалов на их изготовления и работ по монтажу.</p>
			<p><strong>Оформлением магазинов в Саратове</strong> занимаются профессионалы из рекламной студии «Корица». Сделать расчет стоимости и обговорить нюансы можно на нашем сайте.</p>
		</div>
	<?php } ?>
<?php include ("footer2.php") ?>
<?php

//-------------------------------------------------------------------------------
// Function SetUpDisplayRecs
// - Set up Number of Records displayed per page based on Form element RecPerPage
// - Variables setup: nDisplayRecs

function SetUpDisplayRecs()
{
	global $nStartRec;
	global $nDisplayRecs;
	global $nTotalRecs;
	$sWrk = @$_GET[ewTblRecPerPage];
	if ($sWrk <> "") {
		if (is_numeric($sWrk)) {
			$nDisplayRecs = $sWrk;
		} else {
			if (strtolower($sWrk) == "all") { // Display all records
				$nDisplayRecs = -1;
			} else {
				$nDisplayRecs = 1000;  // Non-numeric, load default
			}
		}
		$_SESSION[ewSessionTblRecPerPage] = $nDisplayRecs; // Save to Session

		// Reset Start Position (Reset Command)
		$nStartRec = 1;
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	} else {
		if (@$_SESSION[ewSessionTblRecPerPage] <> "") {
			$nDisplayRecs = $_SESSION[ewSessionTblRecPerPage]; // Restore from Session
		} else {
			$nDisplayRecs = 1000; // Load Default
		}
	}
}

//-------------------------------------------------------------------------------
// Function SetUpMasterDetail
// - Set up Master Detail criteria based on querystring parameter key_m
// - Variables setup: sDbWhereMaster, Session("TblMasterkey"), sDbWhereDetail, Session(TblDetailWhere)

function SetUpMasterDetail()
{
	global $sDbWhereMaster;
	global $sDbWhereDetail;
	global $sKeyMaster;
	global $nStartRec;
	global $x_groupp;

	// Get the keys for master table
	if (strlen(@$_GET[ewTblShowMaster]) > 0) {

		// Reset start record counter (new master key)
		$nStartRec = 1;
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
		$sDbWhereMaster = ewSqlMasterFilter;
		$sDbWhereDetail = ewSqlDetailFilter;	
		$x_groupp = (get_magic_quotes_gpc()) ? stripslashes(@$_GET["groupp"]) : @$_GET["groupp"]; // Load parameter from QueryString
		if (is_numeric($x_groupp)) { 
			$sDbWhereMaster = str_replace("@groupp", AdjustSql($x_groupp), $sDbWhereMaster); // Replace key value
			$sDbWhereDetail = str_replace("@groupp", AdjustSql($x_groupp), $sDbWhereDetail); // Replace key value
		$_SESSION[ewSessionTblMasterKey . "_groupp"] = $x_groupp; // Save master key Value
		} else {
			$sDbWhereMaster = "0=1";
			$sDbWhereDetail = "0=1";
		}
		$_SESSION[ewSessionTblMasterWhere] = $sDbWhereMaster;
		$_SESSION[ewSessionTblDetailWhere] = $sDbWhereDetail;
	} else {
		$sDbWhereMaster = @$_SESSION[ewSessionTblMasterWhere];
		$sDbWhereDetail = @$_SESSION[ewSessionTblDetailWhere];
	}
}

//-------------------------------------------------------------------------------
// Function ResetSearch
// - Clear all search parameters

function ResetSearch() 
{

	// Clear search where
	$sSrchWhere = "";
	$_SESSION[ewSessionTblSearchWhere] = $sSrchWhere;

	// Clear advanced search parameters
	$_SESSION[ewSessionTblAdvSrch . "_x_subgroupp"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_name"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_groupp"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_sort"] = "";
	$_SESSION[ewSessionTblAdvSrch . "_x_show"] = "";
	$_SESSION[ewSessionTblBasicSrch] = "";
	$_SESSION[ewSessionTblBasicSrchType] = "";
}

//-------------------------------------------------------------------------------
// Function RestoreSearch
// - Restore all search parameters
//

function RestoreSearch()
{

	// Restore advanced search settings
	$GLOBALS["x_subgroupp"] = @$_SESSION[ewSessionTblAdvSrch . "_x_subgroupp"];
	$GLOBALS["x_name"] = @$_SESSION[ewSessionTblAdvSrch . "_x_name"];
	$GLOBALS["x_groupp"] = @$_SESSION[ewSessionTblAdvSrch . "_x_groupp"];
	$GLOBALS["x_sort"] = @$_SESSION[ewSessionTblAdvSrch . "_x_sort"];
	$GLOBALS["x_show"] = @$_SESSION[ewSessionTblAdvSrch . "_x_show"];
	$GLOBALS["psearch"] = @$_SESSION[ewSessionTblBasicSrch];
	$GLOBALS["psearchtype"] = @$_SESSION[ewSessionTblBasicSrchType];
}

//-------------------------------------------------------------------------------
// Function SetUpSortOrder
// - Set up Sort parameters based on Sort Links clicked
// - Variables setup: sOrderBy, Session(TblOrderBy), Session(Tbl_Field_Sort)

function SetUpSortOrder()
{
	global $sOrderBy;
	global $sDefaultOrderBy;

	// Check for an Order parameter
	if (strlen(@$_GET["order"]) > 0) {
		$sOrder = @$_GET["order"];

		// Field `name`
		if ($sOrder == "name") {
			$sSortField = "`name`";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_name"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_name"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_name"] <> "") { @$_SESSION[ewSessionTblSort . "_x_name"] = ""; }
		}

		// Field `groupp`
		if ($sOrder == "groupp") {
			$sSortField = "`groupp`";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_groupp"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_groupp"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_groupp"] <> "") { @$_SESSION[ewSessionTblSort . "_x_groupp"] = ""; }
		}

		// Field `sort`
		if ($sOrder == "sort") {
			$sSortField = "`sort`";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_sort"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_sort"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_sort"] <> "") { @$_SESSION[ewSessionTblSort . "_x_sort"] = ""; }
		}

		// Field `show`
		if ($sOrder == "show") {
			$sSortField = "`show`";
			$sLastSort = @$_SESSION[ewSessionTblSort . "_x_show"];
			$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			$_SESSION[ewSessionTblSort . "_x_show"] = $sThisSort;
		} else {
			if (@$_SESSION[ewSessionTblSort . "_x_show"] <> "") { @$_SESSION[ewSessionTblSort . "_x_show"] = ""; }
		}
		$_SESSION[ewSessionTblOrderBy] = $sSortField . " " . $sThisSort;
		$_SESSION[ewSessionTblStartRec] = 1;
	}
	$sOrderBy = @$_SESSION[ewSessionTblOrderBy];
	if ($sOrderBy == "") {
		if (ewSqlOrderBy <> "" && ewSqlOrderBySessions <> "") {
			$sOrderBy = ewSqlOrderBy;
			@$_SESSION[ewSessionTblOrderBy] = $sOrderBy;
			$arOrderBy = explode(",", ewSqlOrderBySessions);
			for($i=0; $i<count($arOrderBy); $i+=2) {
				@$_SESSION[ewSessionTblSort . "_" . $arOrderBy[$i]] = $arOrderBy[$i+1];
			}
		}
	}
}

//-------------------------------------------------------------------------------
// Function SetUpStartRec
//- Set up Starting Record parameters based on Pager Navigation
// - Variables setup: nStartRec

function SetUpStartRec()
{

	// Check for a START parameter
	global $nStartRec;
	global $nDisplayRecs;
	global $nTotalRecs;
	if (strlen(@$_GET[ewTblStartRec]) > 0) {
		$nStartRec = @$_GET[ewTblStartRec];
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	} elseif (strlen(@$_GET["pageno"]) > 0) {
		$nPageNo = @$_GET["pageno"];
		if (is_numeric($nPageNo)) {
			$nStartRec = ($nPageNo-1)*$nDisplayRecs+1;
			if ($nStartRec <= 0) {
				$nStartRec = 1;
			} elseif ($nStartRec >= intval(($nTotalRecs-1)/$nDisplayRecs)*$nDisplayRecs+1) {
				$nStartRec = intval(($nTotalRecs-1)/$nDisplayRecs)*$nDisplayRecs+1;
			}
			$_SESSION[ewSessionTblStartRec] = $nStartRec;
		} else {
			$nStartRec = @$_SESSION[ewSessionTblStartRec];
		}
	} else {
		$nStartRec = @$_SESSION[ewSessionTblStartRec];
	}

	// Check if correct start record counter
	if (!(is_numeric($nStartRec)) || ($nStartRec == "")) { // Avoid invalid start record counter
		$nStartRec = 1; // Reset start record counter
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	} elseif ($nStartRec > $nTotalRecs) { // Avoid starting record > total records
		$nStartRec = intval(($nTotalRecs-1)/$nDisplayRecs)*$nDisplayRecs+1; // Point to last page first record
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	}
}

//-------------------------------------------------------------------------------
// Function ResetCmd
// - Clear list page parameters
// - RESET: reset search parameters
// - RESETALL: reset search & master/detail parameters
// - RESETSORT: reset sort parameters

function ResetCmd()
{

	// Get Reset command
	if (strlen(@$_GET["cmd"]) > 0) {
		$sCmd = @$_GET["cmd"];
		if (strtolower($sCmd) == "reset") { // Reset search criteria
			ResetSearch();
		} elseif (strtolower($sCmd) == "resetall") { // Reset search criteria and session vars
			ResetSearch();
			$_SESSION[ewSessionTblMasterWhere] = ""; // Clear master criteria
			$sDbWhereMaster = "";
			$_SESSION[ewSessionTblDetailWhere] = ""; // Clear detail criteria
			$sDbWhereDetail = "";
			$_SESSION[ewSessionTblMasterKey . "_groupp"] = ""; // Clear master key value
		} elseif (strtolower($sCmd) == "resetsort") { // Reset sort criteria
			$sOrderBy = "";
			$_SESSION[ewSessionTblOrderBy] = $sOrderBy;
			if (@$_SESSION[ewSessionTblSort . "_x_name"] <> "") { $_SESSION[ewSessionTblSort . "_x_name"] = ""; }
			if (@$_SESSION[ewSessionTblSort . "_x_groupp"] <> "") { $_SESSION[ewSessionTblSort . "_x_groupp"] = ""; }
			if (@$_SESSION[ewSessionTblSort . "_x_sort"] <> "") { $_SESSION[ewSessionTblSort . "_x_sort"] = ""; }
			if (@$_SESSION[ewSessionTblSort . "_x_show"] <> "") { $_SESSION[ewSessionTblSort . "_x_show"] = ""; }
		}

		// Reset start position (Reset command)
		$nStartRec = 1;
		$_SESSION[ewSessionTblStartRec] = $nStartRec;
	}
}
?>
