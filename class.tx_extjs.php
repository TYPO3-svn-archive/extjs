<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2007 Joerg Schoppet (joerg@schoppet.de)
 *  All rights reserved
 *
 *  This script is part of the Typo3 project. The Typo3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * Plugin 'Ext JS' for the 'extjs' extension.
 *
 * @author	Joerg Schoppet <joerg@schoppet.de>
 */



class tx_extjs {
	var $prefixId = 'tx_extjs';		// Same as class name
	var $scriptRelPath = 'class.tx_extjs.php';	// Path to this script relative to the extension dir.
	var $extKey = 'extjs';	// The extension key.

	/**
	 * dummy
	 */
	function main($content,$conf)	{
	}

	/**
	 * include the library and other data for page rendering
	 * any configuration has to be done before with the set-functions
	 */
	function includeLib()	{
		// first we look, wich kind of plugins should be loaded (compressed or uncompressed)
		if (!isset($GLOBALS['tx_extjs']['compressed']))	{

			if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['compressed']))	{

				if (strCaseCmp($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_jextjs.']['compressed'], 'true') == 0)	{
					tx_extjs::setCompressed(TRUE);
				} else {
					tx_extjs::setCompressed(FALSE);
				}

			} else {
				tx_extjs::setCompressed();
			}

		}
/**
		// add extjs to page content
		if (!$GLOBALS['tx_extjs']['tx_extjs_script_inc']) {
			// add extjs to page header
			$GLOBALS['TSFE']->additionalHeaderData['tx_extjs_script_inc'] = '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . ($GLOBALS['tx_extjs']['compressed']==false?'uncompressed_':'') . 'src/ext-all.js"></script>';
			$GLOBALS['tx_extjs']['tx_extjs_script_inc'] = TRUE;
		}
**/
		// the config is parsed the following way
		// 1. has the user set something within an application
		// 2. is something defined by TS
		// 3. use default values

		if (!isset($GLOBALS['tx_extjs']['adapter']))	{

			if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs']['adapter']))	{
				tx_extjs::setAdapter($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs']['adapter']);
			} else {
				tx_extjs::setAdapter();
			}

		}

		if (!isset($GLOBALS['tx_extjs']['resource']))	{

			if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs']['resource']))	{
				tx_extjs::setResource($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs']['resource']);
			} else {
				tx_extjs::setResource();
			}

		}

		// add everything to page content
		if (!$GLOBALS['tx_extjs']['tx_extjs_script_inc']) {
			$GLOBALS['TSFE']->additionalCSS['tx_extjs_base'] = '@import url("' . t3lib_extMgm::siteRelPath('extjs') . 'resources/css/ext-all.css");';

			// first the css
			switch ($GLOBALS['tx_extjs']['resource'])	{
				case 'aero':
					$GLOBALS['TSFE']->additionalCSS['tx_extjs_additional'] = '@import url("' . t3lib_extMgm::siteRelPath('extjs') . 'resources/css/ytheme-aero.css");';
					break;
				case 'default':
					break;
				case 'gray':
					$GLOBALS['TSFE']->additionalCSS['tx_extjs_additional'] = '@import url("' . t3lib_extMgm::siteRelPath('extjs') . 'resources/css/ytheme-gray.css");';
					break;
				case 'vista':
					$GLOBALS['TSFE']->additionalCSS['tx_extjs_additional'] = '@import url("' . t3lib_extMgm::siteRelPath('extjs') . 'resources/css/ytheme-vista.css");';
					break;
			}

			// second the adapter
			// NOTE: the base-adapter-lib has to be included externally before this
			switch ($GLOBALS['tx_extjs']['adapter'])	{
				case 'jquery':
					$GLOBALS['TSFE']->additionalHeaderData['tx_extjs_script_adapter1'] = '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . 'adapter/jquery/jquery-plugins.js"></script>';
					$GLOBALS['TSFE']->additionalHeaderData['tx_extjs_script_adapter2'] = '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . 'adapter/jquery/ext-jquery-adapter.js"></script>';
					break;
				case 'prototype':
					$GLOBALS['TSFE']->additionalHeaderData['tx_extjs_script_adapter1'] = '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . 'adapter/prototype/ext-prototype-adapter.js"></script>';
					break;
				case 'yui':
					$GLOBALS['TSFE']->additionalHeaderData['tx_extjs_script_adapter1'] = '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . 'adapter/yui/yui-utilities.js"></script>';
					$GLOBALS['TSFE']->additionalHeaderData['tx_extjs_script_adapter2'] = '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . 'adapter/yui/ext-yui-adapter.js"></script>';
					break;
			}

			$GLOBALS['TSFE']->additionalHeaderData['tx_extjs_script_inc'] = '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . ($GLOBALS['tx_extjs']['compressed']==false?'uncompressed_':'') . 'src/ext-all.js"></script>';
			$GLOBALS['tx_extjs']['tx_extjs_script_inc'] = TRUE;
		}

	}

	/**
	 * set value which adapter should be used (jquery, prototype, yui)
	 */
	function setAdapter($sAdapter='yui')	{
		$GLOBALS['tx_extjs']['adapter'] = (string)$sAdapter;
	}

	/**
	 * set value which theme should be used (aero, default, gray, vista)
	 */
	function setResource($sResource='default')	{
		$GLOBALS['tx_extjs']['resource'] = (string)$sResource;
	}

	/**
	 * set value if compressed scripts should be included
	 */
	function setCompressed($bVar=TRUE)	{
		$GLOBALS['tx_extjs']['compressed'] = (bool)$bVar;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/extjs/class.tx_extjs.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/extjs/class.tx_extjs.php']);
}

?>
