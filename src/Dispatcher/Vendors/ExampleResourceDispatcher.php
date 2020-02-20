<?php


namespace GreenInvoice\Dispatcher\Vendors;


use GreenInvoice\Dispatcher\IDispatcher;

class ExampleResourceDispatcher implements IDispatcher
{
	public function dispatch(array $message): void
	{
		echo json_encode($message);
	}
}