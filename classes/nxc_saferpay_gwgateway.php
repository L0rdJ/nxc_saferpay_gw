<?php
/**
 * @package nxcSaferPay
 * @author  Serhey Dolgushev <serhey.dolgushev@nxc.no>
 * @date    27 Apr 2010
 **/

eZPaymentGatewayType::registerGateway( nxcSaferPayRedirectGateway::TYPE_SAFERPAY, 'nxcSaferPayRedirectGateway', 'SaferPay' );
?>