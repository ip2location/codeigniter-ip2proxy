<?php namespace App\Libraries;

// Web Service Settings
if(!defined('IP2PROXY_API_KEY')) {
	define('IP2PROXY_API_KEY', 'demo');
}

if(!defined('IP2PROXY_PACKAGE')) {
	define('IP2PROXY_PACKAGE', 'PX1');
}

if(!defined('IP2PROXY_USESSL')) {
	define('IP2PROXY_USESSL', false);
}

require_once('ip2proxy/class.IP2Proxy.php');

class IP2Proxy_lib {
	private $database;

	protected static $ip2proxy;

	public function getCountryShort($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$countryShort = self::$ip2proxy->getCountryShort(self::getIP($ip));
		self::$ip2proxy->close();
		return $countryShort;
	}

	public function getCountryLong($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$countryLong = self::$ip2proxy->getCountryLong(self::getIP($ip));
		self::$ip2proxy->close();
		return $countryLong;
	}

	public function getRegion($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$region = self::$ip2proxy->getRegion(self::getIP($ip));
		self::$ip2proxy->close();
		return $region;
	}

	public function getCity($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$city = self::$ip2proxy->getCity(self::getIP($ip));
		self::$ip2proxy->close();
		return $city;
	}

	public function getISP($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$isp = self::$ip2proxy->getISP(self::getIP($ip));
		self::$ip2proxy->close();
		return $isp;
	}

	public function getDomain($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$domain = self::$ip2proxy->getDomain(self::getIP($ip));
		self::$ip2proxy->close();
		return $domain;
	}

	public function getUsageType($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$usageType = self::$ip2proxy->getUsageType(self::getIP($ip));
		self::$ip2proxy->close();
		return $usageType;
	}

	public function getProxyType($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$proxyType = self::$ip2proxy->getProxyType(self::getIP($ip));
		self::$ip2proxy->close();
		return $proxyType;
	}

	public function getASN($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$asn = self::$ip2proxy->getASN(self::getIP($ip));
		self::$ip2proxy->close();
		return $asn;
	}

	public function getAS($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$as = self::$ip2proxy->getAS(self::getIP($ip));
		self::$ip2proxy->close();
		return $as;
	}

	public function getLastSeen($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$lastSeen = self::$ip2proxy->getLastSeen(self::getIP($ip));
		self::$ip2proxy->close();
		return $lastSeen;
	}

	public function getThreat($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$threat = self::$ip2proxy->getThreat(self::getIP($ip));
		self::$ip2proxy->close();
		return $threat;
	}

	public function isProxy($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$isProxy = self::$ip2proxy->isProxy(self::getIP($ip));
		self::$ip2proxy->close();
		return $isProxy;
	}

	public function getAll($ip=NULL) {
		self::$ip2proxy = new \IP2Proxy\Database();
		self::$ip2proxy->open(IP2PROXY_DATABASE, \IP2Proxy\Database::FILE_IO);
		$all = self::$ip2proxy->getAll(self::getIP($ip));
		self::$ip2proxy->close();
		return $all;
	}

	public function getWebService($ip=NULL) {
		$ws = new \IP2Proxy\WebService(IP2PROXY_API_KEY, IP2PROXY_PACKAGE, IP2PROXY_USESSL);
		return $ws->lookup(self::getIP($ip));
	}

	protected function getIP($ip=NULL) {
		return ($ip) ? $ip : $_SERVER['REMOTE_ADDR'];
	}
}
?>
