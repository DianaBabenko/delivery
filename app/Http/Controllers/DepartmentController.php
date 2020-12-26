<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Repositories\DeliveryTypeRepository;
use App\Repositories\DepartmentRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DepartmentController extends Controller
{
    /** @var DepartmentRepository */
    private $departments;

    /** @var DeliveryTypeRepository */
    private $deliveryTypes;

    public function __construct(DepartmentRepository $departments, DeliveryTypeRepository $deliveryTypes)
    {
        $this->departments = $departments;
        $this->deliveryTypes = $deliveryTypes;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $departments = $this->departments->all();
        $deliveryTypes = $this->deliveryTypes->all();

        return view('about.departments.index', [
            'departments'   => $departments,
            'deliveryTypes' => $deliveryTypes
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $department = Department::query()->make();

        return view();
    }

    /**
     * @param DepartmentRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentRequest $request): RedirectResponse
    {
        $newDepartment = $request->input();

        $department = Department::query()->make($newDepartment);

        if ($department === true) {
            return redirect();
        }

        return back();
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $department = $this->departments->find($id);

        if ($department === null) {
            throw new NotFoundHttpException();
        }

        return view();
    }

    /**
     * @param $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(DepartmentRequest $request, int $id): RedirectResponse
    {
        $department = $this->departments->find($id);

        if ($department === null) {
            return back();
        }

        $updateDepartment = $request->all();

        $result = $department->update($updateDepartment);

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
        if ($this->departments->delete($id) === 1) {
            return redirect();
        }

        return back();
    }
}
