<?php

namespace MyLearnLaravel5x\Console\Commands;

use Illuminate\Console\Command;
use MyLearnLaravel5x\DripEmailer;
use MyLearnLaravel5x\User;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user} {--queue=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send drip e-mail to a user';

    /**
     * The trip e-mail service
     *
     * @var DripEmailer
     */
    protected $drip;

    /**
     * Create a new command instance.
     *
     * @param DripEmailer $drip
     */
    public function __construct(DripEmailer $drip)
    {
        parent::__construct();
        $this->drip = $drip;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->drip->send(User::find($this->argument('user')), $this->option('queue'));
    }
}
