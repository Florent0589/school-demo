<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use Cache;
use App\User;
use App\Role;
use App\IdentificaitonType;

use Socialite;
use Exception;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all users for listing
        $users = User::all();
        return view('users.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types = IdentificaitonType::all();
        $roles = Role::all();
        return view('users.create', compact('types', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $form_data = \request()->all();


        $new_user                           = new User();
        $new_user->first_name               = $form_data['name'] ;
        $new_user->last_name                = $form_data['last_name'];
        $new_user->username                 = $form_data['username'];
        $new_user->date_of_birth            = $form_data['date_of_birth'];
        $new_user->identification_type_id   = $form_data['identification_type_id'];
        $new_user->id_number                = $form_data['id_number'];
        $new_user->passport_number          = null;
        $new_user->email                    = $form_data['email'];
        $new_user->mobile                   = $form_data['mobile'];
        $new_user->role_id                  = $form_data['role_id'];
        $new_user->save();

        // ToDo: send email to user

        return redirect('/users')->with('success', 'Successfully Created a New User!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        $types = IdentificaitonType::all();
        $roles = Role::all();
        return view('users.show', compact('types', 'roles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $types = IdentificaitonType::all();
        $roles = Role::all();
        return view('users.edit', compact('types', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $form_data = \request()->all();

        $update_user                           = User::find($id);
        $update_user->first_name               = $form_data['name'] ;
        $update_user->last_name                = $form_data['last_name'];
        $update_user->username                 = $form_data['username'];
        $update_user->date_of_birth            = $form_data['date_of_birth'];
        $update_user->identification_type_id   = $form_data['identification_type_id'];
        $update_user->id_number                = $form_data['id_number'];
        $update_user->passport_number          = null;
        $update_user->email                    = $form_data['email'];
        $update_user->mobile                   = $form_data['mobile'];
        $update_user->role_id                  = $form_data['role_id'];
        $update_user->save();

        return redirect('/users')->with('success', 'Successfully Updated User!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     *
     */
    public function doLogin()
    {
        $username = request()->get('username');
        $password = request()->get('password');

        $input_data  = ['username' => $username, 'password' => $password];

        if(Auth::attempt($input_data))
        {
            if(Auth::user()->role_id == Role::GURDIAN)
            {
                return redirect('/Portal');
            }
            return redirect('/');
        }
        else
        {
            return redirect()->back()->with('error', 'Incorrect login detials, try again');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        Cache::flush();

        return redirect('/login');
    }

    public function verifyAccount($id)
    {
        $user = User::find($id);
        return view('users.verify-account', compact('user'));
    }

    public function updateAccount($id)
    {
        $form_data = \request()->all();
        $user = User::find($id);
        $user->password = Hash::make($form_data['password']);
        $user->save();

        return redirect('/login');
    }

    public function profile($id)
    {
        $user = User::find($id);

        return view('users.profile', compact('user'));
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }

    public function changePassword()
    {
      $id = \request()->all();
      $user = User::find($id);
      return view('users.change-password', compact('user'));
    }

    public function changeUserPassword()
    {
        $form_data  = \request()->all();
        $id         = $form_data['id'];

        $password   = $form_data['password'];
        if($password == $form_data['confirm_password'])
        {
            $user = User::find($id);

            if($user != null)
            {
                $user->password = \Hash::make($form_data['password']);
                $user->save();

                return redirect('/users')->with('success', 'Successfully Change User Password');
            }
        }
        return redirect()->back()->with('error', 'Couldnt update user Password');
    }
}
