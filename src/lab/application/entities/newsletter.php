<?php
/* 
* Company   : Web Supplements
* File Name   : employee.php
* Date Create  : 2009-02-11
* Default Path : DOCUMENT_ROOT/
* Description  : File contains common functions for file upload, delete, download, crawlling.
* Client   : Dream HP
*/
 
class newsletter{
	
	function __construct(){
		
	}
	
	function getARow($uid){
		$query = "SELECT * FROM newsletter_subscriptions where newsletter_subscription_id =?";
        $field = NDatabase::getARow($query, array($uid));
        return $field;
	}
	function getOne($uid){
		$query = "SELECT is_active FROM newsletter_subscriptions where newsletter_subscription_id =?";
        $field = NDatabase::getOne($query, array($uid));
        return $field;
	}
	
	function getAll()
	{
      print  $query = "SELECT * FROM newsletter_subscriptions order by newsletter_subscription_id";
        $arr = NDatabase::getAllAssoc($query);
        return $arr;
	}

	function insert($arr)
	{
					
		$status=NDatabase::AutoExecute(TABLE_PREFIX.'newsletter_subscriptions',$arr,'INSERT',false,true,MAGIC_QUOTES);
		
		return $status;
		
	}

	function update($arr, $id){
		$str='';
		
		foreach($arr as $key=>$val){
			$str.=$key."=?, ";
		}
		$str=trim($str);
		$str=substr($str,0,strlen($str)-1);
			
		$q="UPDATE newsletter_subscriptions SET  ".$str." WHERE newsletter_subscription_id=".$id;
        NDatabase::query($q, $arr);
		
		return 1;										 
		
	}
	
	function delete($id)
	{
		NDatabase::query("DELETE FROM newsletter_subscriptions WHERE newsletter_subscription_id=?", $id);
	}
	
	//function getBlogsAdmin(){
//        $query = "SELECT id, title as name, description, image_url as thumbnail FROM blogs order by id";
//        $arr = NDatabase::getAllAssoc($query);
//        return $arr;
//	}
	
}
?>