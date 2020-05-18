<?php


namespace App\Repositories;

use App\Models\Parcel;
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
     */
    public function delete(int $id): void
    {
        Parcel::query()
            ->where('id', '=', $id)
            ->delete()
        ;
    }
}
