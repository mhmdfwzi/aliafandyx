@props(
['label','name','value'=>'']
)

<label>{{$label}}<span class="text-danger">*</span></label>

<textarea name="{{$name}}" class="form-control" rows="5">
{{ old($name,$value) }}
</textarea>
@error($name)
<div class="alert alert-danger">{{ $message }}</div>
@enderror