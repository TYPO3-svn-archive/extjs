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
	 * include the library and other data for page renderung into a BE-site
	 * any configuration has to be done before with the set-fucntions
	 */
	function BEincludeLib() {
		global $BACK_PATH;
		$returnArr = array(
			'css' => '',
			'additional_js' => '',
			'js' => '',
		);
		$fileArr = tx_extjs::getLibs($BACK_PATH . '../' . t3lib_extMgm::siteRelPath('extjs'));

		if (!$GLOBALS['tx_extjs']['tx_extjs_inc']) {
			$returnArr['css'] = implode("\n", $fileArr['css']);
			$returnArr['additional_js'] = $fileArr['additional_js'];
			$returnArr['js'] = implode("\n", $fileArr['js']);
			$GLOBALS['tx_extjs']['tx_extjs_inc'] = TRUE;
		}

		return $returnArr;
	}

	/**
	 * include the library and other data for page rendering into a FE-site
	 * any configuration has to be done before with the set-functions
	 */
	function includeLib()	{
		$fileArr = tx_extjs::getLibs(t3lib_extMgm::siteRelPath('extjs'));

		if (!$GLOBALS['tx_extjs']['tx_extjs_inc']) {

			// First the css
			if (isset($fileArr['css'])) {

				foreach ($fileArr['css'] as $key => $script) {
					$GLOBALS['TSFE']->additionalCSS['tx_extjs_' . $key] = $script;
				}

			}

			// The blank_img-setting
			if (isset($fileArr['additional_js'])) {
				$GLOBALS['TSFE']->additionalJavaScript['tx_extjs_blankimg'] = $fileArr['additional_js'];
			}

			// Now the js
			if (isset($fileArr['js'])) {

				foreach ($fileArr['js'] as $key => $script) {
					$GLOBALS['TSFE']->additionalHeaderData['tx_extjs_script_' . $key . '_inc'] = $script;
				}

			}

			$GLOBALS['tx_extjs']['tx_extjs_inc'] = TRUE;
		}

	}

	function getLibs($path) {
		$returnArr = array(
			'css' => array(),
			'additional_js' => '',
			'js' => array(),
		);

		// first we look, which kind of plugins should be loaded (compressed or uncompressed)
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

		// add everything to return-array
		$returnArr['css'][] = '@import url("' . $path . 'resources/css/ext-all.css");';

		// first the css
		switch ($GLOBALS['tx_extjs']['resource'])	{
			case 'aero':
				$returnArr['css'][] = '@import url("' . $path . 'resources/css/ytheme-aero.css");';
				$returnArr['additional_js'] = 'Ext.BLANK_IMAGE_URL = "' . $path . 'resources/images/aero/s.gif";';
				break;
			case 'default':
				$returnArr['additional_js'] = 'Ext.BLANK_IMAGE_URL = "' . $path . 'resources/images/default/s.gif";';
				break;
			case 'gray':
				$returnArr['css'][] = '@import url("' . $path . 'resources/css/ytheme-gray.css");';
				$returnArr['additional_js'] = 'Ext.BLANK_IMAGE_URL = "' . $path . 'resources/images/gray/s.gif";';
				break;
			case 'vista':
				$returnArr['css'][] = '@import url("' . $path . 'resources/css/ytheme-vista.css");';
				$returnArr['additional_js'] = 'Ext.BLANK_IMAGE_URL = "' . $path . 'resources/images/vista/s.gif";';
				break;
		}

		// second the adapter
		// NOTE: the base-adapter-lib has to be included externally before this
		switch ($GLOBALS['tx_extjs']['adapter'])	{
			case 'ext':
				$returnArr['js'][] = '<script type="text/javascript" src="' . $path . 'adapter/ext/ext-base.js"></script>';
				break;
			case 'jquery':
				$returnArr['js'][] = '<script type="text/javascript" src="' . $path . 'adapter/jquery/jquery-plugins.js"></script>';
				$returnArr['js'][] = '<script type="text/javascript" src="' . $path . 'adapter/jquery/ext-jquery-adapter.js"></script>';
				break;
			case 'prototype':
				$returnArr['js'][] = '<script type="text/javascript" src="' . $path . 'adapter/prototype/ext-prototype-adapter.js"></script>';
				break;
			case 'yui':
				$returnArr['js'][] = '<script type="text/javascript" src="' . $path . 'adapter/yui/yui-utilities.js"></script>';
				$returnArr['js'][] = '<script type="text/javascript" src="' . $path . 'adapter/yui/ext-yui-adapter.js"></script>';
				break;
		}

		$returnArr['js'][] = '<script type="text/javascript" src="' . $path . ($GLOBALS['tx_extjs']['compressed']==false?'uncompressed_':'') . 'src/ext-all.js"></script>';
		return $returnArr;
	}

	/**
	 * set value which adapter should be used (ext, jquery, prototype, yui)
	 */
	function setAdapter($adapter='ext')	{
		$GLOBALS['tx_extjs']['adapter'] = (string)$adapter;
	}

	/**
	 * set value which theme should be used (aero, default, gray, vista)
	 */
	function setResource($resource='default')	{
		$GLOBALS['tx_extjs']['resource'] = (string)$resource;
	}

	/**
	 * set value if compressed scripts should be included
	 */
	function setCompressed($var=TRUE)	{
		$GLOBALS['tx_extjs']['compressed'] = (bool)$var;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/extjs/class.tx_extjs.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/extjs/class.tx_extjs.php']);
}

?>
