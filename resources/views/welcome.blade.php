 @extends('layouts.master')
@section ('title','Главная старница')@endsection
 @section('welcome')
 <div class='News'>
 @foreach($Items as $Item)
<div class='NewsOne'>
 <span>
 {{$Item->name}}
  </span>
  <p align="center">
 <img src='{{$Item->img}}'  WIDTH="70%" HEIGHT="60%">
<span><h3>$ {{$Item->price}}</h3><button>Купить</button></span>
 </div>
@endforeach
 </div>
 @stop
