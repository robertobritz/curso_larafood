<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\storeUpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan; // cria um estância da model Plan
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate(10); // repository variável que copiou nossa Plan

        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }
    public function store(storeUpdatePlanRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index');

    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', compact('plan'));    
    }

    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        $plan->delete();
        
        return redirect()->route('plans.index');
    }


    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter); //search funçãod dentro de Plan, Filter variável na função;
        
        return view('admin.pages.plans.index', compact('plans', 'filters'));
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();
     
        return view('admin.pages.plans.edit', compact('plan'));
    }

    public function update(storeUpdatePlanRequest $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();
        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
