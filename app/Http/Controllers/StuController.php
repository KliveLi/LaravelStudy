<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StuController extends Controller
{	
	//restful资源控制器
    //浏览所有数据
    public function index()
    {
    	//查询所有数据
    	//$user=\DB::table('stu')->get();//获取数据
    	$user=\DB::table('stu')->paginate(5);//分页获取数据

    	//dd($user);//将得到的信息直接打印显示出来
    	return view("stu.index",['list'=>$user]);//加载模板，并把数据传输过去
    }
    //创建数据
    public function create()
    {
    	return view('stu.create');
    }
    //保存数据
    public function store(Request $request)
    {
    	//dd($request);
    	//获取要添加的信息
    	$data = $request->all();
    	//dd($data);
    	//去除多与信息  token
    	unset($data['_token']);
    	//执行添加
    	$id = \DB::table('stu')->insertGetId($data);
    	//return "添加成功，ID为".$id;
    	if($id>0){
    		return redirect('stu'); 	
    	}

    }
    //显示数据
    public function show()
    {

    }
    //编辑数据
    public function edit($id=0)
    {
    	$stu = \DB::table('stu')->where("id","=",$id)->first();
    	//dd($stu);
    	return view("stu.edit",['stu'=>$stu]);//加载模板，并把数据传输过去
    }
    //更新数据
    public function update($id,Request $request)
    {
    	//获取要修改的信息
    	$data = $request->all();
    	//dd($data);
    	//dd($id);
    	//去除多余数据
    	unset($data['_method']);
    	unset($data['_token']);
    	\DB::table('stu')->where('id',$id)->update($data);
    	//执行跳转
    	return redirect('stu'); 	

    }
    //删除数据
    public function destroy()
    {

    }
}
