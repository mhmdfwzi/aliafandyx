

<select name="{{$name}}" class="{{$class}}">

    @foreach($options as $value => $text)
            <option value="{{$value}}" > {{$text}}</option>
    @endforeach

</select>