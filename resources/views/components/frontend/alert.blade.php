@if (session()->has($type))
    <div class="alert 
    @if($type == 'error') alert-danger 
    @elseif($type == 'success') alert-success 
    @elseif($type == 'warning') alert-warning 
    @elseif($type == 'info') alert-info 
    @else alert-primary 
    @endif">
        {{ session($type) }}
    </div>
@endif