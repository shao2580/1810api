<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\StudentsModel;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StudentsModel::all();

        if ($data) {
           return view('students.list',['data'=>$data]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.reg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($data) {
            $res = StudentsModel::insert($data);
            if ($res) {
                 $returnMsg=[
                    'code'=>'20000',
                    'msg'=>'添加成功'
                ];
            }else{
                $returnMsg=[
                    'code'=>'40001',
                    'msg'=>'添加失败'
                ];
            }
            return json_encode($returnMsg,JSON_UNESCAPED_UNICODE);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =StudentsModel::where(['id'=>$id])->first();
        if ($data) {
             return view('students.edit',['data'=>$data]);
         } 
        
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
        $data = $request->all();
        if ($data) {
            $res = StudentsModel::where(['id'=>$id])->update($data);
            if ($res) {
                 $returnMsg=[
                    'code'=>'20001',
                    'msg'=>'修改成功'
                ];
            }else{
                $returnMsg=[
                    'code'=>'40002',
                    'msg'=>'修改失败'
                ];
            }
            return json_encode($returnMsg,JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $res = StudentsModel::destroy($id);
            if ($res) {
                $returnMsg=[
                    'code'=>'20002',
                    'msg'=>'删除成功'
                ];
            }else{
                 $returnMsg=[
                    'code'=>'40003',
                    'msg'=>'删除失败'
                ];
            }
            return json_encode($returnMsg,JSON_UNESCAPED_UNICODE);
        }
    }
}
