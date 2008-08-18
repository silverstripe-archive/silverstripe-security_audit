<?php
/**
 * Extension used to provide additional checks before a user
 * can access parts of the CMS.
 *
 */
class AccessCheckExtension extends Extension {
	
	/**
	 * Check if the logged in user can access the CMS
	 *
	 * @return TRUE if user can access the CMS, FALSE to deny permission
	 */
	function alternateAccessCheck() {
		
	}
}
?>