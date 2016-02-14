<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table
            ->addColumn('email', 'string', [
                'limit' => 75,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('mobile_number', 'string', [
                'limit' => 75,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'limit' => 225,
                'null' => false,
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addColumn('deleted', 'datetime', ['default' => null, 'null' => true]);
        $table->create();



    }
}
