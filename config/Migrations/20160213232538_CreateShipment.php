<?php
use Migrations\AbstractMigration;

class CreateShipment extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('shipments');
        $table
            ->addColumn('rate', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('shipment_id', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('last_known_status', 'string', [
                'limit' => 15,
                'null' => true,
            ])
            ->addColumn('shippo_object_id', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('tracking_number', 'string', [
                'limit' => 255,
                'null' => false,
            ])

            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addColumn('deleted', 'datetime', ['default' => null, 'null' => true]);
        $table->create();
    }
}
