<h1>Blade Template functionality</h1>


@php
$name="Raj";
@endphp

{{'Hi i am echo'}}
<h1>{{$name}}</h1>
{{10+10}}


{{-- ' This is cooment'--}}



<p>We can use conditional statement in blade template </p>


@php $name="nagar" @endphp
@if($name=="Raj")
<h1>Hi my name is {{$name}}</h1>
@else
<h1>Unknown</h1>	
@endif




@if($name=="Raj")
<h1>Hi my name is {{$name}}</h1>
@elseif($name=="Mahesh")
<h1>Hi my name is {{$name}}</h1>
@else
<h1>Unknown</h1>	
@endif

<!-- if(!($name==nagar)) -->
@unless($name=="nagar")
  <p>{{'name not nagar'}}</p>
@else
 <p>{{'name is nagar'}}</p>
@endunless



<p>We can use conditional loop in blade template </p>
@for($i=1;$i<=10;$i++)
<h4>{{$i}}</h4>	
@endfor

<?php $z = 0; ?>
@while ($z < 3)
  {{ "test".$z }} 
  <?php $z++ ?>
@endwhile

<p>We can use Foreach loop in blade template </p>
@php $data=['sam','raj','mahesh'] @endphp
@foreach($data as $d)
<h4>{{$d}}</h4>
@endforeach

