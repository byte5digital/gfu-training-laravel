<form wire:submit.prevent="save">
    @if ($photo)
        <img src="{{ $photo->temporaryUrl() }}">
    @endif

    <br />

    <input type="file" wire:model="photo">

    @error('photo') <span class="error">{{ $message }}</span> @enderror

    <button type="submit">Upload</button>
</form>
