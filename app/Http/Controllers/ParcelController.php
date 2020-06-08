<?php


namespace App\Http\Controllers;


use App\Http\Requests\ParcelRequest;
use App\Models\Invoice;
use App\Models\Parcel;
use App\Repositories\InvoiceRepository;
use App\Repositories\ParcelRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ParcelController extends Controller
{
    /** @var ParcelRepository */
    private $parcels;

    /** @var InvoiceRepository */
    private $invoices;

    /**
     * ParcelController constructor.
     * @param ParcelRepository $parcels
     * @param InvoiceRepository $invoices
     */
    public function __construct(ParcelRepository $parcels, InvoiceRepository $invoices)
    {
        $this->parcels = $parcels;
        $this->invoices = $invoices;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $paginateParcels = $this->parcels->getParcelsWithPaginate(25);

        return view();
    }

    /**
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $parcel = $this->parcels->find($id);

        if ($parcel === null) {
            throw new NotFoundHttpException();
        }

        return view('invoices.parcels.show', [
            'parcel' => $parcel,
        ]);
    }

    /**
     * @param int $invoice_id
     * @return View
     */
    public function create(int $invoice_id): View
    {
        $parcel = Parcel::query()->make();

        $invoice = $this->invoices->find($invoice_id);

        if ($invoice === null) {
            throw new NotFoundHttpException();
        }

        return view('invoices.parcels.create', [
            'invoice' => $invoice,
            'parcel' => $parcel
        ]);
    }

    /**
     * @param ParcelRequest $request
     * @param int $invoice_id
     * @return RedirectResponse
     */
    public function store(ParcelRequest $request, int $invoice_id): RedirectResponse
    {
        $newParcel = $request->input();

        $invoice = $this->invoices->find($invoice_id);

        if ($invoice === null) {
            throw new NotFoundHttpException();
        }

        /** @var Parcel $parcel */
        $parcel = Parcel::query()->make($newParcel);
        $parcel->invoice_id = $invoice->id;
        //$parcel->volume = $request['height'] * $request['width'] * $request['length'];
        $parcel->save();

        $this->invoices->updatePrice($invoice);  // :TODO update invoicePrice

        $parcels = $this->parcels->getByInvoiceId($invoice->id);

        if ($parcel) {
            return redirect()
            ->route('invoices.show', [
                    'invoice' => $invoice,
                    'parcels' => $parcels,
            ]);
        }

        return back()
            ->withInput();
    }

    /**
     * @param int $invoice_id
     * @param int $parcel_id
     * @return View
     */
    public function edit(int $invoice_id, int $parcel_id): View
    {
        $parcel = $this->parcels->find($parcel_id);

        if ($parcel === null) {
            throw new NotFoundHttpException();
        }

        $invoice = $this->invoices->find($parcel->invoice_id);

        if ($invoice === null) {
            throw new NotFoundHttpException();
        }

        return view('invoices.parcels.edit', [
            'invoice' => $invoice,
            'parcel' => $parcel
        ]);
    }

    /**
     * @param ParcelRequest $request
     * @param int $invoice_id
     * @param int $parcel_id
     * @return RedirectResponse
     */
    public function update(ParcelRequest $request, int $invoice_id, int $parcel_id): RedirectResponse
    {
        $parcel = $this->parcels->find($parcel_id);

        if ($parcel === null) {
            return back();
        }

        /** @var Invoice $invoice */
        $invoice = $this->invoices->find($invoice_id);

        if ($invoice === null) {
            throw new NotFoundHttpException();
        }

        $updateParcel = $request->all();
        $updateParcel['volume'] = $request['height'] * $request['width'] * $request['length'];

        $result = $parcel->update($updateParcel);
        $this->invoices->updatePrice($invoice);  // :TODO update invoicePrice

        $parcels = $this->parcels->getByInvoiceId($invoice->id);

        if ($result === true) {
            return redirect()
                ->route('invoices.show', [
                    'invoice' => $invoice,
                    'parcels' => $parcels,
                ]);
        }

        return back()
            ->withInput();
    }

    /**
     * @param int $invoice_id
     * @param int $parcel_id
     * @return RedirectResponse
     */
    public function destroy(int $invoice_id, int $parcel_id): RedirectResponse
    {
        if ($this->parcels->delete($parcel_id) === 1) {
            return redirect();
        }

        return back();
    }
}
