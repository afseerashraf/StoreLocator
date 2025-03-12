<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Requests\store\createStore;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\store\storeUpdate;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();

        return view('store.list', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createStore $request)
    {
        $store = new Store();

        $store->create([

            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

        ]);
        flash()->success('successfully create store '. $store->name);

        return redirect()->route('store.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $store = Store::find(Crypt::decrypt($id));

       return view('store.edit', compact('store'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(storeUpdate $request, string $id)
    {
        
        $store = Store::findOrFail(Crypt::decrypt($id));

        $store->update([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        flash()->info('successfully update store '. $store->name);

        return redirect()->route('store.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Store::findOrFail(Crypt::decrypt($id));

        $store->delete();
    
        flash()->warning ('successfully remove store '. $store->name);

        return redirect()->route('store.index')->with('delete', 'Store deleted successfully.');
        
    }
}
