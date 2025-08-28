<?php

// Comentario de ChatGPT: Si quieres probar relaciones y usar factories, debe ser un Feature Test y usar Tests\TestCase. En otras palabras el test de un feature no un unit test.

namespace Tests\Unit\Models;

use App\Models\Repository;
use App\Models\User;
// use PHPUnit\Framework\TestCase; // No se usa TestCase de PHPUnit directamente, ya que Laravel proporciona su propia clase base de prueba
use Tests\TestCase; // Usar la clase TestCase de Laravel, Los Unit Tests no cargan Laravel completo, por eso no funcionan facades ni factories ahí.
use Illuminate\Foundation\Testing\RefreshDatabase;

class RepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Revisar que un repositorio le pertenezca a un usuario.
     */
    public function test_belongs_to_user(): void
    {
        $repository = Repository::factory()->create(); // Crear un repositorio usando la fábrica, datos de prueba
        $this->assertInstanceOf(User::class, $repository->user); // Verificar que el repositorio tenga un usuario asociado
    }
}
