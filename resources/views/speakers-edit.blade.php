<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('speakers') }}">{{ __('Palestrantes') }}</a>
            → {{ __('Novo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('speaker.update', ['id' => $speaker->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome e Sobrenome</label>
                                    '{{ old('name') ?? $speaker->name }}'
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="{{ old('name') ?? $speaker->name }}"
                                        placeholder="" required>
                                    <small id="nameHelper" class="form-text text-muted">Ex.: Micael Ferreira</small>
                                    @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bio">Biografia Resumida</label>
                                    <textarea class="form-control" name="bio" id="bio" rows="5">{{ old('bio') ?? $speaker->bio }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Foto</label>
                                    <input type="file" class="form-control-file" id="photo" name="photo"
                                        aria-describedby="photoHelper" value="" required>
                                    <small id="photoHelper" class="form-text text-muted">Faça as edições necessárias
                                        antes do envio. Tamanho máximo de 2MB</small>
                                    @error('photo')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror

                                    @if (!empty($speaker->photo))
                                        <img id="preview-image-before-upload"
                                            src="{{ asset("storage/$speaker->photo") }}"
                                            style="width: 100px; height: 100px; object-fit: cover">
                                        <small>Foto Atual</small>
                                    @else
                                        <img id="preview-image-before-upload"
                                            src="https://user-images.githubusercontent.com/11250/39013954-f5091c3a-43e6-11e8-9cac-37cf8e8c8e4e.jpg"
                                            style="width: 100px; height: 100px; object-fit: cover">
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="job">Trabalho</label>
                                    <input type="text" class="form-control" id="job" name="job"
                                        value="{{ old('job') ?? $speaker->job }}" placeholder="">
                                    @error('job')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="link_linkedin">Github</label>
                                    <input type="text" class="form-control" id="link_github" name="link_github"
                                        placeholder="/micaelmf"
                                        value="{{ old('link_github') ?? $speaker->link_github }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_linkedin">Linkedin</label>
                                    <input type="text" class="form-control" id="link_linkedin" name="link_linkedin"
                                        placeholder="/micaelmf"
                                        value="{{ old('link_linkedin') ?? $speaker->link_linkedin }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_medium">Medium</label>
                                    <input type="text" class="form-control" id="link_medium" name="link_medium"
                                        placeholder="@micaelmf"
                                        value="{{ old('link_medium') ?? $speaker->link_medium }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_instagram">Instagram</label>
                                    <input type="text" class="form-control" id="link_instagram" name="link_instagram"
                                        placeholder="@micaelmf"
                                        value="{{ old('link_instagram') ?? $speaker->link_instagram }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_twitter">Twitter</label>
                                    <input type="text" class="form-control" id="link_twitter" name="link_twitter"
                                        placeholder="@micaelmf"
                                        value="{{ old('link_twitter') ?? $speaker->link_twitter }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_facebook">Facebook</label>
                                    <input type="text" class="form-control" id="link_facebook" name="link_facebook"
                                        placeholder="/micaelmf"
                                        value="{{ old('link_facebook') ?? $speaker->link_facebook }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_youtube">Youtube</label>
                                    <input type="text" class="form-control" id="link_youtube" name="link_youtube"
                                        placeholder="/micaelmf"
                                        value="{{ old('link_youtube') ?? $speaker->link_youtube }}">
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
