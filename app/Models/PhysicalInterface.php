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
    Model,
    Relations\BelongsTo,
    Relations\HasMany,
    Relations\HasOne
};

/**
 * IXP\Models\PhysicalInterface
 *
 * @property int $id
 * @property int|null $switchportid
 * @property int|null $fanout_physical_interface_id
 * @property int|null $virtualinterfaceid
 * @property int|null $status
 * @property int|null $speed
 * @property string|null $duplex
 * @property string|null $notes
 * @property int $autoneg
 * @property-read \IXP\Models\CoreInterface|null $coreInterface
 * @property-read PhysicalInterface|null $fanoutPhysicalInterface
 * @property-read PhysicalInterface|null $peeringPhysicalInterface
 * @property-read \IXP\Models\SwitchPort|null $switchport
 * @property-read \Illuminate\Database\Eloquent\Collection|\IXP\Models\TrafficDailyPhysInt[] $trafficDailiesPhysInt
 * @property-read int|null $traffic_dailies_phys_int_count
 * @property-read \IXP\Models\VirtualInterface|null $virtualInterface
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereAutoneg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereDuplex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereFanoutPhysicalInterfaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereSwitchportid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhysicalInterface whereVirtualinterfaceid($value)
 * @mixin Eloquent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \IXP\Models\SwitchPort|null $switchPort
 * @method static \Illuminate\Database\Eloquent\Builder|\IXP\Models\PhysicalInterface whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\IXP\Models\PhysicalInterface whereUpdatedAt($value)
 */
