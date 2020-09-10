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

use Illuminate\Database\Eloquent\{
    Builder,
    Model,
    Relations\HasMany
};

/**
 * IXP\Models\Location
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $shortname
 * @property string|null $tag
 * @property string|null $address
 * @property string|null $nocphone
 * @property string|null $nocfax
 * @property string|null $nocemail
 * @property string|null $officephone
 * @property string|null $officefax
 * @property string|null $officeemail
 * @property string|null $notes
 * @property int|null $pdb_facility_id
 * @property string|null $city
 * @property string|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\IXP\Models\Cabinet[] $cabinets
 * @property-read int|null $cabinets_count
 * @method static Builder|Location newModelQuery()
 * @method static Builder|Location newQuery()
 * @method static Builder|Location query()
 * @method static Builder|Location whereAddress($value)
 * @method static Builder|Location whereCity($value)
 * @method static Builder|Location whereCountry($value)
 * @method static Builder|Location whereId($value)
 * @method static Builder|Location whereName($value)
 * @method static Builder|Location whereNocemail($value)
 * @method static Builder|Location whereNocfax($value)
 * @method static Builder|Location whereNocphone($value)
 * @method static Builder|Location whereNotes($value)
 * @method static Builder|Location whereOfficeemail($value)
 * @method static Builder|Location whereOfficefax($value)
 * @method static Builder|Location whereOfficephone($value)
 * @method static Builder|Location wherePdbFacilityId($value)
 * @method static Builder|Location whereShortname($value)
 * @method static Builder|Location whereTag($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\IXP\Models\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\IXP\Models\Location whereUpdatedAt($value)
 */
class Location extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'shortname',
        'tag',
        'address',
        'nocphone',
        'nocfax',
        'nocemail',
        'officephone',
        'officefax',
        'officeemail',
        'notes',
        'pdb_facility_id',
        'city',
        'country',
    ];

    /**
     * Get the switchers for the cabinet
     */
    public function cabinets(): HasMany
    {
        return $this->hasMany(Cabinet::class, 'locationid' );
    }
}