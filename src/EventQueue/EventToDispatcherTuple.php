<?php


namespace GreenInvoice\EventQueue;


use GreenInvoice\Dispatcher\IDispatcher;
use GreenInvoice\Event\IEvent;

class EventToDispatcherTuple
{
	/**
	 * @var array
	 */
	private $eventMessage;

	/**
	 * @var IDispatcher
	 */
	private $eventDispatcher;

	/**
	 * EventToDispatcherTuple constructor.
	 * @param IEvent $event
	 */
	public function __construct(IEvent $event)
	{
		$this->eventMessage = $event->toMessage();
		$this->eventDispatcher = $event->getDispatcher();
	}

	/**
	 * @return array
	 */
	public function getEventMessage(): array
	{
		return $this->eventMessage;
	}

	/**
	 * @return IDispatcher
	 */
	public function getEventDispatcher(): IDispatcher
	{
		return $this->eventDispatcher;
	}
}