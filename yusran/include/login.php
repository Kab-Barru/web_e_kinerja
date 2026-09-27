<?php
// ensure this file is being included by a parent file
if( !defined( '_JEXEC' ) && !defined( '_VALID_MOS' ) ) die( 'Restricted access' );


//------------------------------------------------------------------------------
require_once _EXT_PATH."/include/users.php";
ext_load_users();
//------------------------------------------------------------------------------

$GLOBALS['__SESSION']=&$_SESSION;
if( !empty($_REQUEST['type'])) {
	$GLOBALS['authentication_type'] = basename(extGetParam($_REQUEST, 'type', $GLOBALS['ext_conf']['authentication_method_default']));
} else {
	$GLOBALS['authentication_type'] = $GLOBALS['file_mode'];
}
if($GLOBALS['authentication_type'] == 'file') {
	$GLOBALS['authentication_type'] = 'extplorer';
}
if( !in_array($GLOBALS['authentication_type'],$GLOBALS['ext_conf']['authentication_methods_allowed'])) {
	$GLOBALS['authentication_type'] = extgetparam( $_SESSION, 'file_mode', $GLOBALS['ext_conf']['authentication_method_default'] );
	if( !in_array($GLOBALS['authentication_type'],$GLOBALS['ext_conf']['authentication_methods_allowed'])) {
		$GLOBALS['authentication_type'] = $_SESSION['file_mode'] = $GLOBALS['ext_conf']['authentication_method_default'];
	}
}

if( file_exists(_EXT_PATH.'/include/authentication/'.$authentication_type.'.php')) {
		require_once(_EXT_PATH.'/include/authentication/'.$authentication_type.'.php');
		$classname = 'ext_'.$authentication_type.'_authentication';
		if( class_exists($classname)) {
			$GLOBALS['auth'] = new $classname();
		}
}
	
//------------------------------------------------------------------------------
function login() {
	global $auth, $authentication_type;
	if( !is_object($auth)) {
		return false;
	}
	if( !empty($GLOBALS['__POST']['username']) || !empty($_SESSION['credentials_'.$authentication_type])) {
		
		if( !empty($GLOBALS['__POST']['username'])) {
			$username = $GLOBALS['__POST']['username'];
			$password = $GLOBALS['__POST']['password'];
		} else {
			$username = $_SESSION['credentials_'.$authentication_type]['username'];
			$password = $_SESSION['credentials_'.$authentication_type]['password'];
		}
		
		$res = $auth->onAuthenticate( array('username' => $username, 'password' => $password) );
		if( !PEAR::isError($res) && $res !== false ) {
			if( @$GLOBALS['__POST']['action'] == 'login' && ext_isXHR() ) {
				session_write_close();
				ext_Result::sendResult('login', true, ext_Lang::msg('actlogin_success') );
			}
			return true;
		} else {
			if( $authentication_type == 'extplorer') {
				// Second attempt to authenticate, since we've switched password hashing algorithm
				// now we fall back to md5 hashing.
				$password = md5((string)$GLOBALS['__POST']['password']);
				$res = $auth->onAuthenticate( array('username' => $username, 'password' => $password) );
				if( !PEAR::isError($res) && $res !== false ) {
					if( @$GLOBALS['__POST']['action'] == 'login' && ext_isXHR() ) {
						session_write_close();
						ext_Result::sendResult('login', true, ext_Lang::msg('actlogin_success') );
					}
					return true;
				}
			}
			if( ext_isXHR() ) {
				$errmsg = PEAR::isError($res) ? $res->getMessage() : ext_Lang::msg( 'actlogin_failure' );
				
				ext_Result::sendResult('login', false, $errmsg );
			}
			return false;
		}
		
	}
	if( ext_isXHR() && $GLOBALS['action'] != 'login') {
		echo '<script type="text/javascript>document.location="'._EXT_URL.'/index.php";</script>';
		exit();
	}
	session_write_close();
	session_id( generate_session_id() );
	session_start();
	// Ask for Login
	$GLOBALS['mainframe']->setPageTitle( ext_Lang::msg('actlogin') );
	$GLOBALS['mainframe']->addcustomheadtag( '
		<script type="text/javascript" src="scripts/extjs3/adapter/ext/ext-base.js"></script>
		<script type="text/javascript" src="scripts/extjs3/ext-all.js"></script>
		<script type="text/javascript" src="'. $GLOBALS['script_name'].'?option=com_extplorer&amp;action=include_javascript&amp;file=functions.js"></script>
		<link rel="stylesheet" href="'. _EXT_URL . '/scripts/extjs3/resources/css/ext-all.css" />
		<link rel="stylesheet" href="scripts/extjs3/resources/css/xtheme-blue.css" />');

			
			?>
		<div style="width: 400px;" id="formContainer">
			<div id="ext_logo" style="text-align:center;">
			<a href="http://extplorer.net" target="_blank">
				<img src="<?php echo _EXT_URL ?>/images/eXtplorer-horizontal2.png" align="middle" alt="eXtplorer Logo" style="border:none;" />
			</a>
			</div>
			<noscript>
				<div style="width:400px;text-align:center;">
					<h1>hiiiii</h1>
					<p style="color:red;">Oh, Javascript is disabled!</p>
					<p>Find out <a target="_blank" href="https://www.google.com/adsense/support/bin/answer.py?hl=en&answer=12654">how you can enable Javascript in your browser.</a>
					</p>
				</div>
			</noscript>
			<div id="adminForm"></div>
			
	</div>
	<script type="text/javascript">
Ext.onReady( function() {
	var simple = new Ext.FormPanel(<?php $auth->onShowLoginForm() ?>);
	
	Ext.get( 'formContainer').center();
	Ext.get( 'formContainer').setTop(100);
	simple.getForm().findField('username').focus();
	Ext.EventManager.onWindowResize( function() { Ext.get( 'formContainer').center();Ext.get( 'formContainer').setTop(100); } );
});
</script><?php
			define( '_LOGIN_REQUIRED', 1 );
		}
	


