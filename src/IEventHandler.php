<?php


namespace GreenInvoice;


use GreenInvoice\Event\IEvent;

interface IEventHandler
{
	/**
	 * @param IEvent $event
	 */
	public function track(IEvent $event): void;

	public function flush(): void;

	/**
	 * @param IEvent $event
	 */
	public function flushImmediate(IEvent $event): void;
}