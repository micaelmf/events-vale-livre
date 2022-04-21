<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('sponsors') }}">{{ __('Patrocinadores') }}</a>
            → {{ __('Novo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('sponsor.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="{{ old('name') }}" placeholder=""
                                        required>
                                    <small id="nameHelper" class="form-text text-muted">Ex.: Comunidade Vale Livre</small>
                                    @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bio">Sobre</label>
                                    <textarea class="form-control" name="bio" id="bio" rows="5">{{ old('about') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="image">Logomarca</label>
                                    <input type="file" class="form-control-file" id="image" name="image"
                                        aria-describedby="imageHelper" value="" required>
                                    <small id="imageHelper" class="form-text text-muted">Faça as edições necessárias
                                        antes do envio. Tamanho máximo de 2MB</small>
                                    @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    <img id="preview-image-before-upload" src="https://user-images.githubusercontent.com/11250/39013954-f5091c3a-43e6-11e8-9cac-37cf8e8c8e4e.jpg" style="width: 100px; height: 100px; object-fit: cover">
                                </div>

                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                        aria-describedby="nameHelper" value="{{ old('type') }}" placeholder=""
                                        required>
                                    <small id="typeHelper" class="form-text text-muted">Ex.: Realização, Apoio, Diamante, Outro, Prata, etc</small>
                                    @error('type')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
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
