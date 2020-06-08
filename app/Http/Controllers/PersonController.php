<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Invoice;
use App\Models\Recipient;
use App\Repositories\InvoiceRepository;
use App\Repositories\PersonRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PersonController
 * @package App\Http\Controllers
 */
class PersonController extends Controller
{
    /**
     * @var PersonRepository
     */
    private $persons;

    /**
     * @var InvoiceRepository
     */
    private $invoices;

    /**
     * PersonController constructor.
     * @param Recipient $persons
     * @param Invoice $invoices
     */
    public function __construct(Recipient $persons, Invoice $invoices)
    {
       $this->persons = $persons;
       $this->invoices = $invoices;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $paginatePersons = $this->persons->getPersonsWithPaginate(20);

        return view('');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $person = Recipient::query()->make();

        return view('');
    }

    /**
     * @param PersonRequest $request
     * @return RedirectResponse
     */
    public function store(PersonRequest $request): RedirectResponse
    {
        $newPerson = $request->input();

        Recipient::query()->make($newPerson);

        return back();
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        $person = $this->persons->find($id);

        if ($person === null) {
            throw new NotFoundHttpException();
        }

        return view('');
    }

    /**
     * @param $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PersonRequest $request, int $id): RedirectResponse
    {
        $person = $this->persons->find($id);

        if ($person === null) {
            return back();
        }

        $updatePerson = $request->all();

        $result = $person->update($updatePerson);

        if ($result === true) {
            return redirect();
        }

        return back();
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $person = $this->persons->delete($id);

        if ($person === 1) {
            return redirect()
                ->route();
        }

        return back();
    }
}
