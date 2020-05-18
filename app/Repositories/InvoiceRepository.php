<?php


namespace App\Repositories;

use App\Models\Invoice;
use Illuminate\Support\Collection;

/**
 * Class InvoiceRepository
 * @package App\Repositories
 */
class InvoiceRepository
{
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
        $invoice->delivery_date = $data['delivery_date'];
        $invoice->delivery_type_id = $data['delivery_type_id'];

        $invoice->save();
        return $invoice;
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
}
