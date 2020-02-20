<?php


namespace GreenInvoice\EventDispatcher;


use GreenInvoice\EventQueue\EventToDispatcherTuple;

interface IEventDispatcher
{
	public function dispatch(EventToDispatcherTuple $eventToDispatcherTuple): void;
}