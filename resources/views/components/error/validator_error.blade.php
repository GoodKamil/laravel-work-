@props(['name'=>'','message'=>$message])
<span {{ $attributes->class(['invalid-feedback']) }} role="alert"><strong>@error($name) {{ $message  }}@else &nbsp; @enderror</strong></span>
