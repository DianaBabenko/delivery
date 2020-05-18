<?php


namespace App\Repositories;

use App\Models\Department;
use Illuminate\Support\Collection;

/**
 * Class DepartmentRepository
 * @package App\Repositories
 */
class DepartmentRepository
{
    /**
     * @param int $id
     * @return Department|null|object
     */
    public function find(int $id): ?Department
    {
        return Department::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Department::all();
    }

    /**
     * @param array $data
     * @return Department
     */
    public function create(array $data): Department
    {
        $newDepartment = new Department();

        return $this->update($newDepartment, $data);
    }

    /**
     * @param Department $department
     * @param array $data
     * @return Department
     */
    public function update(Department $department, array $data): Department
    {
        $department->name = $data['name'];
        $department->address = $data['address'];

        $department->save();
        return $department;
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        Department::query()
            ->where('id', '=', $id)
            ->delete()
        ;
    }
}
