<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SuscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('now');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePLan()
    {
        return view('planes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePlanPost(Request $request)
    {

        if(\Auth::user()->free == 1){
            \Auth::user()->tendaz_plan = $request->get('plan');
            \Auth::user()->save();
            return redirect()->back();
        }
        $request->session()->put('plan',$request->get('plan'));
        return redirect()->to('suscription/pay-plan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPayPlan()
    {
        $plan = \Session::get('plan');
        if(\Session::has('plan')){
            return view('pagar-plan')->with('plan',$plan);
        }else{
            return view('pagar-plan')->with('plan', \Auth::user()->tendaz_plan);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postPayPlan(Request $request)
    {
        
      \Auth::user()->subscription($request->get('plan'))->create($request->get('token') , [
            'email' => \Auth::user()->email,
        ]);
      \Session::flash('notice','Te has inscrito correctamente al plan');
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
