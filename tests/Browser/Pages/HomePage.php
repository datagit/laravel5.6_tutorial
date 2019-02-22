<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class HomePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
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
            '@login-link' => 'div.flex-center.position-ref.full-height > div.top-right.links > a:nth-child(1)',
            '@registry-link' => 'div.flex-center.position-ref.full-height > div.top-right.links > a:nth-child(2)',
        ];
    }
}
