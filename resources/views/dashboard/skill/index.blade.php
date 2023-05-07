@extends('dashboard.layout')
@section('konten')
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Programing Language and Tools</label>
            <input type="text" class="form-control form-control-sm skill" name="_language" id="_language"
                aria-describedby="helpId" value="{{ get_meta_value('_language') }}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Workflow</label>
            <textarea class="form-control summernote" id="_workflow" name="_workflow" rows="5">{{ get_meta_value('_workflow') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
    </form>
@endsection

@push('child-script')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
@endpush
