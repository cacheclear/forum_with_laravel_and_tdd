<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {
        //Arrange
        $this->actingAs(factory(User::class)->create());

        $thread = factory(Thread::class)->make();

        //Act
        $this->post('/threads', $thread->toArray());

        //Assert
        $this->get($thread->path());

        $this->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
