<?php
/**
 * This extension can be used to log {@link Member} related actions in the CMS
 *
 */
class MemberAccessLoggingExtension extends DataObjectDecorator {
	
	/**
	 * Member has successfully logged in
	 */
	function memberLoggedIn() {
		return AccessLogEntry::create("Logged in", $this->owner);
	}
	
	/**
	 * Member has sucessfully logged in automatically using the 'Remember me' function
	 */
	function memberAutoLoggedIn() {
		return $this->memberLoggedIn();
	}
	
	/**
	 * Member has logged out
	 */
	function memberLoggedOut() {
		return AccessLogEntry::create("Logged out", $this->owner);
	}
	
	/**
	 * Member has been authenticated. Most situations won't need this hook
	 */
	function authenticated() {
		
	}
	
	/**
	 * A user tried to log in as this member but provided the wrong password
	 */
	function authenticationFailed() {
		
	}
	
	/**
	 * Authentication failed but user was not found in the database. Note: This
	 * extension method is called on a {@link Member} singleton, so $this->owner
	 * will be meaningless.
	 */
	function authenticationFailedUnknownUser($data) {
		
	}
}
?>