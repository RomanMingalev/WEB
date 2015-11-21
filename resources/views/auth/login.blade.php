
@extends('layouts.master')
@section ('title','Авторизация')@endsection
@section('content')



        {{--Ошибки--}}
        @if ($errors->has())
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-danger" role="alert">
                        <button class="close" aria-label="Close" data-dismiss="alert" type="button">                         
                            <span aria-hidden="true">?</span>
                        </button>
                        <ul>
                            @foreach($errors->all() as $error)                         
                                <li> {{{ $error }}}</li>                         
                            @endforeach                    
                        </ul>
                     </div>
                </div>
            </div>
        @endif
        {{--Успех--}}
        @if (Session::has('message'))
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                     <div class="alert alert-success" role="alert">                   
                         <button class="close" aria-label="Close" data-dismiss="alert" type="button">                       
                             <span aria-hidden="true">?</span>                   
                         </button>
                         {{ Session::get('message') }}
                     </div>
                </div>
            </div>
        @endif
		
        <form role="form" method="post" action="{{ url('auth/login') }}">
            {!! csrf_field() !!}
			<div class="regok">
			<h2>Авторизация</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" style="width:20%;margin-left: 40%;" class="form-control" id="email" placeholder="Email" name='email'>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" style="width:20%;margin-left: 40%;" class="form-control" id="password" placeholder="Пароль" name="password">
            </div>
            <button type="submit" class="btn btn-default">Войти</button>
			</div>
        </form>
    </div>

@endsection