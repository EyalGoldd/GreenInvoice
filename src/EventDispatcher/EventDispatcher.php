<?php


namespace GreenInvoice\EventDispatcher;


use GreenInvoice\EventQueue\EventToDispatcherTuple;

class EventDispatcher implements IEventDispatcher
{
	public function dispatch(EventToDispatcherTuple $eventToDispatcherTuple): void
	{
		$eventToDispatcherTuple->getEventDispatcher()->dispatch($eventToDispatcherTuple->getEventMessage());
	}
}