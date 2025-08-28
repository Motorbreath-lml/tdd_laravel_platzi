<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryRequest;
use App\Models\Repository;
use Illuminate\Support\Facades\Gate; // Importing Gate for authorization checks (policy checks)
use Illuminate\Http\Request;

class RepositoryController extends Controller
{

    public function index(Request $request){
        return view('repositories.index', [
            'repositories' => $request->user()->repositories()->get(),
        ]);
    }

    public function create()
    {
        return view('repositories.create');
    }

    public function show(Request $request, Repository $repository)
    {
        if($repository->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('repositories.show', [
            'repository' => $repository,
        ]);
    }

    public function edit(Request $request, Repository $repository)
    {
        if($repository->user_id !== $request->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('repositories.edit', [
            'repository' => $repository,
        ]);
    }


    // Del request se traerá el modelo de User y de ahi el modelo de Repositories, entonces registraremos el repositorio y redireccionaremos.
    public function store(RepositoryRequest $request)
    {
        // Validación de los datos del request, antes de refactorizar a RepositoryRequest
        // $request->validate([
        //     'url' => 'required|url',
        //     'description' => 'required|string|max:255',
        // ]);

        // Validación usando RepositoryRequest

        $request->user()->repositories()->create(
            $request->all()
        );
        return redirect()->route('repositories.index');
    }

    public function update(RepositoryRequest $request, Repository $repository)
    {
        // Validación de permisos usando RepositoryPolicy en Laravel 12, Con Facade Gate
        Gate::authorize('update', $repository);

        // Validación de los datos del request, antes de refactorizar a RepositoryRequest
        // $request->validate([
        //     'url' => 'required|url',
        //     'description' => 'required|string|max:255',
        // ]);

        // Validando que el usuario tiene permiso para actualizar el repositorio, antes de refactorizar a RepositoryPolicy
        // if($repository->user_id !== $request->user()->id) {
        //     abort(403, 'Unauthorized action.');
        // }

        $repository->update($request->all());
        return redirect()->route('repositories.edit', $repository);
    }

    public function destroy(Request $request, Repository $repository)
    {
        // Validación de permisos usando RepositoryPolicy
        //Laravel 12 usando cannot method del modelo de User, checa la polycy RepositoryPolicy
        if($request->user()->cannot('delete', $repository)) {
            abort(403, 'Unauthorized action.');
        }

        // Laravel 9
        // $this->authorize('pass', $repository);

        // Validacion antes de refactorizar a RepositoryPolicy
        // if($repository->user_id !== $request->user()->id) {
        //     abort(403, 'Unauthorized action.');
        // }

        $repository->delete();
        return redirect()->route('repositories.index');
    }
}
