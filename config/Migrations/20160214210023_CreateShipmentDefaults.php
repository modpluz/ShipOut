<?php
use Migrations\AbstractMigration;

class CreateShipmentDefaults extends AbstractMigration
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
        $table = $this->table('shipment_defaults');
        $table
            ->addColumn('user_id', 'integer', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('sender_name', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('sender_company', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('sender_city', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('sender_state', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('sender_postcode', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('sender_country', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('sender_email', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('sender_phone', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('sender_address', 'string', [
                'limit' => 255,
                'null' => true,
            ])

            ->addColumn('receiver_name', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('receiver_company', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('receiver_city', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('receiver_state', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('receiver_postcode', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('receiver_country', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('receiver_email', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('receiver_phone', 'string', [
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('receiver_address', 'string', [
                'limit' => 255,
                'null' => true,
            ])

            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addColumn('deleted', 'datetime', ['default' => null, 'null' => true]);
        $table->create();
    }
}
