<!-- check if error exists if yes, insert paragraph w error -->
@error('body')
<div class="invalid-feedback">
    <!-- $message same as $errors->first('body') -->
    {{$message}}
</div>
@enderror
