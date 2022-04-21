<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('spaces') }}">{{ __('Espaços') }}</a>
            → {{ __('Novo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('space.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="" placeholder="" required>
                                    <small id="nameHelper" class="form-text text-muted">Ex.: Laboratório 1</small>
                                </div>
                                <div class="form-group">
                                    <label for="referenceLink">Referência</label>
                                    <input type="text" class="form-control" id="referenceLink" name="reference"
                                        aria-describedby="referenceHelper" value="" placeholder="" required>
                                    <small id="referenceHelper" class="form-text text-muted">Ex.: Bloco 1</small>
                                </div>
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <select name="address_id" id="address" class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach ($addresses as $address)
                                            <option value="{{ $address->id }}">{{ $address->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button name="clear" class="btn btn-danger">Limpar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
