<?php
include "../../../include/db.php";
include "../../../include/authenticate.php"; if (!checkperm("u")) {exit ("Permission denied.");}
include "../../../include/general.php";


if (getval("submit","")!="")
	{
	$videojs_cdn=getvalescaped("videojs_cdn","");
	
	$config=array();
	$config['videojs_cdn']=$videojs_cdn;

	set_plugin_config("videojs",$config);
	
	redirect("pages/team/team_home.php");
	}


include "../../../include/header.php";
?>
<div class="BasicsBox"> 
  <h2>&nbsp;</h2>
  <h1><?php echo $lang["videojs_configuration"];?></h1>
  

<form id="form1" name="form1" method="post" action="">

<?php echo config_boolean_field("videojs_cdn",$lang["videojs_cdn"],$videojs_cdn);?>

<div class="Question">  
<label for="submit"></label> 
<input type="submit" name="submit" value="<?php echo $lang["save"]?>">   
</div><div class="clearerleft"></div>

</form>
</div>	
<?php include "../../../include/footer.php";
