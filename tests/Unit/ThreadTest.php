<?php

namespace Tests\Unit;

use App\Thread;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public $thread;

    public function setUp()
    {
        parent::setUp();

        //Arrange
        $this->thread = factory(Thread::class)->create();
    }

    /** @test */
    public function a_thread_has_replies()
    {
        //Act
        $replies = $this->thread->replies;
        //Assert
        $this->assertInstanceOf(Collection::class, $replies);
    }

    /** @test */
    public function a_thread_has_a_creator()
    {
        //Act
        $owner = $this->thread->owner;
        //Assert
        $this->assertInstanceOf(User::class, $owner);
    }
}
