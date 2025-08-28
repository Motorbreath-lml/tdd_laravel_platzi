<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Repository;

class RepositoryControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_guest(): void
    {
        $this->get('/repositories')->assertRedirect('/login');  //index
        $this->get('/repositories/1')->assertRedirect('/login');    //show
        $this->get('/repositories/1/edit')->assertRedirect('/login');   //edit
        $this->put('/repositories/1')->assertRedirect('/login');    //update
        $this->delete('/repositories/2')->assertRedirect('/login');   //destroy
        $this->get('/repositories/create')->assertRedirect('/login');  //create
        $this->post('/repositories',[])->assertRedirect('/login');  //store
    }

    // verifica que el usuario autenticado solo vea sus propios repositorios
    public function test_index_empty(): void
    {
        Repository::factory()->create(); // Crear un repositorio en la base de datos, pero no asociado al usuario autenticado.
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/repositories')
            ->assertStatus(200)
            ->assertSee('No hay repositorios para mostrar');
    }

    public function test_index_with_data(): void
    {
        $user = User::factory()->create();
        $repositories = Repository::factory()->count(3)->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->get('/repositories')
            ->assertStatus(200)
            ->assertSee($repositories[0]->url)
            ->assertSee($repositories[1]->url)
            ->assertSee($repositories[2]->url)
            ->assertSee($repositories[0]->id)
            ->assertSee($repositories[1]->id)
            ->assertSee($repositories[2]->id);
    }

    // Verifica que la ruta para crear un nuevo repositorio esté accesible
    public function test_create(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get('/repositories/create') // Rubrica para crear un nuevo repositorio
            ->assertStatus(200); // Verifica que la respuesta es exitosa
    }

    // guarda un repositorio
    public function test_store(): void
    {
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text(100),
        ];

        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/repositories', $data)
            ->assertRedirect('/repositories');

        $this->assertDatabaseHas('repositories', $data);
    } 

    public function test_update(): void
    {
        $user = User::factory()->create();
        $repository = Repository::factory()->create(['user_id' => $user->id]);
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text(100),
        ];

        $this->actingAs($user)
            ->put("/repositories/$repository->id", $data)
            ->assertRedirect("/repositories/$repository->id/edit");

        $this->assertDatabaseHas('repositories', $data);
    }

    // Validacion de store y update
    public function test_validate_store(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/repositories', []) // datos vacíos
            ->assertStatus(302) // Redirección a la página anterior,  de vuelta a la página anterior (normalmente con back()), Esto genera un 302.
            ->assertSessionHasErrors(['url', 'description']); // Comprueba que en la sesión actual existen mensajes de error asociados a los campos url y description.
    } 

    public function test_validate_update(): void
    {
        $repository = Repository::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->put("/repositories/$repository->id", []) // datos vacíos
            ->assertStatus(302) // Redirección a la página anterior
            ->assertSessionHasErrors(['url', 'description']); // Comprueba que en la sesión actual existen mensajes de error asociados a los campos url y description.
    }

    //Elimiinar repositorio
    public function test_destroy(): void
    {
        $user = User::factory()->create();
        $repository = Repository::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->delete("/repositories/$repository->id") // Rubrica para eliminar un repositorio
            ->assertRedirect('/repositories'); // Redirige a la lista de repositorios

        $this->assertDatabaseMissing('repositories', [
            'id' => $repository->id,
            'url' => $repository->url,
            'description' => $repository->description,
        ]);
    }

    public function test_update_policy(): void
    {
        $user = User::factory()->create(); // Usuario que intentará actualizar el repositorio
        $repository = Repository::factory()->create(); // Repositorio creado por otro usuario
        $data = [
            'url' => $this->faker->url,
            'description' => $this->faker->text(100),
        ];

        $this->actingAs($user)
            ->put("/repositories/$repository->id", $data)
            ->assertStatus(403); // Verifica que el usuario no tiene permiso para actualizar el repositorio
    }

    public function test_destroy_policy(): void
    {
        $user = User::factory()->create(); // Usuario que intentará eliminar el repositorio
        $repository = Repository::factory()->create(); // Repositorio creado por otro usuario

        $this->actingAs($user)
            ->delete("/repositories/$repository->id")
            ->assertStatus(403); // Verifica que el usuario no tiene permiso para eliminar el repositorio
    }

    //Test para mostrar un repositorio específico
    public function test_show(): void
    {
        $user = User::factory()->create();
        $repository = Repository::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->get("/repositories/$repository->id") // Rubrica para mostrar un repositorio específico   
            ->assertStatus(200); // Verifica que la respuesta es exitosa
    }

    public function test_show_policy(): void
    {
        $user = User::factory()->create(); 
        $repository = Repository::factory()->create(); // Repositorio creado por otro usuario

        $this->actingAs($user)
            ->get("/repositories/$repository->id")
            ->assertStatus(403); // Verifica que el usuario no tiene permiso para ver el repositorio
    }

    // Test para editar un repositorio específico, es importante vosualizar los datos del repositorio en la vista de edición
    public function test_edit(): void
    {
        $user = User::factory()->create();
        $repository = Repository::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user)
            ->get("/repositories/$repository->id/edit") // Rubrica para editar un repositorio específico
            ->assertStatus(200) // Verifica que la respuesta es exitosa
            ->assertSee($repository->url) // Verifica que la URL del repositorio se muestra en la vista de edición
            ->assertSee($repository->description); // Verifica que la descripción del repositorio se muestra en la vista de edición
    }    

    public function test_edit_policy(): void
    {
        $user = User::factory()->create(); 
        $repository = Repository::factory()->create(); // Repositorio creado por otro usuario

        $this->actingAs($user)
            ->get("/repositories/$repository->id/edit")
            ->assertStatus(403); // Verifica que el usuario no tiene permiso para editar el repositorio
    }
}
