<?php
class AccessLogEntry extends DataObject {
	
	static $db = array(
		'IPAddress' => 'Varchar(15)',
		'ForwardedAddress' => 'Varchar(15)',
		'URL' => 'Varchar(255)',
		'Message' => 'Text'
	);
	
	static $has_one = array(
		'Member' => 'Member'
	);
	
	static function create($message, $member = null) {
		$entry = Object::create('AccessLogEntry');
		$entry->Message = $message;
		$entry->IPAddress = $_SERVER['REMOTE_ADDR'];
		$entry->URL = array_key_exists('url', $_GET) ? $_GET['url'] : $_SERVER['REQUEST_URI'];
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) $entry->ForwardedAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		$entry->MemberID = $member ? $member->ID : Member::currentUserID();
		$entry->write();
	}
	
	function getIP() {
		if($this->ForwardedAddress) return "$this->ForwardedAddress (via $this->IPAddress)";
		else return $this->IPAddress;
	}
	
	function clearOlderRecord(){
		$sql = "Delete FROM `AccessLogEntry` WHERE Created + INTERVAL 180 DAY < NOW()";
		DB::query($sql);
	}
}
?>