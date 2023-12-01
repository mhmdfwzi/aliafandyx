@props([
    'type'=>'text','name','value'=>'','class'=>'form-control' , 'placeholder'=>''
    ])



<input type="{{ $type }}" placeholder="{{$placeholder}}" name="{{ $name }}" value="{{ old($name, $value) }}" class="{{ $class }}">
@error($name)
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
