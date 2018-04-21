<?php

namespace App\Http\Controllers\Admin;

use App\Help\Help;
use App\Http\Controllers\Email\EmailController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Auth;
use Mail;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate(User::LIMIT_PAGE);
        $count = User::count();
        return view('admin.users.index', ['users' => $users, 'count' => $count]);

    }

    /**
     * Get view create/edit image news
     *
     * @param int|null $id
     * @return Response View
     */
    public function getView($id = null) {
        if ($id){
            $users = User::where('id', '=', $id)->first();
            if(!$users){
                return redirect(route('admin.user.index'))->with('error', 'User not found.');
            }
        }else {
            $users = null;
        }
        $roles = Role::all();
        return view('admin.users.create',[
            'users' =>$users,
            'roles' =>$roles,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->getView();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {
        $id  = $request->id;
        if ($id) {
            $request->validate([
                'email' => "required|max:255|unique:users,email,$id,id,deleted_at,NULL",
                'name'=>"required|max:255",
            ]);
        } else {
            $request->validate([
                'email' => "required|max:255|unique:users,email,NULL,id,deleted_at,NULL",
                'name'=>"required|max:255",
            ]);
        }
        if ($id) {
            $user = User::find($id);
            if (!$user) {
                return redirect()->route('admin.user.index')->with('error', 'User not found.');
            }
        } else {
            $user = new User();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $password = Help::generateRandomString();
        $user->password = Hash::make($password);

        $user->save();
        $user->roles()->sync($request->input('roles'));
        if (!$id) {
            $data=[];
            $data['email']= $request->email;
            $data['password']= $password;
            $data['name']= $request->name;
            $data['roles']= $user->roles()->get()->pluck('name');
            EmailController::sendMail($data);
        }

        if (!$user->save()) {
            return redirect()->route('admin.user.index')->with('error', 'An error occurred, user has not been saved.');
        }

        return redirect()->route('admin.user.index')->with('success', 'User has been save successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->getView($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $success = true;

        DB::beginTransaction();

        try{

            // Your Code



            $targets = User::whereIn('id', $request->checkbox)->get();
            foreach($targets as $target){
                if ($target) {
//                    dd($target);
                    $target->delete();
                }
            }
            DB::commit();

        }catch(\Exception $e){

            DB::rollback();

            $success = false;

        }

        if($success){
            return redirect()->route('admin.user.index')
                ->with('success', 'User has been deleted successfully');
        }

        else{
            return redirect()->route('admin.user.index')
                ->with('error', 'User not found');
        }
    }
    public function getViewChangePassword() {
        //dd('controller1');
        return view('auth.passwords.change_password',['user' => Auth::user()]);
    }
    public function changePassword(Request $request) {
        //dd('controller2');
        $user = Auth::user();
        $user->password  = Hash::make($request->password);
        $user->first_login = true;

        $user->save();
        return redirect()->route('admin.index');
    }
}
