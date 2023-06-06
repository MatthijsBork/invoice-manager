<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function view()
    {

        $invoices = Invoice::query()
            ->when(Auth::user()->role_id === Role::DEBTOR, function ($query) {
                $query->where("debtor_id", Auth::id());
            })
            ->orderBy("expiration_date")
            ->paginate(20);


        return view('dashboard')->with('invoices', $invoices);
    }
}
