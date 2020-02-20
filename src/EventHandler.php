<?php


namespace GreenInvoice;


use GreenInvoice\Event\IEvent;
use GreenInvoice\EventDispatcher\IEventDispatcher;
use GreenInvoice\EventQueue\EventToDispatcherTuple;
use GreenInvoice\EventQueue\IEventQueue;

/**
 * Class EventHandler
 * @package GreenInvoice
 */
class EventHandler implements IEventHandler
{
	/**
	 * @var IEventQueue
	 */
	private $eventQueue;

	/**\
	 * @var IEventDispatcher
	 */
	private $eventDispatcher;

	/**
	 * EventHandler constructor.
	 * @param IEventQueue $eventQueue
	 * @param IEventDispatcher $eventDispatcher
	 */
	public function __construct(IEventQueue $eventQueue, IEventDispatcher $eventDispatcher)
	{
		$this->eventQueue      = $eventQueue;
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * @param IEvent $event
	 */
	public function track(IEvent $event): void
	{
		if ($event->pushImmediate()) {
			$this->flushImmediate($event);
		} else {
			$this->eventQueue->add($event);
		}
	}

	/**
	 *
	 */
	public function flush(): void
	{
		foreach ($this->eventQueue->getQueue() as $eventDispatcherTuple) {
			$this->eventDispatcher->dispatch($eventDispatcherTuple);
		}

		$this->eventQueue->empty();
	}

	/**
	 * @param IEvent $event
	 */
	public function flushImmediate(IEvent $event): void
	{
		$this->eventDispatcher->dispatch(new EventToDispatcherTuple($event));
	}
}