<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\Articles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Articles::class);

        $component->assertStatus(200);
    }
}
