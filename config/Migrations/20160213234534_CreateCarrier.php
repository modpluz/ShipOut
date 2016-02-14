<?php
use Migrations\AbstractMigration;

class CreateCarrier extends AbstractMigration
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
        $table = $this->table('carriers');
        $table
            ->addColumn('name', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('shippo_id', 'integer', [
                'limit' => 5,
                'null' => true,
            ])

            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addColumn('deleted', 'datetime', ['default' => null, 'null' => true]);
        $table->create();
    }
}
