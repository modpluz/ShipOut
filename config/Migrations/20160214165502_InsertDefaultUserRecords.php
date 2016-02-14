<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

class InsertDefaultUserRecords extends AbstractMigration
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
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->newEntity(
            [
                'email' => 'shippo@imerlabs.com',
                'password' => (new DefaultPasswordHasher)->hash('whocares'),
                'name'  => 'Remi',
                'mobile_number'  => '4153737251'
            ]
        );

        $usersTable->save($user);

    }
}
