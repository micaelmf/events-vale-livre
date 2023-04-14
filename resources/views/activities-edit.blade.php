<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('activities') }}">{{ __('Atividades') }}</a>
            → {{ __('Editar') }}
            → {{ old('name') ?? $activity->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('activity.update', ['id' => $activity->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="{{ $activity->name }}" placeholder="" required>
                                    <small id="nameHelper" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                        aria-describedby="typeHelper" value="{{ $activity->type }}" placeholder="" required>
                                    <small id="typeHelper" class="form-text text-muted">Ex.: Palestra</small>
                                </div>
                                <div class="form-group">
                                    <label for="description">Descrição</label>
                                    <textarea class="form-control" id="description" name="description" aria-describedby="descriptionHelper" rows="4" required>{{ $activity->description }}</textarea>
                                    <small id="descriptionHelper" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="level">Nível</label>
                                    <input type="text" class="form-control" id="level" name="level"
                                        aria-describedby="levelHelper" value="{{ $activity->level }}" placeholder="" required>
                                    <small id="levelHelper" class="form-text text-muted">Ex.: Avançado</small>
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duração</label>
                                    <input type="time" class="form-control" id="duration" name="duration"
                                        aria-describedby="durationHelper" value="{{ $activity->duration }}" placeholder="" required>
                                    <small id="durationHelper" class="form-text text-muted">E.: 00:50</small>
                                </div>
                                <div class="form-group">
                                    <label for="date">Data e Hora</label>
                                    <input type="datetime-local" class="form-control" id="date" name="date"
                                        aria-describedby="dateHelper" value="{{ date('Y-m-d\TH:i:s', strtotime($activity->date)) }}" placeholder="" required>
                                    <small id="dateHelper" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="observations">Observações</label>
                                    <textarea class="form-control" id="observations" name="observations" aria-describedby="observationsHelper" rows="4">{{ $activity->observations }}</textarea>
                                    <small id="observationsHelper" class="form-text text-muted">Ex.: Links, requisitos e etc.</small>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="input" class="form-control" id="status" name="status"
                                        aria-describedby="statusHelper" value="{{ $activity->status }}" placeholder="" required>
                                    <small id="statusHelper" class="form-text text-muted">Ex.: Confirmado, Cancelado e etc.</small>
                                </div>
                                <div class="form-group">
                                    <label for="speaker">Palestrante</label>
                                    <select name="speaker_id" id="speaker" class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach ($speakers as $speaker)
                                            <option value="{{ $speaker->id }}" {{ $speaker->id == $activity->speaker_id ? 'selected' : '' }}>{{ $speaker->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="space">Espaço</label>
                                    <select name="space_id" id="space" class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach ($spaces as $space)
                                            <option value="{{ $space->id }}" {{ $space->id == $activity->space_id ? 'selected' : '' }}>{{ $space->name }}</option>
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
