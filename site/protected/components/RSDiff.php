<?php
/**
 * class that mimic the Resource Space diff function for updating a field
 * 
 */

class RSDiff extends CComponent
{
	
	public function init()
	{
	}
	
	public function compare($from, $to)
	{
		return $this->log_diff($from, $to);
	}
	
		
	private function log_diff($fromvalue,$tovalue)	
	{
	# Forumlate descriptive text to describe the change made to a metadata field.

	# Remove any database escaping
	$fromvalue = str_replace("\\","",$fromvalue);
	$tovalue = str_replace("\\","",$tovalue);
	
	if (substr($fromvalue,0,1)==",")		{
		# Work a different way for checkbox lists.
		$fromvalue=explode(",",  /* i18n_get_translated */($fromvalue));
		$tovalue=explode(",", /*i18n_get_translated*/($tovalue));
		
		# Get diffs
		$inserts=array_diff($tovalue,$fromvalue);
		$deletes=array_diff($fromvalue,$tovalue);

		# Process array diffs into meaningful strings.
		$return="";
		if (count($deletes)>0)
			{
			$return.="- " . join("\n- " , $deletes);
			}
		if (count($inserts)>0)
			{
			if ($return!="") {$return.="\n";}
			$return.="+ " . join("\n+ ", $inserts);
			}
		
		#debug($return);
		return $return;
		}

	# For standard strings, use Text_Diff
		
	$path = Yii::app()->config->resourceSpacePath;	
	require_once $path.'lib/Text_Diff/Diff.php';
	require_once $path.'lib/Text_Diff/Diff/Renderer/inline.php';

	$lines1 = explode("\n",$fromvalue);
	$lines2 = explode("\n",$tovalue);

	$diff     = new Text_Diff('native', array($lines1, $lines2));
	$renderer = new Text_Diff_Renderer_inline();
	$diff=$renderer->render($diff);
	
	$return="";

	# The inline diff syntax places inserts within <ins></ins> tags and deletes within <del></del> tags.

	# Handle deletes
	if (strpos($diff,"<del>")!==false)
		{
		$s=explode("<del>",$diff);
		for ($n=1;$n<count($s);$n++)
			{
			$t=explode("</del>",$s[$n]);
			if ($return!="") {$return.="\n";}
			$return.="- " . trim($t[0]); //i18n_get_translated($t[0]));
			}
		}
	# Handle inserts
	if (strpos($diff,"<ins>")!==false)
		{
		$s=explode("<ins>",$diff);
		for ($n=1;$n<count($s);$n++)
			{
			$t=explode("</ins>",$s[$n]);
			if ($return!="") {$return.="\n";}
			$return.="+ " . trim($t[0]); //i18n_get_translated($t[0]));
			}
		}


	#debug ($return);
	return $return;
	}

}
