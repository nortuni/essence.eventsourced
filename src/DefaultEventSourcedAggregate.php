<?php

namespace Nortuni\Essence\EventSourced;

abstract class DefaultEventSourcedAggregate implements EventSourcedAggregate
{
    /**
     * @var DomainEvent[]
     */
    protected $recordedEvents = [];

    /**
     * @return DomainEvent[]
     */
    public function getRecordedEvents()
    {
        return $this->recordedEvents;
    }

    /**
     * @return void
     */
    public function clearRecordedEvents()
    {
        $this->recordedEvents = [];
    }

    protected function recordThat(DomainEvent $event)
    {
        $this->recordedEvents[] = $event;
        $this->apply($event);
    }

    protected function apply(DomainEvent $event)
    {
        $parts = explode('\\', trim(get_class($event), '\\'));
        $eventType = end($parts);
        $methodName = 'apply' . $eventType;
        if (method_exists($this, $methodName)) {
            $this->$methodName($event);
        }
    }

    /**
     * @param AggregateHistory $aggregateHistory
     */
    protected function applyAggregateHistory(AggregateHistory $aggregateHistory)
    {
        foreach ($aggregateHistory as $event) {
            $this->apply($event);
        }
    }
}
