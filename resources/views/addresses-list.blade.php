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
                            <h4>Lista de Endereços</h4>
                        </div>
                        <div class="col col-md-2">
                            <a href="{{ route('address.create') }}" class="btn btn-sm btn-primary float-right">Novo</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-12">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col" class="text-right">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($addresses as $address)
                                        <tr>
                                            <th scope="row">{{ $address->id }}</th>
                                            <td>{{ $address->name }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('address.destroy', ['id' => $address->id]) }}"
                                                    class="btn btn-sm btn-outline-danger">
                                                    Excluir
                                                </a>
                                                <a href="{{ route('address.edit', ['id' => $address->id]) }}"
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