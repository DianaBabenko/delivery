<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\PersonRequest;
use App\Models\Invoice;
use App\Models\Recipient;
use App\Repositories\DeliveryTypeRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\InvoiceRepository;
use App\Repositories\ParcelRepository;
use App\Repositories\PersonRepository;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InvoiceController extends Controller
{
    /** @var InvoiceRepository */
    private $invoices;

    /** @var ParcelRepository */
    private $parcels;

    /** @var PersonRepository */
    private $persons;

    /** @var DeliveryTypeRepository */
    private $deliveries;

    /** @var DepartmentRepository */
    private $departments;

    /**
     * InvoiceController constructor.
     * @param InvoiceRepository $invoices
     * @param ParcelRepository $parcels
     */
    public function __construct(InvoiceRepository $invoices, ParcelRepository $parcels,
                                DepartmentRepository $departments, PersonRepository $persons,
                                DeliveryTypeRepository $deliveries
    )
    {
        $this->invoices = $invoices;
        $this->parcels = $parcels;
        $this->persons = $persons;
        $this->deliveries = $deliveries;
        $this->departments = $departments;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $paginateInvoices = $this->invoices->getInvoicesWithPaginate(20, auth()->user()->id);

        return view('invoices.index', [
            'invoices' => $paginateInvoices,
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $invoice = $this->invoices->find($id);

        if ($invoice === null) {
            throw new NotFoundHttpException();
        }

        $parcels = $this->parcels->getByInvoiceId($id);

        return view('invoices.show', [
            'invoice' => $invoice,
            'parcels' => $parcels,
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $invoice = Invoice::query()->make();
        $recipient = Recipient::query()->make();

        $deliveries = $this->deliveries->all();
        $departments = $this->departments->all();

        return view('invoices.create', [
            'invoice'       => $invoice,
            'deliveries'    => $deliveries,
            'departments'   => $departments,
            'recipient'     => $recipient,
        ]);
    }

    /**
     * @param InvoiceRequest $request
     * @param PersonRequest $personRequest
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(InvoiceRequest $request, PersonRequest $personRequest): RedirectResponse
    {
        $newInvoice = $request->input();
        /** @var Recipient $recipient */
        $recipient = $this->persons->store($personRequest);

        if ($recipient === null) {
            return back()
                ->withInput();
        }

        /** @var Invoice $invoice */
        $invoice = Invoice::query()->make($newInvoice);
        $invoice->recipient_id = $recipient->id;
        $invoice->sender_id = auth()->user()->id;
        $invoice->code = strtoupper(substr(sha1(random_bytes(20)), 0, 20));
        $invoice->save();

        if ($invoice) {
            return redirect()
                ->route('invoices.index');
        }

        return back()
            ->withInput();
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $invoice = $this->invoices->find($id);

        if ($invoice === null) {
            throw new NotFoundHttpException();
        }

        $recipient = $this->persons->find($invoice->recipient_id);
        $deliveries = $this->deliveries->all();
        $departments = $this->departments->all();

        return view('invoices.edit', [
            'invoice'       => $invoice,
            'recipient'     => $recipient,
            'deliveries'    => $deliveries,
            'departments'   => $departments
        ]);
    }

    /**
     * @param InvoiceRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(InvoiceRequest $request, int $id): RedirectResponse
    {
        $invoice = $this->invoices->find($id);

        if ($invoice === null) {
            return back()
                ->withInput();
        }

        $person = $this->persons->find($invoice->recipient_id);

        if ($person === null) {
            return back();
        }

        $updateInvoice = $request->all();

        $updateInvoice['delivery_date'] = Carbon::create($request['departure_date'])->addDays(3);

        $resultInvoice = $invoice->update($updateInvoice);
        $resultPerson = $person->update($request->all());

        if ($resultInvoice === true && $resultPerson === true) {
            return redirect()
                ->route('invoices.show', [$invoice->id]);
        }

        return back()
            ->withInput();
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $result = $this->invoices->delete($id);

        if ($result === 1) {
            return redirect()
                ->route('invoice.index')
            ;
        }

        return back()
            ->withInput();
    }
}
