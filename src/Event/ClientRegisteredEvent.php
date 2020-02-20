<?php


namespace GreenInvoice\Event;


use GreenInvoice\Dispatcher\IDispatcher;
use GreenInvoice\Dispatcher\Vendors\ExampleResourceDispatcher;

class ClientRegisteredEvent extends BaseEvent
{
	/**
	 * @inheritDoc
	 */
	public function getDispatcher(): IDispatcher
	{
		return new ExampleResourceDispatcher();
	}
}