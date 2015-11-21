  
 @extends('layouts.master')
@section ('title','Регистрация')@endsection
 @section('content2')
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
	  <div class="regok">
	  <h2>Регистрация</h2>
      <form role="form" method="post" action="{{ url('auth/register') }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" style="width:20%;margin-left: 40%;" class="form-control" id="email" placeholder="Email" name='email'>
          </div>
          <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" style="width:20%;margin-left: 40%;" class="form-control" id="password" placeholder="Пароль" name="password">
          </div>
          <div class="form-group">
            <label for="confirm_password">Повторите пароль</label>
            <input type="password" style="width:20%;margin-left: 40%;" class="form-control" id="confirm_password" placeholder="Повторите пароль" name="password_confirmation">
          </div>
          <button type="submit" class="btn btn-default">Отправить</button>
        </form>
    </div>
	</div>
@endsection