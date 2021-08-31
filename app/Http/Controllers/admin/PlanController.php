<?php

namespace App\Http\Controllers\admin;

use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    public function addplan(){
        $plans = Plan::all();
        return view('admin/plan/index', compact(['plans']));
    }
    public function store(Request $request)
    {
        $this->validate(
            $request, 
            [
                'name' => 'required | string|unique:plans,name',
                'price' => 'required',
            ],
            [
                'name.required' => 'Plan name is required',
                'name.unique' => 'Subscription plan already exist',
                'name.string' => 'Invalid plan name',
                'price.required' => 'Plan price  is required',
            
            ]   
        );
         $plan = new Plan();
         $plan->name = $request->name;
         $plan->price = $request->price;
         $plan->slug = $request->name.rand(0, 10000000000).time();
         $plan->save(); 
        return redirect()->back()->with('success', 'Plan subscription has successfully added');
    }
    public function update(Request $request)
    {
        $this->validate(
            $request, 
            [
                'name' => 'required | string',
                'price' => 'required',
            ],
            [
                'name.required' => 'Plan name is required',
                'name.unique' => 'Subscription plan already exist',
                'name.string' => 'Invalid plan name',
                'price.required' => 'Plan price  is required',
            
            ]   
        );

          Plan::where('id', $request->id)->update(['name'=> $request->name, 'price'=>$request->price]);
        return redirect()->back()->with('success', 'Plan subscription has successfully added');
}
public function delete(Request $request)
{
    Plan::findorFail($request->id)
            ->forceDelete();
            return redirect()->back()->with('success', 'Plan subscription has successfully deleted');

}

}
