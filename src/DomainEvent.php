<?php

namespace Nortuni\Essence\EventSourced;

interface DomainEvent
{
    public static function fromPayload($payload);
    public function toPayload();
}
