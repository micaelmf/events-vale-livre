<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('activities') }}">{{ __('Atividades') }}</a>
            → {{ __('Nova') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col col-md-10">
                            <h4>Nova Atividade</h4>
                        </div>
                        <div class="col col-md-2">
                            <a href="{{ route('activities') }}" class="btn btn-sm btn-primary float-right">Voltar</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('activity.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="" placeholder="" required>
                                    <small id="nameHelper" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                        aria-describedby="typeHelper" value="" placeholder="" required>
                                    <small id="typeHelper" class="form-text text-muted">Ex.: Palestra</small>
                                </div>
                                <div class="form-group">
                                    <label for="Description">Descrição</label>
                                    <input type="text" class="form-control" id="Description" name="Description"
                                        aria-describedby="DescriptionHelper" value="" placeholder="" required>
                                    <small id="DescriptionHelper" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="level">Nível</label>
                                    <input type="text" class="form-control" id="level" name="level"
                                        aria-describedby="levelHelper" value="" placeholder="" required>
                                    <small id="levelHelper" class="form-text text-muted">Ex.: Avançado</small>
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duração</label>
                                    <input type="time" class="form-control" id="duration" name="duration"
                                        aria-describedby="durationHelper" value="" placeholder="" required>
                                    <small id="durationHelper" class="form-text text-muted">E.: 00:50</small>
                                </div>
                                <div class="form-group">
                                    <label for="date">Data</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        aria-describedby="dateHelper" value="" placeholder="" required>
                                    <small id="dateHelper" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="observations">Observações</label>
                                    <input type="input" class="form-control" id="observations" name="observations"
                                        aria-describedby="observationsHelper" value="" placeholder="" required>
                                    <small id="observationsHelper" class="form-text text-muted">Ex.: Links, requisitos e etc.</small>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="input" class="form-control" id="status" name="status"
                                        aria-describedby="statusHelper" value="" placeholder="" required>
                                    <small id="statusHelper" class="form-text text-muted">Ex.: Confirmado, Cancelado e etc.</small>
                                </div>
                                <div class="form-group">
                                    <label for="speaker">Palestrante</label>
                                    <select name="speaker_id" id="speaker" class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach ($speakers as $speaker)
                                            <option value="{{ $speaker->id }}">{{ $speaker->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="space">Espaço</label>
                                    <select name="space_id" id="space" class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach ($spaces as $space)
                                            <option value="{{ $space->id }}">{{ $space->name }}</option>
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
