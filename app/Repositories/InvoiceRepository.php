<?php


namespace App\Repositories;

use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class InvoiceRepository
 * @package App\Repositories
 */
class InvoiceRepository
{
    /**
     * @var ParcelRepository
     */
    private $parcels;

    public function __construct(ParcelRepository $parcels)
    {
        $this->parcels = $parcels;
    }

    /**
     * @param int $id
     * @return Invoice|null|object
     */
    public function find(int $id): ?Invoice
    {
        return Invoice::query()->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Invoice::all();
    }

    /**
     * @param array $data
     * @return Invoice
     */
    public function create(array $data): Invoice
    {
        $newInvoice = new Invoice();

        return $this->update($newInvoice, $data);
    }

    /**
     * @param Invoice $invoice
     * @param array $data
     * @return Invoice
     */
    public function update(Invoice $invoice, array $data): Invoice
    {
        $invoice->code = $data['code'];
        $invoice->sender_id = $data['sender_id'];
        $invoice->recipient_id = $data['recipient_id'];
        $invoice->from_department_id = $data['from_department_id'];
        $invoice->to_department_id = $data['to_department_id'];
        $invoice->departure_date = $data['departure_date'];
        $invoice->delivery_type_id = $data['delivery_type_id'];
        $invoice->save();
        return $invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function updatePrice(Invoice $invoice): void
    {
        $invoice->price = $this->parcels->getCostsByInvoiceId($invoice->id);
        $invoice->save();
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        Invoice::query()
            ->where('id', '=', $id)
            ->delete()
        ;
    }

    /**
     * @param int|null $count
     * @param int $user_id
     * @return LengthAwarePaginator
     */
    public function getInvoicesWithPaginate(int $count = null, int $user_id): LengthAwarePaginator
    {
        return Invoice::query()
            ->where('sender_id', '=', $user_id)
            ->orderBy('id', 'desc')
            ->paginate($count)
        ;
    }
}
