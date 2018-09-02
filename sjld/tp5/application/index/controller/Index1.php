<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2/002
 * Time: 11:53
 */

namespace app\index\controller;


use app\index\common\model\AreasModel;
use app\index\common\model\CitiesModel;
use think\Controller;
use think\Request;

class Index1 extends Controller
{
    public function index1(Request $request)
    {
        $are = '<option>--请选择区--</option>';
        $cityid=$request->post('city_id');
        $area=AreasModel::where('cityid',$cityid)->select();
        foreach($area as $key=>$val){
            $are .="<option value='$val->areaid'>$val->area</option>";

        }
        echo json_encode($are);


    }
}