<?php

namespace Nortuni\Essence\EventSourced;

use Nortuni\Essence\Aggregate;

interface EventSourcedAggregate extends Aggregate
{
    /**
     * @param AggregateHistory $aggregateHistory
     * @return Aggregate
     */
    public static function reconstitute(AggregateHistory $aggregateHistory);

    /**
     * @return DomainEvent[]
     */
    public function getRecordedEvents();

    /**
     * @return void
     */
    public function clearRecordedEvents();
} 