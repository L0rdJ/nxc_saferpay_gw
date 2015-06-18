<?php
/**
 * @package nxcSaferPay
 * @author  Serhey Dolgushev <serhey.dolgushev@nxc.no>
 * @date    27 Apr 2010
 **/

class nxc_saferpay_gwSettings extends nxcExtensionSettings {

	public $defaultOrder = 25;
	public $dependencies = array( 'nxc_saferpay' );

	public function activate() {}

	public function deactivate() {}
}
?>