<?php

namespace App\Model\Auth;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class JWTauth 
{


	/**
	 * 创建单例模式的句柄
	 * [$instance description]
	 * @var [type]
	 */
 	private static $instance;

 	/**获取单例模式的句柄
 	 * [getInstance description]
 	 * @return [type] [description]
 	 */
 	public static function getInstance()
 	{
 		if (is_null(self::$instance)) {
 			self::$instance = new self();
 		}
 		return self::$instance;
 	}

 	/**私有的构造方法
 	 * [__construct description]
 	 */
 	private function __construct()
 	{

 	}

 	/**私有的克隆方法
 	 * [__clone description]
 	 * @return [type] [description]
 	 */
 	private function __clone()
 	{

 	}


 	private $iss = "http://www.a.com";      //服务端
 	private $aud = "http://www.1810api.com";   //客户端
 	private $uid;							
 	public function setuid($id)			//设置用户id
 	{
 		$this->uid = $id;
 		return $this;
 	}

 	private $salt = 'asdfghjkl';      //盐值

 	private $token;

 	private $decodetoken;



 	/**获取token
 	 * [GetToken description]
 	 */
 	public function GetToken()
 	{
 		$token = (string)$this->token;

 		return $token;
 	}

 	/**设置token
 	 * [SetToken description]
 	 * @param [type] $token [description]
 	 */
 	public function SetToken($token)
 	{
 		$this->token = $token;

 		return $this;
 	}

 	public function encode()
 	{
 		$time = time();
 		$this->token = (new Builder())->setIssuer($this->iss)      //服务签发者   服务端
 								->setAudience($this->aud)    //签发给谁	   客户端
 								->set('udi',$this->uid)		 //设置用户id
 								->setIssuedAt($time)		//设置创建时间
 								->setExpiration($time + 7200)  //设置过期时间
 								->sign(new Sha256,$this->salt)	//设置盐值
 								->getToken();
 		return $this;

 	}

 	/**将token强制转换为字符串
 	 * [decode description]
 	 * @return [type] [description]
 	 */
 	public function decode()
 	{
 		if (!$this->decodetoken) {
 			$this->decodetoken =(new Parser())->parse((string)$this->token);
 		}

 		return $this->decodetoken;
 	}

 	/**验证token数据的有效性
 	 * [validate description]
 	 * @return [type] [description]
 	 */
 	public function validate()
 	{
 		$data = new ValidationData();
 		$data->setIssuer($this->iss);
		$data->setAudience($this->aud);

		return $this->decode()->validate($data);
 	}

 	public function verify()
 	{
 		$res = $this->decode()->verify(new Sha256(),$this->salt);

 		return $res;
 	}
}
