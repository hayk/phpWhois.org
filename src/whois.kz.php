<?php
/*
Whois.php        PHP classes to conduct whois queries

Copyright (C)1999,2005 easyDNS Technologies Inc. & Mark Jeftovic

Maintained by David Saez

For the most recent version of this package visit:

http://www.phpwhois.org

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

if (!defined('__KZ_HANDLER__'))
{
	define('__KZ_HANDLER__', 1);
}

require_once('whois.parser.php');

class kz_handler
{
	function parse($data, $query)
	{
		$items = [
			'Domain Name............:' => 'domain.name',

			'Primary server.........:' => 'domain.nserver.',
			'Secondary server.......:' => 'domain.nserver.',

			'Name...................:' => 'owner.name',
			'Organization Name......:' => 'owner.organization',
			'Street Address.........:' => 'owner.address.street.',
			'City...................:' => 'owner.address.city',
			'State..................:' => 'owner.address.state',
			'Postal Code............:' => 'owner.address.pcode',
			'Country................:' => 'owner.address.country',
			'NIC Handle.............:' => 'admin.handle',
			'Name...................:' => 'admin.name',
			'Phone Number...........:' => 'admin.phone',
			'Fax Number.............:' => 'admin.fax',
			'Email Address..........:' => 'admin.email',
			'Domain created:' => 'domain.created',
			'Last modified :' => 'domain.changed',
			'Domain status :' => 'domain.status.',
			//'Registar created:' => 'domain.sponsor',
			'Current Registar:' => 'domain.sponsor',

		];
		$r['regrinfo'] = generic_parser_b($data['rawdata'], $items);

		$r['regyinfo'] = [
			'referrer' => 'http://nic.kz',
			'registrar' => 'KazNIC'
		];

		return $r;
	}
}
