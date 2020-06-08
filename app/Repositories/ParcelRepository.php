<?php


namespace App\Repositories;

use App\Models\Parcel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class ParcelRepository
 * @package App\Repositories
 */
class ParcelRepository
{
    /**
     * @param int $id
     * @return Parcel|null|object
     */
    public function find(int $id): ?Parcel
    {
        return Parcel::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Parcel::all();
    }

    /**
     * @param array $data
     * @return Parcel
     */
    public function create(array $data): Parcel
    {
        $newParcel = new Parcel();

        return $this->update($newParcel, $data);
    }

    /**
     * @param Parcel $parcel
     * @param array $data
     * @return Parcel
     */
    public function update(Parcel $parcel, array $data): Parcel
    {
        $parcel->weight = $data['weight'];
        $parcel->length = $data['length'];
        $parcel->width = $data['width'];
        $parcel->height = $data['height'];
        $parcel->volume = $data['volume'];
        $parcel->description = $data['description'];
        $parcel->cost = $data['cost'];

        $parcel->save();
        return $parcel;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Parcel::query()
            ->where('id', '=', $id)
            ->delete()
        ;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByInvoiceId(int $id): Collection
    {
        return Parcel::query()
            ->where('invoice_id', '=', $id)
            ->get()
        ;
    }

    /**
     * @param int|null $count
     * @return LengthAwarePaginator
     */
    public function getParcelsWithPaginate(int $count = null): LengthAwarePaginator
    {
        Parcel::query()
            ->paginate($count)
        ;
    }

    /**
     * @param int $id
     * @return float
     */
    public function getCostsByInvoiceId(int $id): float
    {
        /** @var ParcelRepository $parcels */
        $parcels = $this->getByInvoiceId($id);

        $sum = 0;

        foreach ($parcels as $parcel) {
            $sum += $parcel->cost;
        }

        return $sum;
    }
}
