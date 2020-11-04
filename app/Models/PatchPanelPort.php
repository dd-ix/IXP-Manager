<?php

namespace IXP\Models;

/*
 * Copyright (C) 2009 - 2020 Internet Neutral Exchange Association Company Limited By Guarantee.
 * All Rights Reserved.
 *
 * This file is part of IXP Manager.
 *
 * IXP Manager is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation, version v2.0 of the License.
 *
 * IXP Manager is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License v2.0
 * along with IXP Manager.  If not, see:
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
*/

use Eloquent;

use Illuminate\Database\Eloquent\{
    Builder,
    Model
};

use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasMany
};

/**
 * IXP\Models\PatchPanelPort
 *
 * @property int $id
 * @property int|null $switch_port_id
 * @property int|null $patch_panel_id
 * @property int|null $customer_id
 * @property int $state
 * @property string|null $notes
 * @property string|null $assigned_at
 * @property string|null $connected_at
 * @property string|null $cease_requested_at
 * @property string|null $ceased_at
 * @property string|null $last_state_change
 * @property int $internal_use
 * @property int $chargeable
 * @property int|null $duplex_master_id
 * @property int $number
 * @property string|null $colo_circuit_ref
 * @property string|null $ticket_ref
 * @property string|null $private_notes
 * @property int $owned_by
 * @property string|null $loa_code
 * @property string|null $description
 * @property string|null $colo_billing_ref
 * @property-read \IXP\Models\PatchPanel|null $patchPanel
 * @property-read \Illuminate\Database\Eloquent\Collection|\IXP\Models\PatchPanelPortFile[] $patchPanelPortFiles
 * @property-read int|null $patch_panel_port_files_count
 * @property-read \Illuminate\Database\Eloquent\Collection|PatchPanelPort[] $slavePort
 * @property-read int|null $slave_port_count
 * @property-read \IXP\Models\SwitchPort|null $switchPort
 * @method static Builder|PatchPanelPort newModelQuery()
 * @method static Builder|PatchPanelPort newQuery()
 * @method static Builder|PatchPanelPort query()
 * @method static Builder|PatchPanelPort whereAssignedAt($value)
 * @method static Builder|PatchPanelPort whereCeaseRequestedAt($value)
 * @method static Builder|PatchPanelPort whereCeasedAt($value)
 * @method static Builder|PatchPanelPort whereChargeable($value)
 * @method static Builder|PatchPanelPort whereColoBillingRef($value)
 * @method static Builder|PatchPanelPort whereColoCircuitRef($value)
 * @method static Builder|PatchPanelPort whereConnectedAt($value)
 * @method static Builder|PatchPanelPort whereCustomerId($value)
 * @method static Builder|PatchPanelPort whereDescription($value)
 * @method static Builder|PatchPanelPort whereDuplexMasterId($value)
 * @method static Builder|PatchPanelPort whereId($value)
 * @method static Builder|PatchPanelPort whereInternalUse($value)
 * @method static Builder|PatchPanelPort whereLastStateChange($value)
 * @method static Builder|PatchPanelPort whereLoaCode($value)
 * @method static Builder|PatchPanelPort whereNotes($value)
 * @method static Builder|PatchPanelPort whereNumber($value)
 * @method static Builder|PatchPanelPort whereOwnedBy($value)
 * @method static Builder|PatchPanelPort wherePatchPanelId($value)
 * @method static Builder|PatchPanelPort wherePrivateNotes($value)
 * @method static Builder|PatchPanelPort whereState($value)
 * @method static Builder|PatchPanelPort whereSwitchPortId($value)
 * @method static Builder|PatchPanelPort whereTicketRef($value)
 * @mixin Eloquent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IXP\Models\Customer|null $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\IXP\Models\PatchPanelPort whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\IXP\Models\PatchPanelPort whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\IXP\Models\PatchPanelPortFile[] $patchPanelPortFilesPublic
 * @property-read int|null $patch_panel_port_files_public_count
 */

class PatchPanelPort extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patch_panel_port';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patch_panel_id',
        'state',
        'number',
        'chargeable',
        'last_state_change',
    ];

    /**
     * CONST STATES
     */
    public const STATE_AVAILABLE              = 1;
    public const STATE_AWAITING_XCONNECT      = 2;
    public const STATE_CONNECTED              = 3;
    public const STATE_AWAITING_CEASE         = 4;
    public const STATE_CEASED                 = 5;
    public const STATE_BROKEN                 = 6;
    public const STATE_RESERVED               = 7;
    public const STATE_PREWIRED               = 8;
    public const STATE_OTHER                  = 999;

    /**
     * Array STATES for available
     */
    public static $AVAILABLE_STATES = [
        self::STATE_AVAILABLE,
        self::STATE_PREWIRED,
        self::STATE_AWAITING_CEASE,
        self::STATE_CEASED,
    ];

    /**
     * CONST CHARGEABLE
     */
    public const CHARGEABLE_YES                = 1;
    public const CHARGEABLE_NO                 = 2;
    public const CHARGEABLE_HALF               = 3;
    public const CHARGEABLE_OTHER              = 4;

    /**
     * Array $CHARGEABLES
     */
    public static $CHARGEABLES = [
        self::CHARGEABLE_YES            => "Yes",
        self::CHARGEABLE_NO             => "No",
        self::CHARGEABLE_HALF           => "Half",
        self::CHARGEABLE_OTHER          => "Other"
    ];

    /**
     * Get the Patch Panel that owns this patch panel port
     */
    public function patchPanel(): BelongsTo
    {
        return $this->belongsTo( PatchPanel::class , 'patch_panel_id' );
    }

    /**
     * Get the switch port that owns this patch panel port
     */
    public function switchPort(): BelongsTo
    {
        return $this->belongsTo( SwitchPort::class , 'switch_port_id' );
    }

    /**
     * Get the customer that owns this patch panel port
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo( Customer::class , 'customer_id' );
    }

    /**
     * Get the duplex master port that owns this patch panel port
     */
    public function duplexMasterPort(): BelongsTo
    {
        return $this->belongsTo( __CLASS__, 'duplex_master_id' );
    }

    /**
     * Get the patch panel port files for this patch panel port
     */
    public function patchPanelPortFiles(): HasMany
    {
        return $this->hasMany(PatchPanelPortFile::class, 'patch_panel_port_id' );
    }

    /**
     * Get the public patch panel port files for this patch panel port
     */
    public function patchPanelPortFilesPublic(): HasMany
    {
        return $this->hasMany(PatchPanelPortFile::class, 'patch_panel_port_id' )
            ->where( 'is_private', 0 );
    }

    /**
     * Get the duplex slaves ports for this patch panel port
     */
    public function duplexSlavePorts(): HasMany
    {
        return $this->hasMany( __CLASS__ , 'duplex_master_id' );
    }

    /**
     * Get name
     *
     * @return integer
     */
    public function getName()
    {
        $name = $this->patchPanel->port_prefix . $this->number;


        // finish me
//        if( $this->hasSlavePort() ) {
//            $name .= '/' . $this->getDuplexSlavePortName() . ' ';
//            $name .= '(' . ( $this->getNumber() % 2 ? ( floor( $this->getNumber() / 2 ) ) + 1 : $this->getNumber() / 2 ) . ')';
//        }
        return $name;
    }
}
