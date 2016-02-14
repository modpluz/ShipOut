<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShipmentDefault Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $sender_name
 * @property string $sender_company
 * @property string $sender_city
 * @property string $sender_state
 * @property string $sender_postcode
 * @property string $sender_country
 * @property string $receiver_name
 * @property string $receiver_company
 * @property string $receiver_city
 * @property string $receiver_state
 * @property string $receiver_postcode
 * @property string $receiver_country
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 */
class ShipmentDefault extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
