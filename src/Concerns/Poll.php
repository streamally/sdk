<?php

namespace StreamAlly\Concerns;

trait Poll
{
    public function polls($id = null)
    {
        $this->addUrlSegment('polls');
        $this->addUrlSegment($id);

        return $this;
    }
}