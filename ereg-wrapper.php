<?php
/*
 * This is deprecated Ereg API wrapper
 *
 * Author: JoungKyun.Kim <http://oops.org>
 * Copyright (c) 2016 JoungKyun.Kim
 * License: BSD 2-Clause
 *
 * Now works with PHP 5.3.x to PHP7.x
 *
 */

if ( version_compare (PHP_VERSION, '7.0.0', '>=') && !function_exists ('ereg')) {

	// {{{ +-- (string) ereg_patten_quote ($pat, $i = false)
	function ereg_pattern_quote($pat, $i = false)
	{
		$pat = '~' . preg_replace('/~/', '\\~', $pat) . '~';
		$pat .= $i ? 'i' : '';
		return $pat;
	}

	// }}}

	// {{{ +-- public ereg ($pat, $subj, &$regs)
	function ereg($pat, $subj, &$regs = null)
	{
		$pat = ereg_pattern_quote($pat);
		return preg_match($pat, $subj, $regs);
	}

	// }}}

	// {{{ +-- public eregi ($pat, $subj, &$regs)
	function eregi($pat, $subj, &$regs = null)
	{
		$pat = ereg_pattern_quote($pat, true);
		return preg_match($pat, $subj, $regs);
	}

	// }}}

	// {{{ +-- public ereg_replace ($pat, $rep, $subj)
	function ereg_replace($pat, $rep, $subj)
	{
		$pat = ereg_pattern_quote($pat);
		return preg_replace($pat, $rep, $subj);
	}

	// }}}

	// {{{ +-- public eregi_replace ($pat, $rep, $subj)
	function eregi_replace($pat, $rep, $subj)
	{
		$pat = ereg_pattern_quote($pat, true);
		return preg_replace($pat, $rep, $subj);
	}

	// }}}

	// {{{ +-- public split ($pat, $subj, $limit = -1)
	function split($pat, $subj, $limit = -1)
	{
		$pat = ereg_pattern_quote($pat);
		return preg_split($pat, $subj, $limit);
	}

	// }}}

	// {{{ +-- public spliti ($pat, $subj, $limit = -1)
	function spliti($pat, $subj, $limit = -1)
	{
		$pat = ereg_pattern_quote($pat, true);
		return preg_split($pat, $subj, $limit);
	}

	// }}}

	// {{{ +-- (string) spl_regcase (string $subj)
	function spl_regcase($subj)
	{
		$len = strlen($subj);
		$ret = '';

		for ($i = 0; $i < $len; $i++) {
			$o = ord($subj[$i]);
			if (($o > 64 && $o < 91) || ($o > 97 && $o < 123)) {
				$ret .= sprintf('[%s%s]', strtoupper($subj[$i]), strtolower($subj[$i]));
				continue;
			}
			$ret .= $subj[$i];
		}

		return $ret;
	}
}
