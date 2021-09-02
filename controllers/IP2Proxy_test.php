<?php
define('IP2PROXY_DATABASE', 'LOCATION OF YOUR BIN FILE');

class IP2Proxy_test extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('ip2proxy_lib');
    }

    public function index() {
        $ipx = new IP2Proxy_lib();

        // BIN Database
        $countryCode = $ipx->getCountryShort('1.0.241.135');

        echo '<p>Country code for 1.0.241.135: ' . $countryCode . '</p>';

        echo '
        <div>You can download the latest BIN database at
            <ul>
                <li><a href="https://lite.ip2location.com">IP2Proxy LITE BIN Database (Free)</a></li>
                <li><a href="https://www.ip2location.com/proxy-database">IP2Proxy BIN Database (Comprehensive)</a></li>
            </ul>
        </div>';

        // Web Service
        echo '<pre>';
        print_r ($ipx->getWebService('1.0.241.135'));
        echo '</pre>';
    }
}

