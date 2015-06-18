<?php
/**
 * @package nxcSaferPay
 * @class   nxcSaferPayRedirectGateway
 * @author  Serhey Dolgushev <serhey.dolgushev@nxc.no>
 * @date    27 Apr 2010
 **/

class nxcSaferPayRedirectGateway extends eZRedirectGateway {

	const TYPE_SAFERPAY = 'saferpay';

	public function __construct() {
		$this->logger = eZPaymentLogger::CreateForAdd( 'var/log/SaferPayType.log' );
		$this->logger->writeTimedString( 'nxcSaferPayRedirectGateway::__construct()' );
	}

	public function createPaymentObject( $processID, $orderID ) {
		$this->logger->writeTimedString( 'nxcSaferPayRedirectGateway::createPaymentObject' );
		return eZPaymentObject::createNew( $processID, $orderID, self::TYPE_SAFERPAY );
	}

	public function createRedirectionUrl( $process ) {
		$this->logger->writeTimedString( 'nxcSaferPayRedirectGateway::createRedirectionUrl' );

		$processParams = $process->attribute( 'parameter_list' );
		$order = eZOrder::fetch( $processParams['order_id'] );

		$transaction = new nxcSaferPayTransaction(
			array(
				'amount'            => $order->attribute( 'total_inc_vat' ) * 100,
				'order_id'          => $order->attribute( 'id' ),
				'order_description' => $this->createShortDescription( $order, 1500 ),
				'user_id'           => $order->attribute( 'user_id' ),
				'user_notify_email' => $order->attribute( 'email' )
			)
		);
		$transaction->store();

		return $transaction->attribute( 'pay_url' );
	}
}
?>