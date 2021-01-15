<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" class="form-control" name="title" value="{{ $anime->id ? (old('title') ?? $anime->title) : old('title') }}">
        @error('title')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
    <div class="col-sm-12 col-md-7">
        <textarea class="summernote-simple" name="description">{{ $anime->id ? (old('description') ?? $anime->description) : old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
    <div class="col-sm-12 col-md-7">
        <select class="form-control selectric" name="type">
            <option value="TV Series" {{ empty(old('type')) ? ($anime->type == 'TV Series' ? 'selected' : '') : (old('type') == 'TV Series' ? 'selected' : '') }}>TV Series</option>
            <option value="Movie" {{ empty(old('type')) ? ($anime->type == 'Movie' ? 'selected' : '') : (old('type') == 'Movie' ? 'selected' : '') }}>Movie</option>
            <option value="OVA" {{ empty(old('type')) ? ($anime->type == 'OVA' ? 'selected' : '') : (old('type') == 'OVA' ? 'selected' : '') }}>OVA</option>
        </select>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Studio</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" class="form-control" name="studio" value="{{ $anime->id ? (old('studio') ?? $anime->studio) : old('studio') }}">
        @error('studio')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
    <div class="col-sm-12 col-md-7">
        <select class="form-control selectric" name="status">
            <option value="On Going" {{ empty(old('status')) ? ($anime->status == 'On Going' ? 'selected' : '') : (old('status') == 'On Going' ? 'selected' : '') }}>On Going</option>
            <option value="Completed" {{ empty(old('status')) ? ($anime->status == 'Completed' ? 'selected' : '') : (old('status') == 'Completed' ? 'selected' : '') }}>Completed</option>
        </select>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quality</label>
    <div class="col-sm-12 col-md-7">
        <select class="form-control selectric" name="quality">
            <option value="SD" {{ empty(old('quality')) ? ($anime->quality == 'SD' ? 'selected' : '') : (old('quality') == 'SD' ? 'selected' : '') }}>SD</option>
            <option value="HD" {{ empty(old('quality')) ? ($anime->quality == 'HD' ? 'selected' : '') : (old('quality') == 'HD' ? 'selected' : '') }}>HD</option>
            <option value="BD" {{ empty(old('quality')) ? ($anime->quality == 'BD' ? 'selected' : '') : (old('quality') == 'BD' ? 'selected' : '') }}>BD</option>
        </select>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rating</label>
    <div class="col-sm-12 col-md-7">
        <input type="number" class="form-control" name="rating" step="0.01" value="{{ $anime->id ? (old('rating') ?? $anime->rating) : old('rating') }}">
        @error('rating')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Duration</label>
    <div class="col-sm-12 col-md-7">
        <input type="number" class="form-control" name="duration" value="{{ $anime->id ? (old('duration') ?? $anime->duration) : old('duration') }}">
        @error('duration')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Episode</label>
    <div class="col-sm-12 col-md-7">
        <input type="number" class="form-control" name="total_episode" value="{{ $anime->id ? (old('total_episode') ?? $anime->total_episode) : old('total_episode') }}">
        @error('total_episode')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Release Date</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" class="form-control datepicker" name="release_date" value="{{ $anime->id ? (old('release_date') ?? $anime->release_date) : old('release_date') }}">
        @error('release_date')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>