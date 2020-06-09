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
 * Class RecipientController
 * @package App\Http\Controllers
 */
class RecipientController extends Controller
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
     * RecipientController constructor.
     * @param Recipient $persons
     */
    public function __construct(Recipient $persons)
    {
       $this->persons = $persons;
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
