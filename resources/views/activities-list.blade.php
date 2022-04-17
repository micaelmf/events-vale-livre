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
                        <div class="col col-md-10">
                            <h4>Lista de Atividades</h4>
                        </div>
                        <div class="col col-md-2">
                            <a href="{{ route('activity.create') }}" class="btn btn-sm btn-primary float-right">Novo</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        {{-- <th scope="col">Palestrante</th> --}}
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Duração</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-right">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <th scope="row">{{ $activity->id }}</th>
                                            <td>{{ $activity->name }}</td>
                                            {{-- <td>{{ $activity->speaker->name }}</td> --}}
                                            <td>{{ $activity->type }}</td>
                                            <td>{{ $activity->duration }}</td>
                                            <td>{{ $activity->status }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('activity.destroy', ['id' => $activity->id]) }}"
                                                    class="btn btn-sm btn-outline-danger">
                                                    Excluir
                                                </a>
                                                <a href="{{ route('activity.edit', ['id' => $activity->id]) }}"
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