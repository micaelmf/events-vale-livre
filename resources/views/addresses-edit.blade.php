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
                            <h4>Editando {{ $address->name }}</h4>
                        </div>
                        <div class="col col-md-2">
                            <a href="{{ route('addresses') }}" class="btn btn-sm btn-primary float-right">Voltar</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('address.update', ['id' => $address->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Endereco Completo</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="{{ $address->name }}" placeholder="">
                                    <small id="nameHelper" class="form-text text-muted">Ex.: Universidade Federal do
                                        Ceará</small>
                                </div>
                                <div class="form-group">
                                    <label for="mapLink">Mapa</label>
                                    <input type="text" class="form-control" id="mapLink" name="map"
                                        aria-describedby="mapHelper" value="{{ $address->map }}" placeholder="">
                                    <small id="mapHelper" class="form-text text-muted">Link do Google Maps</small>
                                </div>
                                <div class="form-group">
                                    <label for="street">Rua</label>
                                    <input type="text" class="form-control" id="street" name="street" value="{{ $address->street }}"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input type="text" class="form-control" id="number" name="number" value="{{ $address->number }}"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="district">Bairro</label>
                                    <input type="text" class="form-control" id="district" name="district" value="{{ $address->district }}"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $address->city }}"
                                        placeholder="">
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
