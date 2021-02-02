<?php

namespace StreamAlly\Concerns;

trait Show
{
    public function shows($id = null)
    {
        $this->addUrlSegment('shows');
        $this->addUrlSegment($id);

        return $this;
    }
}