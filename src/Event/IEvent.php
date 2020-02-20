<?php


namespace GreenInvoice\Event;


use GreenInvoice\Dispatcher\IDispatcher;

interface IEvent
{
	/**
	 * @return IDispatcher
	 */
	public function getDispatcher(): IDispatcher;

	/**
	 * @return bool
	 */
	public function pushImmediate(): bool;
}