<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use StreamAlly\StreamAlly;

class UrlComponentsTest extends TestCase
{
    /**
     * @test
     */
    public function it_adds_components_to_a_url()
    {
        // Given we have a new instance of the API
        $api = new StreamAlly('testing');

        // When we call the addUrlSegment method
        $api->addUrlSegment('shows');

        // Then the url should equal that string
        $this->assertSame('shows', $api->getUrlSegments());
    }

    /**
     * @test
     */
    public function it_adds_multiple_segments_together_to_make_a_uri()
    {
        // Given we have a new instance of the SDK
        $api = new StreamAlly('testing');

        // When we add multiple url components
        $api->addUrlSegment('shows');
        $api->addUrlSegment(1);

        // They should be combined to make a url in the same order
        $this->assertSame('shows/1', $api->getUrlSegments());
    }
}