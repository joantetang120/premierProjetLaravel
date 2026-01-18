@csrf
<div class="mt-2">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Name" class="form-control"
           value="{{ old('name', $note->name ?? '') }}">
    @error("name")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mt-2">
    <label for="detail">Detail</label>
    <textarea name="detail" placeholder="Detail" class="form-control">{{ old('detail', $note->detail ?? '') }}</textarea>
    @error("detail")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mt-2">
    <label for="image">Entrez une image</label>
    <input type="file" name="image"  class="form-control"
           value="{{ old('image', $note->image ?? '') }}">
    @error("image")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mt-2">
    <button class="btn btn-success btn-sm" type="submit">
        <i class="fa fa-save"></i> Submit
    </button>
</div>
