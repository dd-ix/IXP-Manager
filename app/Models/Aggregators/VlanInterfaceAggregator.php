<?php

namespace IXP\Models\Aggregators;

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
};
use Illuminate\Support\Collection;

use IXP\Models\{
    Customer,
    PhysicalInterface,
    Vlan,
    VlanInterface
};

class VlanInterfaceAggregator extends VlanInterface
{

    /**
     * Utility function to provide an array of VLAN interface objects on a given VLAN.
     *
     * @param Vlan $vlan The VLAN to gather VlanInterfaces for
     * @param bool $protocol Either 4 or 6 to limit the results to interface with IPv4 / IPv6
     *
     * @return Collection
     *
     */
    public static function getForVlan( Vlan $vlan, $protocol = false )
    {
        return self::select( [ 'vli.*' ] )
            ->from( 'vlaninterface AS vli' )
            ->Join( 'vlan AS v', 'v.id', 'vli.vlanid' )
            ->Join( 'virtualinterface AS vi', 'vi.id', 'vli.virtualinterfaceid' )
            ->Join( 'physicalinterface AS pi', 'pi.virtualinterfaceid', 'vi.id' )
            ->Join( 'cust', 'cust.id', 'vi.custid' )
            ->where( 'v.id', $vlan->id )
            ->whereRaw( Customer::SQL_CUST_ACTIVE )
            ->whereRaw( Customer::SQL_CUST_CURRENT )
            ->whereRaw( Customer::SQL_CUST_TRAFFICING )
            ->whereRaw( Customer::SQL_CUST_EXTERNAL )
            ->where( 'pi.status', PhysicalInterface::STATUS_CONNECTED )
            ->when( $protocol , function( Builder $q, $proto ) {
                $p = in_array( $proto, [ 4, 6 ], true ) ? $proto : 4;
                return $q->whereRaw( "vli.ipv{$p}enabled = 1" );
            })
            ->orderBy( 'cust.name' )->get()->keyBy( 'id' );
    }

    /**
     * Utility function to provide an array of all VLAN interfaces on a given
     * VLAN for a given protocol.
     *
     * Returns an array of elements such as:
     *
     *     [
     *         [cid] => 999
     *         [cname] => Customer Name
     *         [abrevcname] => Abbreviated Customer Name
     *         [cshortname] => shortname
     *         [autsys] => 65500
     *         [gmaxprefixes] => 20        // from cust table (global)
     *         [peeringmacro] => ABC
     *         [peeringmacrov6] => ABC
     *         [vid]        => 2
     *         [vtag]       => 10,
     *         [vname]      => "Peering LAN #1
     *         [viid] => 120
     *         [vliid] => 159
     *         [canping] => 1
     *         [enabled] => 1              // VLAN interface enabled for requested protocol?
     *         [address] => 192.0.2.123    // assigned address for requested protocol?
     *         [monitorrcbgp] => 1
     *         [bgpmd5secret] => qwertyui  // MD5 for requested protocol
     *         [hostname] => hostname      // Hostname
     *         [maxbgpprefix] => 20        // VLAN interface max prefixes
     *         [as112client] => 1          // if the member is an as112 client or not
     *         [rsclient] => 1             // if the member is a route server client or not
     *         [rsmorespecifics] => 0/1    // if IRRDB filtering should allow more specifics
     *         [busyhost]
     *         [sid]
     *         [sname]
     *         [cabid]
     *         [cabname]
     *         [location_name]
     *         [location_tag]
     *         [location_shortname]
     *     ]
     *
     * @param Vlan  $vlan       The VLAN
     * @param int   $proto      Either 4 or 6
     * @param int   $pistatus   The status of the physical interface
     *
     * @return array
     *
     * @throws
     */
    public static function getForProto( Vlan $vlan, int $proto, int $pistatus = PhysicalInterface::STATUS_CONNECTED ) : array
    {
        if( !in_array( $proto, [ 4, 6 ] ) ){
            $proto = 4;
        }

        return self::select( [
            'cust.id AS cid', 'cust.name AS cname',
            'cust.abbreviatedName AS abrevcname',
            'cust.shortname AS cshortname',
            'cust.autsys AS autsys', 'cust.maxprefixes AS gmaxprefixes',
            'cust.peeringmacro AS peeringmacro', 'cust.peeringmacrov6  AS peeringmacrov6',

            'v.id AS vid', 'v.number AS vtag', 'v.name AS vname', 'vi.id AS viid',

            'vli.id AS vliid',

            "vli.ipv{$proto}enabled      AS enabled" ,
            "vli.ipv{$proto}hostname     AS hostname" ,
            "vli.ipv{$proto}monitorrcbgp AS monitorrcbgp" ,
            "vli.ipv{$proto}bgpmd5secret AS bgpmd5secret" ,
            'vli.maxbgpprefix            AS maxbgpprefix' ,
            'vli.as112client             AS as112client' ,
            'vli.rsclient                AS rsclient' ,
            'vli.busyhost                AS busyhost' ,
            'vli.irrdbfilter             AS irrdbfilter' ,
            'vli.rsmorespecifics         AS rsmorespecifics' ,
            "vli.ipv{$proto}canping      AS canping" ,

            'addr.address AS address',

            's.id   AS sid' ,
            's.name AS sname' ,

            'cab.id   AS cabid' ,
            'cab.name AS cabname' ,

            'l.id        AS location_id' ,
            'l.name      AS location_name' ,
            'l.shortname AS location_shortname' ,
            'l.tag       AS location_tag'
        ] )
            ->from( 'vlaninterface AS vli' )
            ->leftJoin( 'virtualinterface AS vi', 'vi.id', 'vli.virtualinterfaceid' )
            ->leftJoin( "ipv{$proto}address AS addr", 'addr.id', "vli.ipv{$proto}addressid" )
            ->leftJoin( 'cust', 'cust.id', 'vi.custid' )
            ->leftJoin( 'physicalinterface AS pi', 'pi.virtualinterfaceid', 'vi.id' )
            ->leftjoin( 'switchport AS sp', 'sp.id', 'pi.switchportid' )
            ->leftJoin( 'switch AS s', 's.id', 'sp.switchid')
            ->leftJoin( 'cabinet AS cab', 'cab.id', 's.cabinetid')
            ->leftJoin( 'location AS l', 'l.id', 'cab.locationid')
            ->leftJoin( 'vlan AS v', 'v.id', 'vli.vlanid' )
            ->where( 'v.id', $vlan->id )
            ->whereRaw( Customer::SQL_CUST_ACTIVE )
            ->whereRaw( Customer::SQL_CUST_CURRENT )
            ->whereRaw( Customer::SQL_CUST_TRAFFICING )
            ->where( 'pi.status', $pistatus )
            ->groupByRaw( "vli.id, cust.id, cust.name, cust.abbreviatedName, cust.shortname, cust.autsys,
                        cust.maxprefixes, cust.peeringmacro, cust.peeringmacrov6,
                        vli.ipv{$proto}enabled, addr.address, vli.ipv{$proto}bgpmd5secret, vli.maxbgpprefix,
                        vli.ipv{$proto}hostname, vli.ipv{$proto}monitorrcbgp, vli.busyhost,
                        vli.as112client, vli.rsclient, vli.irrdbfilter, vli.ipv{$proto}canping,
                        s.id, s.name,
                        cab.id, cab.name,
                        l.name, l.shortname, l.tag" )
            ->orderByRaw( 'cust.autsys ASC, vli.id ASC' )->get()->toArray();
    }
}
