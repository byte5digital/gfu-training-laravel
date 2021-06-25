<form wire:submit.prevent="storeArticle" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="title" class="col-4 col-form-label">Title</label>
        <div class="col-8">
            <input id="title" wire:model="article.title" type="text" class="form-control">
            @error('article.title')
                <p class="is-danger"> {{ $message }} </p>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="excerpt" class="col-4 col-form-label">Excerpt</label>
        <div class="col-8">
            <textarea id="excerpt" wire:model="article.excerpt" cols="40" rows="5" class="form-control"></textarea>
            @error('article.excerpt')
                <p class="is-danger"> {{ $message }} </p>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Text</label>
        <div class="col-8">
            <textarea id="text" name="text" wire:model="article.text" cols="40" rows="5" class="form-control"></textarea>
            @error('article.text')
                <p class="is-danger"> {{ $message }} </p>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="image" class="col-4 col-form-label">Image</label>
        <div class="col-8">
            <input id="image" name="image" wire:model="articleImage" type="file" class="form-control" >
            @error('articleImage')
                <p class="is-danger"> {{ $message }} </p>
            @enderror
        </div>
    </div>

    <select wire:model="selectedCategories" multiple class="form-control">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <div class="form-group" style="text-align: center; margin-top: 5px;">
        <button name="submit" type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
