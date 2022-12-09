<?php
/*
 * Bird AS112 Configuration Template
 *
 *
 * You should not need to edit these files - instead use your own custom skins. If
 * you can't effect the changes you need with skinning, consider posting to the mailing
 * list to see if it can be achieved / incorporated.
 *
 * Skinning: https://ixp-manager.readthedocs.io/en/latest/features/skinning.html
 *
 * Copyright (C) 2009 - 2019 Internet Neutral Exchange Association Company Limited By Guarantee.
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
?>
#
# Bird AS112 configuration generated by IXP Manager
#
# Do not edit this file, it will be overwritten.
#
# Generated: <?= date('Y-m-d H:i:s') . "\n" ?>
#

# For VLAN: <?= $t->vlan->name ?> (Tag: <?= $t->vlan->number ?>, Database ID: <?= $t->vlan->id ?>)

# standardise time formats:
timeformat base         iso long;
timeformat log          iso long;
timeformat protocol     iso long;
timeformat route        iso long;


log "/var/log/bird/<?= $t->handle ?>.log" all;
log syslog all;

define routerasn     = <?= $t->router->asn       ?>;
define routeraddress = <?= $t->router->peering_ip ?>;

router id <?= $t->router->router_id ?>;
listen bgp address routeraddress;

protocol kernel {
    export all;
    scan time 120;
}

protocol device {
    scan time 10;
}

# These function excludes weird networks
#  rfc1918, class D, class E, too long and too short prefixes

<?php if( $t->router->protocol === 4 ): ?>

function avoid_martians_v4()
prefix set martiansv4;
{
        # This list of martians is obtained from the IANA IPv4
        # Special-Purpose Address Registry:
        # http://www.iana.org/assignments/iana-ipv4-special-registry
        martiansv4 = [
                10.0.0.0/8+,            # RFC1918 - Private use
                100.64.0.0/10+,         # RFC6598 - Shared address space
                127.0.0.0/8+,           # RFC1122 - Loopback
                169.254.0.0/16+,        # RFC3927 - Link-local
                172.16.0.0/12+,         # RFC1918 - Private use
                192.0.0.0/24+,          # multiple RFCs
                192.0.2.0/24+,          # RFC5737 - Documentation - TEST-NET-1
                192.168.0.0/16+,        # RFC1918 - Private use
                198.18.0.0/15+,         # RFC2544 - Benchmarking
                198.51.100.0/24+,       # RFC5737 - Documentation - TEST-NET-2
                203.0.113.0/24+,        # RFC5737 - Documentation - TEST-NET-3
                224.0.0.0/4+,           # RFC3171 - Multicast
                240.0.0.0/4+,           # RFC1112 - Reserved
                0.0.0.0/32-,
                0.0.0.0/0{<?= config( 'ixp.irrdb.min_v4_subnet_size', 24 ) == 32 ? 32 : config( 'ixp.irrdb.min_v4_subnet_size', 24 ) + 1 ?>,32},
                0.0.0.0/0{0,7}
        ];

        # Avoid RFC1918 and similar networks
        if net ~ martiansv4 then
                return false;

        return true;
}

filter f_import_policy
{
        if !(avoid_martians_v4()) then
                reject;

        accept;
}


<?php else: ?>

function avoid_martians_v6()
prefix set martiansv6;
{
        # This list of martians is obtained from the IANA IPv6
        # Special-Purpose Address Registry:
        # http://www.iana.org/assignments/iana-ipv6-special-registry
        martiansv6 = [
                ::/0,                   # Default (can be advertised as a route in BGP to peers if desired)
                ::/96,                  # IPv4-compatible IPv6 address - deprecated by RFC4291
                ::/128,                 # Unspecified address
                ::1/128,                # Local host loopback address
                ::ffff:0.0.0.0/96+,     # IPv4-mapped addresses
                ::224.0.0.0/100+,       # Compatible address (IPv4 format)
                ::127.0.0.0/104+,       # Compatible address (IPv4 format)
                ::0.0.0.0/104+,         # Compatible address (IPv4 format)
                ::255.0.0.0/104+,       # Compatible address (IPv4 format)
                0000::/8+,              # Pool used for unspecified, loopback and embedded IPv4 addresses
                0100::/64+,             # RFC6666 - discard-only address block
                0200::/7+,              # RFC4548 - OSI NSAP-mapped prefix set, deprecated by RFC4048
                3ffe::/16+,             # Former 6bone, now decommissioned
                2001:2::/48+,           # RFC5180 - Benchmarking
                2001:10::/28+,          # RFC4843 - ORCHID
                2001:db8::/32+,         # RFC3849 - Reserved by IANA for special purposes and documentation
                2002:e000::/20+,        # Invalid 6to4 packets (IPv4 multicast)
                2002:7f00::/24+,        # Invalid 6to4 packets (IPv4 loopback)
                2002:0000::/24+,        # Invalid 6to4 packets (IPv4 default)
                2002:ff00::/24+,        # Invalid 6to4 packets
                2002:0a00::/24+,        # Invalid 6to4 packets (IPv4 private 10.0.0.0/8 network)
                2002:ac10::/28+,        # Invalid 6to4 packets (IPv4 private 172.16.0.0/12 network)
                2002:c0a8::/32+,        # Invalid 6to4 packets (IPv4 private 192.168.0.0/16 network)
                fc00::/7+,              # RFC4193 - Unicast Unique Local Addresses (ULA)
                fe80::/10+,             # Link-local Unicast
                fec0::/10+,             # Site-local Unicast - deprecated by RFC 3879 (replaced by ULA)
                ff00::/8+,              # Multicast
                ::/0{<?= config( 'ixp.irrdb.min_v6_subnet_size', 48 ) == 128 ? 128 : config( 'ixp.irrdb.min_v6_subnet_size', 48 ) + 1 ?>,128}            # Filter small prefixes
        ];

        # Avoid RFC1918 and similar networks
        if net ~ martiansv6 then
                return false;

        return true;
}

filter f_import_policy
{
        if !(avoid_martians_v6()) then
                reject;

        accept;
}

<?php endif; ?>


# This protocol defines the routes we want to export for AS112

protocol static static_as112 {

<?php if( $t->router->protocol === 4 ): ?>

    route 192.175.48.0/24 blackhole;
    route 192.31.196.0/24 blackhole;

<?php else: ?>

    route 2620:4f:8000::/48 blackhole;
    route 2001:4:112::/48 blackhole;

<?php endif; ?>

}

##
## AS112 client configuration
##
