<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * Test if api without token returns 401
     *
     * @return void
     */
    public function testApiTokenNotPresent()
    {
        $response = $this->json('GET', '/api/article');

        $response->assertStatus(401);

    }

}
