<div class="form-group">
    {!! Form::label('title in English') !!}
    <span class="required-star">*</span>
    {!! Form::text("title_en",null,["class" => "form-control"]) !!}
    @error('title_en')
    <small style="display: block !important" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('title in Arabic') !!}
    <span class="required-star">*</span>
    {!! Form::text("title_ar",null,["class" => "form-control"]) !!}
    @error('title_ar')
    <small style="display: block !important" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
</div>




<div class="form-group">
    {!! Form::label('author') !!}
    <span class="required-star">*</span>
    {!! Form::text("author",null,["class" => "form-control"]) !!}
    @error('author')
    <small style="display: block !important" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror

</div>


<div class="form-group">
    {!! Form::label('description in English') !!}
    <span class="required-star">*</span>
    {!! Form::textarea("description_en",null,["class" => "form-control"]) !!}

    @error("description_en")
    <small style="display: block !important" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('description in Arabic') !!}
    <span class="required-star">*</span>
    {!! Form::textarea("description_ar",null,["class" => "form-control"]) !!}
    @error("description_ar")
    <small style="display: block !important" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('isbn') !!}
    <span class="required-star">*</span>
    {!! Form::number("isbn",null,["class" => "form-control"]) !!}
    @error('isbn')
    <small style="display: block !important" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror

</div>
@inject('tags', 'App\Models\Tag')
<div class="form-groups">
    {!! Form::label('Tags') !!}
    {!! Form::select('tags[]', $tags::all()->pluck('name', 'id'), null, ['class' => 'form-control mulite-select', 'id' => 'formSelect', 'multiple']) !!}
    @error('tags')
    <small style="display: block !important" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('images') !!}
    <span class="required-star">*</span>

    <div class="form-group mb-3">
        {!! Form::file("images[]",["class" => "form-control", "multiple" => "multiple"]) !!}
    </div>

    @error('images')
    <small style="display: block !important" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror

</div>
