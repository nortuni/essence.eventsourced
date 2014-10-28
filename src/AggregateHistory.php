<?php

namespace Nortuni\Essence\EventSourced;

interface AggregateHistory extends \Iterator
{
    public function getAggregateId();
}
