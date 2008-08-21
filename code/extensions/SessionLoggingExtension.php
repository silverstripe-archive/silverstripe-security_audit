<?php
class SessionLoggingExtension extends DataObjectDecorator {
	
	/**
	 * Before {@link Controller}::init is called
	 *
	 * @param HTTPRequest $request
	 */
	function beforeInit($request) {
		if(DB::isActive()) SessionLogEntry::start(Session::get_timeout());	
	}
	
	/**
	 * After {@link Controller}::init is called.
	 * 
	 * @param HTTPRequest $request
	 */
	function afterInit($request) {
		
	}
	
	/**
	 * If a member logs in, the session stops and another is started
	 */
	function memberLoggedIn() {
		SessionLogEntry::stop();
		SessionLogEntry::start(Session::get_timeout());
	}
	
	/**
	 * Logging out also stops the session
	 */
	function memberLoggedOut() {
		SessionLogEntry::stop();
	}
}
?>