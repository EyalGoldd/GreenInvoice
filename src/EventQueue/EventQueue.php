<?php


namespace GreenInvoice\EventQueue;


use GreenInvoice\Event\IEvent;

class EventQueue implements IEventQueue
{
	/**
	 * @var EventToDispatcherTuple[]
	 */
	private $queue;

	public function __construct()
	{
		$this->queue = [];
	}

	public function add(IEvent $event): void
	{
		$this->queue[] = new EventToDispatcherTuple($event);
	}

	/**
	 * @inheritDoc
	 */
	public function getQueue(): array
	{
		return $this->queue;
	}

	public function empty(): void
	{
		$this->queue = [];
	}
}