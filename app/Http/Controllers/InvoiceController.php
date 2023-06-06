<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{


    public function show(Invoice $invoice)
    {
        $pdf = Pdf::loadView('pdf.invoice', ['invoice' => $invoice]);
        return $pdf->stream();
    }

    public function create(): Renderable
    {
        $debtors = User::query()->where('role_id', Role::DEBTOR)->pluck('name', 'id')->toArray();
        $addresses = Address::query()->get()->pluck('address', 'id')->toArray();



        return view('invoices.create')->with('debtors', $debtors)->with('addresses', $addresses);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $formData = $request->all();

        $invoice = Invoice::create([
            "invoice_number" => Invoice::getNextInvoiceNumber(),
            "attention_to" => $formData['attention_to'],
            "description" => $formData['description'],
            "invoice_date" => Carbon::createFromFormat("Y-m-d", $formData['invoice_date']),
            "expiration_date" => Carbon::createFromFormat("Y-m-d", $formData['expiration_date']),
            "debtor_id" => $formData['debtor_id'],
            "address_id" => $formData['address_id'],
            // "price" => $formData['price']
        ]);

        foreach ($formData['invoice_line_description'] as $i => $description) {
            //   dump($formData['price'][$i]);
            InvoiceLine::create([
                "description" => $description,
                "price_exclusive" => $formData['price'][$i],
                "VAT_percentage" => $formData['VAT_percentage'][$i],
                "invoice_id" => $invoice->id
            ]);
        };

        // die();
        return redirect()->route('dashboard');
    }



    public function edit(Invoice $invoice)
    {
        $debtors = User::query()->where('role_id', Role::DEBTOR)->pluck('name', 'id')->toArray();
        $addresses = Address::query()->get()->pluck('address', 'id')->toArray();


        return view('invoices.edit')->with('invoice', $invoice)->with('debtors', $debtors)->with('addresses', $addresses);
    }

    public function update(Invoice $invoice, Request $request)
    {
        $formData = $request->all();
        $invoice->update([
            "attention_to" => $formData['attention_to'],
            "description" => $formData['description'],
            "invoice_date" => Carbon::createFromFormat("Y-m-d", $formData['invoice_date']),
            "expiration_date" => Carbon::createFromFormat("Y-m-d", $formData['expiration_date']),
            "debtor_id" => $formData['debtor_id'],
            "address_id" => $formData['address_id'],
        ]);
        $invoice->lines()->delete();

        foreach ($formData['invoice_line_description'] as $i => $description) {

            InvoiceLine::create([
                "description" => $description,
                "price_exclusive" => $formData['price'][$i],
                "VAT_percentage" => $formData['VAT_percentage'][$i],
                "invoice_id" => $invoice->id
            ]);
        };

        return redirect()->route('dashboard');
    }
}
