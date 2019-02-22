<?php

namespace Tests\Browser;

use MyLearnLaravel5x\User;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Bus;

class ExampleTest extends DuskTestCase
{
    /**
     * @throws \Throwable
     */
    public function testBasicExample()
    {
        $this->browse(function(Browser $browser){
            $browser->visit(new HomePage())
                ->assertSee('Laravel');

            $browser->visit(new HomePage())
                ->click('@login-link')
                ->assertSee('Login');

            $browser->visit(new HomePage())
                ->click('@registry-link')
                ->assertSee('Register');
        });
    }

    /**
     * @throws \Throwable
     * @group login_multiple_browser
     * //php artisan dusk --group=login_multiple_browser
     */
    public function testLoginMultipleBrowser()
    {
        $this->browse(function(Browser $first, Browser $second){
            $first->loginAs(User::find(1))
                ->visit('/home')
                ->assertSee('Laravel');

            $second->loginAs(User::find(2))
                ->visit('/home')
                ->assertSee('Laravel');
        });
    }

    /**
     * @group test_database
     */
    public function testDatabase()
    {
        // Make call to application...

        $this->assertDatabaseHas('users', [
            'email' => 'admin@admin.com'
        ]);
    }

}
