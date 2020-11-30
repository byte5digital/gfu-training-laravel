<!-- check if error exists if yes, insert paragraph w error -->
@error('excerpt')
<div class="invalid-feedback">
    <!-- $message same as $errors->first('excerpt') -->
    {{$message}}
</div>
@enderror
