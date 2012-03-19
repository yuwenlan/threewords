<?php 
/**
* 
*/
include ROOT_PATH . "/Api/Sina/saetv2.ex.class.php";
class Api extends SiteAction {
	protected $sina = null;//调用新浪接口变量
	protected $sina_config = null;//获得新浪配置文件数据
	function __construct() {
		//获得config
		$this->sina_config = $this->config->sina;
		if (isset($_SESSION['user']['token'])) {
			$this->sina = new SaeTClientV2( $this->sina_config['WB_AKEY'] , $this->sina_config['WB_SKEY'] , $_SESSION['user']['token']['access_token'] );
		}
	}

	#跳转新浪绑定
	public function sina_bind() {
		$o = new SaeTOAuthV2( $this->sina_config['WB_AKEY'] , $this->sina_config['WB_SKEY'] );
		$code_url = $o->getAuthorizeURL( $this->sina_config['WB_CALLBACK_URL'] );
		$this->redirect($code_url);
	}

	#获得新浪Token
	public function sinaToken() {
		$o = new SaeTOAuthV2( $this->sina_config['WB_AKEY'] , $this->sina_config['WB_SKEY'] );

		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = $this->sina_config['WB_CALLBACK_URL'];
			$token = $o->getAccessToken( 'code', $keys );
		}

		if ($token) {
			$_SESSION['user']['token'] = $token;
			$this->redirect('/');
		} else {
			echo '授权失败，请重新验证';
		}
	}
}