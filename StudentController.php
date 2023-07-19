<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('index');
    }
    public function insert(Request $req){
        $file=$req->file('avatar');
        $fileDir='./images/';
        $fileName=time()."_".$file->getCLientOriginalName();
        $file->move($fileDir,$fileName);
        $affectedRows=DB::table('students')->insert([
            'name' =>$req->input('name'),
            'email' =>$req->input('email'),
            'phone' =>$req->input('phone'),
            'gender'=>$req->input('gen'),
            'languages' =>implode(',',$req->input('lang')),
            'qualifications'=>implode(',',$req->input('ch')),
            'picture'   =>$fileName,
            'password'  =>password_hash($req->input('pass'),PASSWORD_DEFAULT)
        ]);
        if($affectedRows){
            return redirect('/signin')->with(['message'=>'success']);
        }else{
            return redirect('/signin')->with(['message' => 'error']);
        }
    }
    public function getAll(){
        $users=DB::table('students')->simplePaginate(2);
        return view('/users')->with(['userInfo'=>$users]);
    }
    public function edit($id){
        $data=DB::table('students')->where('id',$id)->get();
        return view('/edit')->with(['user'=>$data[0]]);
    }
    public function update(Request $req){
        $file = $req->file('avatar');
        $fileDir = './images/';
        $fileName = time() . "_" . $file->getCLientOriginalName();
        $file->move($fileDir, $fileName);
        $affectedRows = DB::table('students')->where('id',$req->input('hid'))->update([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'phone' => $req->input('phone'),
            'gender' => $req->input('gen'),
            'languages' => implode(',', $req->input('lang')),
            'qualifications' => implode(',', $req->input('ch')),
            'picture'   => $fileName,
        ]);
        if ($affectedRows) {
            return redirect('/users')->with(['message' => 'success']);
        } else {
            return redirect('/users')->with(['message' => 'error']);
        }
    }
    public function delete($id){
        $affectedRows=DB::table('students')->where('id',$id)->delete();
        if($affectedRows){
        return redirect('/users')->with(['message'=>'delete']);
        }else{
            return redirect('/users')->with(['message' => 'error']);
        }
    }
    public function signin(){
        return view('signin');
    }
    public function login(Request $req){
        $email=$req->input('email');
        $pass=$req->input('pass');
        $user=DB::table('students')->where('email',$email)->first();
        if(!($user)){
            return redirect('/signin')->with(['login'=>'exists']);
        }
        if(password_verify($pass,$user->password))
        {
            $req->session()->put('USER',$user->name);
            $req->session()->put('USER_ID',$user->id);
            $req->session()->put('IP',$_SERVER['REMOTE_ADDR']);
            return redirect('/users')->with(['login'=>'success']);
        }
        else{
            return redirect('/users')->with(['login' => 'error']);
        }
    }
    public function logout(Request $req){
        $req->session()->forget('USER');
        $req->session()->flush();
        return redirect('/signin')->with(['login' => 'logout']);
    }
}
