<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $customers = User::where('is_admin', 0)->latest()->paginate(10);
        //dd($customers);
        return view ('admin.customers.index',[
            'customers'=>$customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields= $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'location'=>'required',
            'phone'=>['required',Rule::unique('users','phone')],
            'password'=>['required','confirmed','min:6']

        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        User::create($formFields);

        return redirect()->route('admin.customers.index')->with('status', "Customer successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         return view ('admin.customers.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer=User::find($id);

         if (!auth()->user()->is_admin) {
            abort(403, 'No ristrict');
        }

        $customer->delete(); 
        return redirect()->route('admin.customers.index')->with('status', "Post successfully deleted");
    }
}
