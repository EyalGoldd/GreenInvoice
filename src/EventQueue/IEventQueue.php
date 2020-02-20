<?php


namespace GreenInvoice\EventQueue;


use GreenInvoice\Event\IEvent;

interface IEventQueue
{
	/**
	 * @param IEvent $event
	 */
	public function add(IEvent $event): void;

	/**
	 * @return EventToDispatcherTuple[]
	 */
	public function getQueue(): array;

	public function empty(): void;
}