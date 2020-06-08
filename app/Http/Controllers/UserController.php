<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\InvoiceRepository;
use App\Repositories\ParcelRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    /** @var UserRepository */
    private $users;

    /** @var InvoiceRepository */
    private $invoices;

    /** @var ParcelRepository */
    private $parcels;

    /**
     * UserController constructor.
     * @param UserRepository $users
     * @param InvoiceRepository $invoices
     * @param ParcelRepository $parcels
     */
    public function __construct(UserRepository $users, InvoiceRepository $invoices,
                                ParcelRepository $parcels
    )
    {
        $this->users = $users;
        $this->invoices = $invoices;
        $this->parcels = $parcels;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $user = $this->users->find(auth()->user()->id);

        if ($user === null) {
            throw new NotFoundHttpException();
        }

        return view('account.index', [
            'user' => $user
        ]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $user = $this->users->find($id);

        if ($user === null) {
            throw new NotFoundHttpException();
        }

        return view('account.edit', [
            'user' => $user,
        ]);
    }

    /**
     * @param UserRequest $request
     * @param int $invoice_id
     * @param int $user_id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, int $invoice_id, int $user_id): RedirectResponse
    {
        $user = $this->users->find($user_id);
        //$invoice = $this->invoices->find($invoice_id);

        if ($user === null) {
            return back()
                ->withInput();
        }

//        if ($invoice === null) {
////            throw new NotFoundHttpException();
////        }

        $updateUser = $request->all();

        $result = $user->update($updateUser);
        //$parcels = $this->parcels->getByInvoiceId($invoice->id);

        if ($result === true) {
            return redirect()
                ->route('invoices.index');
        }

        return back()
            ->withInput();
    }
}
