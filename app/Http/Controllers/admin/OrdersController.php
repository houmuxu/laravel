<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;
use App\Model\Admin\Details;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $oid = $request->input('oid');
        $tel = $request->input('tel');
        $res = Orders::orderBy('id','asc')->where(function($query) use($request){
            $oid = $request->input('oid');
            $tel = $request->input('tel');
            if(!empty($oid)){
                $query->where('oid','like','%'.$oid.'%');
            }
            if(!empty($tel)){
                $query->where('tel','like','%'.$tel.'%');
            }
        })->paginate(5);
        
        // $res = Orders::orderBy('id','asc')->paginate(5);

        // dump($res);

        return view('admin/orders/orders',['res'=>$res,'request'=>$request]);
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
        $res = Orders::where('id',$id)->first();
        // dd($res);
        return view('admin/orders/edit',['res'=>$res]);
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

        // dd($request->all());
        $res = $request->except('_token','_method');

        $data =Orders::where('id', $id)->update($res);

        if($data){

            return redirect('/admin/orders');

        }else{

            return back();

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
        // $data = Orders::destroy($id);
        //  if($data){ 
        //     return redirect('/admin/orders');
        // } else {
        //     return back();
        // }
    }

    public function send(Request $request)
    {
        // $data = $request->get('id');
        // return $data;
        echo 123;
        
    }



}
