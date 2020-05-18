<?php


namespace App\Repositories;

use App\Models\DeliveryType;
use Illuminate\Support\Collection;

/**
 * Class DeliveryTypeRepository
 * @package App\Repositories
 */
class DeliveryTypeRepository
{
    /**
     * @param int $id
     * @return DeliveryType|null|object
     */
    public function find(int $id): ?DeliveryType
    {
        return DeliveryType::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return DeliveryType::all();
    }

    /**
     * @param array $data
     * @return DeliveryType
     */
    public function create(array $data): DeliveryType
    {
        $newDeliveryType = new DeliveryType();

        return $this->update($newDeliveryType, $data);
    }

    /**
     * @param DeliveryType $deliveryType
     * @param array $data
     * @return DeliveryType
     */
    public function update(DeliveryType $deliveryType, array $data): DeliveryType
    {
        $deliveryType->name = $data['name'];
        $deliveryType->cost = $data['cost'];

        $deliveryType->save();
        return $deliveryType;
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        DeliveryType::query()
            ->where('id', '=', $id)
            ->delete()
        ;
    }
}
