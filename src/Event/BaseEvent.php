<?php


namespace GreenInvoice\Event;


abstract class BaseEvent implements IEvent
{
	/**
	 * @return array
	 */
	public function toMessage(): array
	{
		$fieldsToExtract = (array) $this;
		$fieldsToReturn = [];
		foreach ($fieldsToExtract as $key => $value) {
			if(strpos($key, self::class) === 0) {
				continue;
			}

			if(strpos($key, '*') === 0) {
				$fieldsToReturn[substr($key, 1)] = $value;
			} else {
				$fieldsToReturn[$key] = $value;
			}
		}

		return $fieldsToReturn;
	}

	public function pushImmediate(): bool
	{
		return false;
	}
}