<?php

namespace StreamAlly\Concerns;

trait Message
{
    public function messages($id = null)
    {
        $this->addUrlSegment('messages');
        $this->addUrlSegment($id);

        return $this;
    }
}
