<?php
function gpid2gpcode($gpid)
{
    if ($gpid)
    {
	$db_query = "SELECT gp_code FROM "._DB_PREF_."_tblUserGroupPhonebook WHERE gpid='$gpid'";
	$db_result = dba_query($db_query);
	$db_row = dba_fetch_array($db_result);
	$gp_code = $db_row['gp_code'];
    }
    return $gp_code;
}

function gpcode2gpid($uid,$gp_code)
{
    if ($uid && $gp_code)
    {
	$db_query = "SELECT gpid FROM "._DB_PREF_."_tblUserGroupPhonebook WHERE uid='$uid' AND gp_code='$gp_code'";
	$db_result = dba_query($db_query);
	$db_row = dba_fetch_array($db_result);
	$gpid = $db_row['gpid'];
    }
    return $gpid;
}

function pnum2pdesc($p_num)
{
    global $username;
    if ($p_num)
    {
	if (substr($p_num,0,1) == 0)
	{
	    $p_num = substr($p_num,1);
	}
	$uid = username2uid($username);
	$db_query = "SELECT p_desc FROM "._DB_PREF_."_tblUserPhonebook WHERE p_num LIKE '%$p_num' AND uid='$uid'";
	$db_result = dba_query($db_query);
	$db_row = dba_fetch_array($db_result);
	$p_desc = $db_row['p_desc'];
    }
    return $p_desc;
}

?>