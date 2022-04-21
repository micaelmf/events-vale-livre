<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('addresses') }}">{{ __('Endereços') }}</a>
            → {{ __('Novo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('address.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Endereco Completo</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="" placeholder="" required>
                                    <small id="nameHelper" class="form-text text-muted">Ex.: Universidade Federal do
                                        Ceará</small>
                                </div>
                                <div class="form-group">
                                    <label for="mapLink">Mapa</label>
                                    <input type="text" class="form-control" id="mapLink" name="map"
                                        aria-describedby="mapHelper" value="" placeholder="">
                                    <small id="mapHelper" class="form-text text-muted">Link do Google Maps</small>
                                </div>
                                <div class="form-group">
                                    <label for="street">Rua</label>
                                    <input type="text" class="form-control" id="street" name="street" value=""
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input type="text" class="form-control" id="number" name="number" value=""
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="district">Bairro</label>
                                    <input type="text" class="form-control" id="district" name="district" value=""
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" id="city" name="city" value=""
                                        placeholder="" required>
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
