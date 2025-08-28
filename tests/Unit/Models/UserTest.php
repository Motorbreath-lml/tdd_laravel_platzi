<?php

namespace Tests\Unit\Models;

// use PHPUnit\Framework\TestCase;  // Se usa TestCase de Laravel no PHPUnit directamente
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Revisar que los respositorios de un usuario sean de la clase collection
     */
    public function test_has_many_repositories(): void
    {
        $user = new User();
        $this->assertInstanceOf(Collection::class, $user->repositories);
    }
}
