<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eventos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col col-md-12">
                            <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary">Novo</a>
                            <a href="{{ route('event.create') }}" class="btn btn-sm">Leia-me</a>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Edição</th>
                                        <th scope="col">Ano</th>
                                        <th scope="col">Início</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <th scope="row">{{ $event->id }}</th>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ $event->edition }}</td>
                                            <td>{{ $event->year }}</td>
                                            <td>{{ date('Y-m-d', strtotime($event->start_date)) }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('event.destroy', ['id' => $event->id]) }}"
                                                    class="btn btn-sm btn-outline-danger">
                                                    Excluir
                                                </a>
                                                <a href="{{ route('event.edit', ['id' => $event->id]) }}"
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
