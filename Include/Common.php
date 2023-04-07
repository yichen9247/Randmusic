<?php
/* 
 * 应用公共文件（暂时不用）
 */


/*
 * 抛出JSON格式错误码
 * @param int $code 状态码
 * @param string $msg 状态信息
 */
function jsonError($code, $msg)
{
	die(json_encode(array(
		'code' => $code,
		'msg' => $msg
	), 320 | JSON_PRETTY_PRINT));
}

/*
 * 数组转JSON
 * @param int $code 状态码
 * @param string $msg 状态信息
 * @param string/array $data 数据
 */
function json($code, $msg, $data)
{
	die(json_encode(array(
		'code' => $code,
		'msg' => $msg,
		'data' => $data
	), 320 | JSON_PRETTY_PRINT));
}

/*
 * 判断用户是否登录到后台
 *	@return bool 是否登录
 */
function isAdmin()
{
	session_start();
	$apikey = @include __DIR__ . '/../Core/Config/apikey.php';
	if ($_SESSION['login'] == 'admin') {
		return true;
	} else if($_GET['apikey'] != '' && $_GET['apikey'] == $apikey) {
		return true;
	} else {
		return false;
	}
}

/*
 * 清除登录session（退出登录）
 *	@return bool 清除是否成功
 */
function clearAdmin()
{
	session_start();
	if ($_SESSION['login'] == 'admin') {
		unset($_SESSION['login']);
		return true;
	} else {
		return false;
	}
}

/*
 * 添加访问记录
 * @return bool 添加是否成功
 */
function addAccess()
{
	require __CORE_DIR__ . '/Database/connect.php';

	$host = $_SERVER["HTTP_HOST"] . $_SERVER["SCRIPT_NAME"] . '?' . $_SERVER['QUERY_STRING'];
	$user_agent = $_SERVER["HTTP_USER_AGENT"];
	$protocol = $_SERVER["SERVER_PROTOCOL"];
	$method = $_SERVER["REQUEST_METHOD"];
	$ip = $_SERVER["REMOTE_ADDR"];
	$time = $_SERVER["REQUEST_TIME"];
	$result = $db->query("INSERT INTO `randmusic`(`id`, `host`, `user_agent`, `protocol`, `method`, `ip`, `time`) VALUES (NULL,'{$host}','{$user_agent}','{$protocol}','{$method}','{$ip}','{$time}');");
	if ($result) {
		return true;
	} else {
		return false;
	}
}

/*
 * 检查字符串是否为邮箱
 * @param string $email
 * @return bool
 */
function checkEmail($email)
{
	$result = trim($email);
	if (filter_var($result, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}

/*
 * 检测域名是否授权
 * @param $domain string 域名
 * @return bool true授权，false未授权
 */
function domainAuth($domain)
{
    return true;
}

/*
 * 获取用户的真实ip
 * @return string 用户IP
 */
function getUserIp()
{
	$ip = false;
	if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if ($ip) {
			array_unshift($ips, $ip);
			$ip = FALSE;
		}
		for ($i = 0; $i < count($ips); $i++) {
			if (!mb_eregi("^(10│172.16│192.168).", $ips[$i])) {
				$ip = $ips[$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
/*
 * 封装Curl请求
 * @param string $url 地址
 * @param string $method 方法
 * @param array $headers 头
 * @param array $params 参数
 */
function curl($url, $method, $headers, $params)
{
	if (is_array($params)) {
		$requestString = http_build_query($params);
	} else {
		$requestString = $params ?: '';
	}
	if (empty($headers)) {
		$headers = array('Content-type: text/json');
	} elseif (!is_array($headers)) {
		parse_str($headers, $headers);
	}
	// setting the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	// setting the POST FIELD to curl
	switch ($method) {
		case "GET":
			curl_setopt($ch, CURLOPT_HTTPGET, 1);
			break;
		case "POST":
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $requestString);
			break;
		case "PUT":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $requestString);
			break;
		case "DELETE":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $requestString);
			break;
	}
	// getting response from server
	$response = curl_exec($ch);

	//close the connection
	curl_close($ch);

	//return the response
	if (stristr($response, 'HTTP 404') || $response == '') {
		return array('Error' => '请求错误');
	}
	return $response;
}
