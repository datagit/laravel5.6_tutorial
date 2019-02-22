<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class InsingDotComEventsPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return 'https://www.insing.com/events/';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        //
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
            '@events-search-button' => '#events_search_box > div > a',
        ];
    }
}
