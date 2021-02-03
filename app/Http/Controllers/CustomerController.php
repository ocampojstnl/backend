<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerHasRegisteredEvent;

class CustomerController extends Controller
{
    
    public function index() {
        
        // $customers = Customer::all();
        $customers = Customer::with('company')
                        ->paginate(5);
                        //->get();
        $companies = Company::all();
        // dd();
        // var_dump($customers->toArray());
        // dd($customers->toArray());
        return view('customers.index', compact('companies', 'customers'));
        
    }

    public function create() {
        // $this->authorize();
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', ['companies' => $companies, 'customer' => $customer]);
    }

    public function store(Customer $customer) {
        
        $this->authorize('create', Customer::class);
        $customer = Customer::create($this->validateRequest());
        // dd($this->validateRequest());
        $this->storeImage($customer);
        
        return redirect()->route('customers.show', $customer);
        // return $this->validateRequest();
    }

    public function storeImage($customer) {
        if(request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

    private function validateRequest(){
        
         return tap(request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required|integer',
            'company_id' => 'required|integer',
        ]), function () {
            if (request()->hasFile('image')) {
                    request()->validate([
                        'image' => 'image|max:5000|file',
                    ]);
                }
        });
    }

    public function show(Customer $customer) {

        return view('customers.show-2', ['customer' => $customer]);
    
    }

    public function edit(Customer $customer) {

        $companies = Company::all();
        return view('customers.edit', compact('companies', 'customer'));
    }
    
    public function update(Customer $customer) {
        $customer->update($this->validateRequest());
        $this->storeImage($customer);
        return redirect('/customers/' . $customer->id);
    }

    public function destroy(Customer $customer) {
        $this->authorize('delete', $customer);
        $customer->delete();
        return redirect('/customers');
    }
    public function __construct() {
        return $this->middleware('auth', ['except' => ['index', 'show']]);
    //return $this->middleware('test', ['except' => ['index']]);

    }
}
