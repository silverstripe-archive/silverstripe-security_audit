<?php
/**
 * Access Logging Extension
 * 
 * This extension is added to {@link Controller} instances if the application requires
 * audit-level logging of users' actions in the CMS.
 * 
 * Audit logging extension points are marked as comments in code: Audit logging hook
 */
class AccessLoggingExtension extends Extension {
	
	/**
	 * A user has been granted access to part of the CMS.
	 */
	function accessedCMS() {
		AccessLogEntry::create("Opened {$this->owner->class}");
	}
	
	/**
	 * Before {@link Controller}::init is called
	 *
	 * @param HTTPRequest $request
	 */
	function beforeInit($request) {
		
	}
	
	/**
	 * After {@link Controller}::init is called.
	 * 
	 * @param HTTPRequest $request
	 */
	function afterInit($request) {
		
	}
	
	/**
	 * {@link Member} $member tried to access part of the CMS, but did not have
	 * permission to do so.
	 *
	 * @param Member $member
	 */
	function permissionDenied($member) {
		$name = ($this->owner->hasMethod('Link')) ? $this->owner->Link() : $this->owner->class;
		
		AccessLogEntry::create("Permission to access {$name} denied");
	}
}
?>