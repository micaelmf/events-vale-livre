<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col col-md-2">
                            <a href="{{ route('space.create') }}" class="btn btn-sm btn-primary">Novo</a>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col col-md-12">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Referência</th>
                                        <th scope="col" class="text-right">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($spaces as $space)
                                        <tr>
                                            <th scope="row">{{ $space->id }}</th>
                                            <td>{{ $space->name }}</td>
                                            <td>{{ $space->reference }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('space.destroy', ['id' => $space->id]) }}"
                                                    class="btn btn-sm btn-outline-danger">
                                                    Excluir
                                                </a>
                                                <a href="{{ route('space.edit', ['id' => $space->id]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    Editar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>