<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryTypeRequest;
use App\Models\DeliveryType;
use App\Repositories\DeliveryTypeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeliveryTypeController extends Controller
{
    /**
     * @var DeliveryTypeRepository
     */
    private $deliveryTypes;

    public function __construct(DeliveryTypeRepository $deliveryTypes)
    {
        $this->deliveryTypes = $deliveryTypes;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $paginateDeliveryTypes = $this->deliveryTypes->getDeliveryTypesWithPaginate(25);

        return view();
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $deliveryType = DeliveryType::query()->make();

        return view();
    }

    /**
     * @param $request
     * @return RedirectResponse
     */
    public function store(DeliveryTypeRequest $request): RedirectResponse
    {
        $newDeliveryType = $request->input();

        /** @var DeliveryType $deliveryType */
        $deliveryType = DeliveryType::query()->make($newDeliveryType);

        if ($deliveryType === true) {
            return redirect();
        }

        return back();
    }

    /**
     * @param $id
     * @return View
     */
    public function edit(int $id): View
    {
        $deliveryType = $this->deliveryTypes->find($id);

        if ($deliveryType === null) {
            throw new NotFoundHttpException();
        }

        return view();
    }

    /**
     * @param $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(DeliveryTypeRequest $request, int $id): RedirectResponse
    {
        $deliveryType = $this->deliveryTypes->find($id);

        if ($deliveryType === null) {
            return back();
        }

        $updateDeliveryType = $request->all();

        $result = $deliveryType->update($updateDeliveryType);

        if ($result === true) {
            return redirect();
        }

        return back();
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if ($this->deliveryTypes->delete($id) === 1) {
            return redirect();
        }

        return back();
    }
}
