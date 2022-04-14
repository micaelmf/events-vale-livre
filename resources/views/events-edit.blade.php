<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('events') }}">{{ __('Eventos') }}</a>
            → {{ __('Novo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col">
                            <form name="add-event" action="{{ route('event.update', ['id' => $event->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="{{ old('name') ?? $event->name }}"
                                        placeholder="" required>
                                    <small id="nameHelper" class="form-text text-muted">Ex.: Micael Ferreira</small>
                                    @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="about">Sobre o evento</label>
                                    <textarea class="form-control" name="about" id="about" maxlength="254"
                                        rows="5">{{ old('about') ?? $event->about }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        aria-describedby="slugHelper" value="{{ old('slug') ?? $event->slug }}"
                                        placeholder="" required>
                                    <small id="slugHelper" class="form-text text-muted">Preenchido
                                        automaticamente</small>
                                </div>
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" placeholder=""
                                        value="{{ old('year') ?? $event->year }}">
                                </div>
                                <div class="form-group">
                                    <label for="edition">Edição</label>
                                    <input type="text" class="form-control" id="edition" name="edition" placeholder=""
                                        value="{{ old('edition') ?? $event->edition }}">
                                </div>
                                <div class="form-group">
                                    <label for="place">Lugar</label>
                                    <input type="text" class="form-control" id="place" name="place"
                                        aria-describedby="placeHelper" value="{{ old('place') ?? $event->place }}"
                                        placeholder="" required>
                                    <small id="placeHelper" class="form-text text-muted">Ex.: Universidade Federal do
                                        Ceará</small>
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Data de início</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        placeholder="@micaelmf"
                                        value="{{ old('start_date') ?? date('Y-m-d', strtotime($event->start_date)) }}">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">Data de encerramento</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date"
                                        placeholder="@micaelmf"
                                        value="{{ old('end_date') ?? date('Y-m-d', strtotime($event->end_date)) }}">
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


<script type="text/javascript">
    $(document).ready(function(e) {


        $('#photo').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });
</script>
