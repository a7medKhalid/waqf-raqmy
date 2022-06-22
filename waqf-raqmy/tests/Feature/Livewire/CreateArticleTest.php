<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CreateArticle;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(CreateArticle::class);

        $component->assertStatus(200);
    }

    /** @test */

    public function can_create_article()

    {

        $user = User::factory()->create();

        $this->actingAs($user);



        Livewire::test(CreateArticle::class)

            ->set(['title' => 'عنوان', 'body' => 'محتوى'])

            ->call('create');



        $this->assertTrue(Article::where(['title' => 'عنوان', 'body' => 'محتوى', 'user_id' => $user->id])->exists());

    }


}
