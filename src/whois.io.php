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

if (!defined('__IO_HANDLER__'))
{
	define('__IO_HANDLER__', 1);
}

require_once('whois.parser.php');

class io_handler
{
	function parse($data, $query)
	{

		$items = [
			'Domain :'	=> 'domain.name',
			'Status :'	=> 'domain.status',
			'Expiry :'	=> 'domain.expires',
			'NS 1:'		=> 'domain.nserver.',
			'NS 2:'		=> 'domain.nserver.',
			'NS 3:'		=> 'domain.nserver.',
			'NS 4:'		=> 'domain.nserver.',
			'Owner :'	=> 'owner.name',
			//' :'		=> 'owner.address.street.',
		];

		$r['regrinfo'] = generic_parser_b($data['rawdata'], $items);

		/*
		if ( !strcmp(substr($data['rawdata'][2], -13), 'Status : Live') )
		{
			$r['regrinfo']['registered'] = 'yes';
		}
		elseif ( !strcmp(substr($data['rawdata'][1], -25), 'is available for purchase') )
		{
			$r['regrinfo']['registered'] = 'no';
		}
		else
		{
			$r['regrinfo']['registered'] = 'unknown';
		}
		*/

		$r['regyinfo'] = [
			'referrer' => 'http://nic.io',
			'registrar' => 'NIC.IO',
		];

		return $r;
	}
}
