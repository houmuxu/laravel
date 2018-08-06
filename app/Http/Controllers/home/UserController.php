<?php
namespace App\Http\Controllers\home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ucpaas;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.user.telzhuce');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
    public function destroy($id)
    {
        //
    }



    public function sendcode(Request $request)
    {

        //初始化必填
        $options['accountsid']='fd24829d8bfcbd80834aca0aef04a05e';
        $options['token']='316b7e37616ca8dff338b0d262d0ad00';

        //初始化 $options必填
        $ucpass = new Ucpaas($options);

        //开发者账号信息查询默认为json或xml
        $ucpass->getDevinfo('xml');
         $code = rand(1111,9999);

        $toNumber = $request->post('number');

        session('code',$code);

        $appId = "9776d6202bb14ce49d26885fb13a84ac";
        $templateId = "349335";
        $param=$code;

       echo  $ucpass->templateSMS($appId,$toNumber,$templateId,$param);



    }


    public function checkuser(Request $request)
    {
        $users = $request->get('username');

        $res = Db::table('user')->where('username',$users)->find();

        // dump($res);
        if($res){

            echo 1;
        } else {

            echo 0;
        }



}
