<?php

namespace Bitfumes\Multiauth\Tests\Unit;

use Bitfumes\Multiauth\Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Bitfumes\Multiauth\Notifications\RegistrationNotification;

class RegistrationTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_send_register_notification()
    {
        Notification::fake();
        $admin = $this->createAdmin();
        $admin->notify(new RegistrationNotification('fakePassword'));
        Notification::assertSentTo([$admin], RegistrationNotification::class);
    }
}
