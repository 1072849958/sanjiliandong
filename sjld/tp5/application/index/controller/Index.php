<?php

namespace app\index\controller;

use app\index\common\model\AreasModel;
use app\index\common\model\CitiesModel;
use app\index\common\model\ProvincesModel;
use think\Controller;
use think\Request;

class Index extends Controller
{
    public function index(Request $request)
    {
        $opt = '<option>--请选择市--</option>';

        if ($request->isPost()) {
            $proid=$request->post('pro_id');
            $city=CitiesModel::where('provinceid',$proid)->select();
            foreach($city as $key=>$val){
                $opt .="<option value='$val->cityid'>$val->city</option>";

            }
            echo json_encode($opt);




        } else {
            $sf=ProvincesModel::select();
            $this->assign('sf',$sf);
            return view('index/sjld');
        }
    }






}
