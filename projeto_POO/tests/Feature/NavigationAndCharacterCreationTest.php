<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavigationAndCharacterCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_character_creation_page_is_accessible_and_shows_the_form(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/characters/create');

        $response->assertStatus(200);
        $response->assertSee('Criar Novo Personagem');
        $response->assertSee('Gerador de Personagem');
    }

    public function test_dashboard_navigation_includes_the_main_sections(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Personagens');
        $response->assertSee('Itens');
        $response->assertSee('Quests');
    }

    public function test_authenticated_user_can_create_a_character(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/characters', [
            'name' => 'Aragorn',
            'class' => 'Warrior',
            'strength' => 15,
            'dexterity' => 12,
            'constitution' => 14,
            'intelligence' => 8,
            'wisdom' => 10,
            'charisma' => 13,
            'level' => 1,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('characters', [
            'user_id' => $user->id,
            'name' => 'Aragorn',
            'class' => 'Warrior',
        ]);
    }
}
