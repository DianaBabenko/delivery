<?php


namespace App\Repositories;

use App\Models\Person;
use Illuminate\Support\Collection;

/**
 * Class PersonRepository
 * @package App\Repositories
 */
class PersonRepository
{
    /**
     * @param int $id
     * @return Person|null|object
     */
    public function find(int $id): ?Person
    {
        return Person::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Person::all();
    }

    /**
     * @param array $data
     * @return Person
     */
    public function create(array $data): Person
    {
        $newPerson = new Person();

        return $this->update($newPerson, $data);
    }

    /**
     * @param Person $person
     * @param array $data
     * @return Person
     */
    public function update(Person $person, array $data):  Person
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
        Person::query()
            ->where('id', '=', $id)
            ->delete()
        ;
    }
}
