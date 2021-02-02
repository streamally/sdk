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

    public function activate()
    {
        return $this->addUrlSegment('activate')->post();
    }

    public function clear()
    {
        return $this->addUrlSegment('clear')->post();
    }
}