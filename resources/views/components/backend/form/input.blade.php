@props([
    'type'=>'text','name','required'=>'required','step'=>'any','autofocus'=>'autofocuss','value'=>'','label','class'=>'form-control',
      
    ])



<label>{{$label}}<span class="text-danger">*</span></label>
<input type="{{ $type }}" name="{{ $name }}"  autofocus="{{ $autofocus }}"  required="{{ $required }}" 
	   step="{{ $step }}" value="{{ old($name, $value) }}" class="{{ $class }}">
@error($name)
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
