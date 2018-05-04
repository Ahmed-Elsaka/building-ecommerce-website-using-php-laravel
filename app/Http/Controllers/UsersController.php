<?php

namespace App\Http\Controllers;
use App\BU;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Requests\UserUpdatePassword;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use  App\Http\Requests\AddUserRequestAdmin;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Contracts\DataTable;
use DataTables;

class UsersController extends Controller
{

    public function index(){
      return view('admin.user.index');
    }
    public function create(){
        return view('admin.user.add');
    }


    protected function store(AddUserRequestAdmin $request, User $user)
    {
        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return  redirect('/users')->withFlashMessage('the member has added successfully');
    }

    public function edit(  $id){
        $user = User::findOrFail($id);
        return view('admin.user.edit',compact('user'));
     }

   // public function update(  $id, User $user, Request $request){
    public function update(  Request $request, User $user){

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'admin' =>$request->admin
             ]);

            return  redirect('/users')->withFlashMessage('the member has added successfully');
        /*
        $userUpdated = $user->find($id) ;
        $userUpdated = $user->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('done ya man ');
        
        return 'iam xxxx method';
        */
    }
    public function show(User $user)
    {
        return 'iam in show message';
    }

    public function destroy($id, User $user){
        $user->find($id)->delete();
        BU::where('user_id',$id)->delete();  //dlete buildings related to this user
        return  redirect('/users')->withFlashMessage('the User '.$user->name.' has deleted successfully');
    }


    public function UpdatePassword(Request $request , User $user){


        $userUpdated = $user->find($request->user_id);
        $password = Hash::make($request->password);
        $userUpdated->fill(['password'=>$password])->save();
        return Redirect::back()->withFlashMessage('the password changed successfully');

    }

    public function anyData(User $user){
        $users = $user->all();
        return DataTables::of($users)
            ->editColumn('name', function($model){
                return $model->name;
            //return \Html::link('/users/'. $model->id .'/edit',$model->name, '/edit', $model->name);
            })
            ->editColumn('admin', function($model) {
                return $model->admin==0? "Member"    :'Manager';
               // return $model->admin == 0 ? '<span class="badge badge-info">' . 'member' . '</span>' : '<span class="badge badge-warning">' . 'Manager' . '</span>';
               // return $model->admin == 0 ? \Html::link('','member',array('class'=>'badge badge-info')):\Html::link('','Manager',array('class'=>'badge badge-info'));

            })

            ->editColumn('control', function($model){
                if($model->id !=1){
                    $var =\Html::link('/users/'. $model->id .'/edit','Edit/Delete',array('class'=>'btn btn-info btn-circle'));
                }else{
                    $var =\Html::link('/users/'. $model->id .'/edit','Edit Admin',array('class'=>'btn btn-danger btn-circle'));
                }

                return  $var;
            })
            ->make(true);


    }
    
    //functions for  edit user info 
    public function userEditinfo()
    {

        $user = Auth::user();
        return view('website.profile.edit',compact('user'));
    }

    public function userUpdateProfile(User $users , UserUpdateRequest $userUpdateRequest)
    {
        $user = Auth::user();
        $checkmail = $users->where('email',$userUpdateRequest->email)->count();
        if($userUpdateRequest->email !=$user->email){
            if($checkmail ==0){
                $user->fill($userUpdateRequest->all())->save();
            }else{
                return Redirect::back()->withFlashMessage('this email already exist please use another email');
            }

        }else{
            $user->fill(['name'=>$userUpdateRequest->name])->save();
        }
        return Redirect::back()->withFlashMessage('your information changed successfully');
    }

    public function userChangePassword(User $users , UserUpdatePassword $userUpdateRequest)
    {
        $user = Auth::user();
        //dd($user->password,Hash::make($userUpdateRequest->password));

        if(Hash::check($userUpdateRequest->password , $user->password)){
            $newPassword = Hash::make($userUpdateRequest->newpassword);
            $user->fill(['password'=>$newPassword])->save();
            return Redirect::back()->withFlashMessage('Password changed successfully');
        }else{
            return Redirect::back()->withFlashMessage('Old Password is not correct');
        }





    }


}