class PhysicalInterface extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'physicalinterface';


    public const STATUS_CONNECTED       = 1;
    public const STATUS_DISABLED        = 2;
    public const STATUS_NOTCONNECTED    = 3;
    public const STATUS_XCONNECT        = 4;
    public const STATUS_QUARANTINE      = 5;

    public static $STATES = [
        self::STATUS_CONNECTED    => 'Connected',
        self::STATUS_DISABLED     => 'Disabled',
        self::STATUS_NOTCONNECTED => 'Not Connected',
        self::STATUS_XCONNECT     => 'Awaiting X-Connect',
        self::STATUS_QUARANTINE   => 'Quarantine'
    ];

    public static $APISTATES = [
        self::STATUS_CONNECTED    => 'connected',
        self::STATUS_DISABLED     => 'disabled',
        self::STATUS_NOTCONNECTED => 'notconnected',
        self::STATUS_XCONNECT     => 'awaitingxconnect',
        self::STATUS_QUARANTINE   => 'quarantine'
    ];

    public static $SPEED = [
        10    => '10 Mbps',
        100   => '100 Mbps',
        1000  => '1 Gbps',
        10000 => '10 Gbps',
        40000 => '40 Gbps',
        100000 => '100 Gbps',
        400000 => '400 Gbps'
    ];

    /**
     * Get the virtual interface that owns the physical interface.
     */
    public function virtualInterface(): BelongsTo
    {
        return $this->belongsTo(VirtualInterface::class, 'virtualinterfaceid' );
    }

    /**
     * Get the switch port that owns the physical interface.
     */
    public function switchPort(): BelongsTo
    {
        return $this->belongsTo(SwitchPort::class, 'switchportid');
    }

    /**
     * Get the fanout physical interface associated with the physical interface.
     */
    public function fanoutPhysicalInterface(): BelongsTo
    {
        return $this->belongsTo( __CLASS__, 'fanout_physical_interface_id' );
    }

    /**
     * Get the core interface associated with the physical interface.
     */
    public function coreInterface(): HasOne
    {
        return $this->hasOne(CoreInterface::class, 'physical_interface_id' );
    }

    /**
     * Get the peering physical interface associated with the physical interface.
     */
    public function peeringPhysicalInterface(): HasOne
    {
        return $this->hasOne( __CLASS__, 'fanout_physical_interface_id' );
    }

    /**
     * Get the trafficDailiesPhysInt associated with the physical interface.
     */
    public function trafficDailiesPhysInt(): HasMany
    {
        return $this->hasMany(TrafficDailyPhysInt::class, 'physicalinterface_id' );
    }

    /**
     * Determine if the port's status is set to QUARANTINE / CONNECTED
     *
     * @return bool True if the port's status is QUARANTINE / CONNECTED
     */
    public function statusIsConnectedOrQuarantine(): bool
    {
        return $this->status === self::STATUS_CONNECTED || $this->status === self::STATUS_QUARANTINE;
    }


    /**
     * Determine if the port's status is set to CONNECTED
     *
     * @return bool True if the port's status is CONNECTED
     */
    public function statusIsConnected(): bool
    {
        return $this->status === self::STATUS_CONNECTED;
    }

    /**
     * Determine if the port's status is set to DISABLED
     *
     * @return bool True if the port's status is DISABLED
     */
    public function statusIsDisabled(): bool
    {
        return $this->status === self::STATUS_DISABLED;
    }

    /**
     * Determine if the port's status is set to NOTCONNECTED
     *
     * @return bool True if the port's status is NOTCONNECTED
     */
    public function statusIsNotConnected(): bool
    {
        return $this->status === self::STATUS_NOTCONNECTED;
    }

    /**
     * Determine if the port's status is set to XCONNECT
     *
     * @return bool True if the port's status is XCONNECT
     */
    public function statusIsAwaitingXConnect(): bool
    {
        return $this->status === self::STATUS_XCONNECT;
    }

    /**
     * Determine if the port's status is set to QUARANTINE
     *
     * @return bool True if the port's status is QUARANTINE
     */
    public function statusIsQuarantine(): bool
    {
        return $this->status === self::STATUS_QUARANTINE;
    }

    /**
     * Try to find the most accurate version of the port's speed.
     *
     * I.e. try the actual SNMP-discovered port speed first, otherwise use the configured speed
     *
     * @return int
     */
    public function resolveDetectedSpeed()
    {
        // try the actual SNMP-discovered port speed first, otherwise use the configured speed:
        return $this->switchPort->ifHighSpeed > 0 ? $this->switchPort->ifHighSpeed : $this->speed;
    }

    /**
     * Turn the database integer representation of the speed into text as
     * defined in the self::$SPEEDS array (or 'Unknown')
     *
     * @return string
     */
    public function resolveSpeed(): string
    {
        return self::$SPEED[ $this->speed ] ?? 'Unknown';
    }

    /**
     * Turn the database integer representation of the states into text as
     * defined in the self::$STATES array (or 'Unknown')
     *
     * @return string
     */
    public function resolveStatus(): string
    {
        return self::$STATES[ $this->status ] ?? 'Unknown';
    }

    /**
     * Turn the database integer representation of the states into text suitable
     * for API output as defined in the self::$STATES array (or 'unknown')
     * @return string
     */
    public function resolveAPIStatus(): string
    {
        return self::$APISTATES[ $this->status ] ?? 'unknown';
    }

    /**
     * Is this port graphable?
     *
     * @return bool
     */
    public function isGraphable(): bool
    {
        return $this->statusIsConnectedOrQuarantine();
    }

    /**
     * Gets the related peering / fanout port for the current fanout / peering port
     *
     * For reseller functionality, we have the option of having fanout ports connectted to
     * peering ports. In this case, this function will return the related peering or
     * fanout port as appropriate.
     *
     * @return PhysicalInterface|bool The related peering / fanout port (or false for none / n/a)
     */
    public function getRelatedInterface()
    {
        if( $this->switchPort()->exists() ) {
            if( $this->switchPort->isTypeFanout() && $this->peeringPhysicalInterface()->exists() ){
                return $this->peeringPhysicalInterface;
            }

            if($this->switchPort->isTypePeering() && $this->fanoutPhysicalInterface()->exists() ) {
                return $this->fanoutPhysicalInterface;
            }
            return false;

        }
        return false;
    }
}