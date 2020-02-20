<?php


namespace GreenInvoice\Dispatcher;


interface IDispatcher
{
	/**
	 * @param array $message
	 */
	public function dispatch(array $message): void;
}