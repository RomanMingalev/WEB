<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Code;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CodeController;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    
protected $layout = 'layouts.master';
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   protected function validator(array $data)
{
    return Validator::make($data, [
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
    ]);
}


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

	public function postRegister(Request $request)
{
    $validator = $this->validator($request->all());
    if ($validator->fails()) {          
        $this->ThrowValidationException($request, $validator);
    };
    $user = $this->create($request->all());
    //создаем код и записываем код
    $code = CodeController::generateCode(8);
    Code::create([
        'user_id' => $user->id,
        'code' => $code,
    ]);
    //Генерируем ссылку и отправляем письмо на указанный адрес
    $url = url('/').'/auth/activate?id='.$user->id.'&code='.$code;      
    
    return redirect()->to($url);
}
public function activate(Request $request)
{
    $res = Code::where('user_id',$request->id)
        ->where('code',$request->code)
        ->first();
    if($res) {
        //Удаляем использованный код           
        $res->delete();
        //активируем аккаунт пользователя           
        User::find($request->id)
                ->update([                   
                    'activated'=>1,
                ]);
        //редиректим на страницу авторизации с сообщением об активации
         return view('auth.regok');
    }
    return abort(404);
}

public function postLogin(Request $request)
{

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'activated' => 1])){
		
		
        return redirect()->to('/');
    }
    return 'NO!';
}

}
