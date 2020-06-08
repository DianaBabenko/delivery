<?php


namespace App\Repositories;

use App\Http\Requests\PersonRequest;
use App\Models\Recipient;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PersonRepository
 * @package App\Repositories
 */
class PersonRepository
{
    /**
     * @param int $id
     * @return Recipient|null|object
     */
    public function find(int $id): ?Recipient
    {
        return Recipient::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Recipient::all();
    }

    /**
     * @param array $data
     * @return Recipient
     */
    public function create(array $data): Recipient
    {
        $newPerson = new Recipient();

        return $this->update($newPerson, $data);
    }

    /**
     * @param Request $request
     * @return Recipient|object
     */
    public function store(Request $request): Recipient
    {
        $newPerson = $request->input();

        $person = Recipient::query()->create($newPerson);

        if ($person === null) {
            throw new NotFoundHttpException();
        }

        return $person;
    }

    /**
     * @param Recipient $person
     * @param array $data
     * @return Recipient
     */
    public function update(Recipient $person, array $data):  Recipient
    {
        $person->name = $data['name'];
        $person->surname = $data['surname'];
        $person->patronymic = $data['patronymic'];
        $person->phone = $data['phone'];

        $person->save();
        return $person;
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        Recipient::query()
            ->where('id', '=', $id)
            ->delete()
        ;
    }

    /**
     * @param int|null $count
     * @return LengthAwarePaginator
     */
    public function getPersonsWithPaginate(int $count = null): LengthAwarePaginator
    {
        return Recipient::query()
            ->with(['invoice'])
            ->paginate($count)
        ;
    }
}
