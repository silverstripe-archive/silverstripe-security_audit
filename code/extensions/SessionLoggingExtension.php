<?php
class SessionLoggingExtension extends Extension {
	
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
}
?>