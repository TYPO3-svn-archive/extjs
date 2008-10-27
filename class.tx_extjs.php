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
 * This class performs the inclusion of the required files for the extjs lib
 * 
 * @package		TYPO3
 * @subpackage	extjs
 * @author		Joerg Schoppet <joerg@schoppet.de>
 * @version		SVN: $Id$
 */
class tx_extjs implements tx_jsmanager_ManagerInterface {

	/**
	 * holds the state, if jsmanager has included this ext
	 * 
	 * @var	bool
	 */
	protected $isIncluded = FALSE;

	/**
	 * holds the TS-config, provided by jsmanager
	 * 
	 * @var	array
	 */
	protected $configuration = array();

	/**
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	var $prefixId = 'tx_extjs';

	/**
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	var $scriptRelPath = 'class.tx_extjs.php';

	/**
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	var $extKey = 'extjs';

	/**
	 * dummy method, extjs needs no config, but can have one
	 *
	 * @return	bool
	 */
	public function checkConfiguration(array $configuration) {
		$this->configuration = $configuration;
		return true;
	}

	/**
	 * main method, which processes the TS-Config and returns the
	 * data
	 *
	 * @return	string
	 */
	public function getData() {

		// Which version should be included?
		// Fallback is the latest variant
		$availableVersions = $this->getVersions();
		$version = $availableVersions[count($availableVersions)-1];

		if (array_key_exists('version', $this->configuration)) {

			if (strcasecmp($this->configuration['version'], 'max') == 0) {
				$version = $availableVersions[count($availableVersions)-1];
			} else {

				if (in_array($this->configuration['version'], $availableVersions)) {
					$version = $this->configuration['version'];
				} else {
					$version = $availableVersions[count($availableVersions)-1];
				}

			}

		}

		// Which variant should be used?
		// Fallback is the normal variant, then the minimized and then the packed
		$variant = '';
		$variantFile = '';
		$availableVariants = $this->getVariants($version);
		$variant = 'normal';
		$variantFile = $availableVariants['normal'];

		if (array_key_exists('variant', $this->configuration)) {

			if (array_key_exists($this->configuration['variant'], $availableVariants)) {
				$variant = $this->configuration['variant'];
				$variantFile = $availableVariants[$this->configuration['variant']];
			}

		}

		// Which adapter should be used?
		// Fallback is ext
		$adapter = '';
		$adapterFiles = array();
		$availableAdapters = $this->getAdapters($version);
		$adapter = 'ext';
		$adapterFiles = $availableAdapters['ext'];

		if (array_key_exists('adapter', $this->configuration)) {

			if (array_key_exists($this->configuration['adapter'], $availableAdapters)) {
				$adapter = $this->configuration['adapter'];
				$adapterFiles = $availableAdapters[$this->configuration['adapter']];
			}

		}

		// Should a special language-file be loaded?
		// Fallback is nothing
		$language = '';
		$languageFile = '';
		$availableLanguages = $this->getLanguages($version, $variant);

		if (array_key_exists('language', $this->configuration) && strlen($this->configuration['language']) > 0) {

			if (array_key_exists($this->configuration['language'], $availableLanguages)) {
				$language = $this->configuration['language'];
				$languageFile = $availableLanguages[$this->configuration['language']];
			}

		}

		// Which resource should be used?
		// Fallback is 'default'
		// Only resources are available, which have an images-dir and a css-file
		$resource = '';
		$resourceFile = '';
		$availableResources = $this->getResources($version);
		$resource = 'default';

		if (array_key_exists('resource', $this->configuration) && strlen($this->configuration['resource']) > 0) {

			if (array_key_exists($this->configuration['resource'], $availableResources)) {
				$resource = $this->configuration['resource'];
				$resourceFile = $availableResources[$this->configuration['resource']];
			}

		}

		// Should no css be included at all?
		$noCSS = FALSE;

		if (array_key_exists('no_css', $this->configuration)) {
			$noCSS = (bool)$this->configuration['no_css'];
		}

		// Should a loading-indicator be displayed?
		$loading = FALSE;

		if (array_key_exists('loading', $this->configuration)) {
			$loading = (bool)$this->configuration['loading'];
		}

		// Should plugins be included?
		$pluginFiles = array();

		if (array_key_exists('plugins', $this->configuration) && strlen($this->configuration['plugins']) > 0) {
			$plugins = explode(',', $this->configuration['plugins']);
			$pattern = "|{([a-zA-Z0-9]*)}|";

			foreach ($plugins as $plugin) {
				$file = '';

				if (array_key_exists('plugins.', $this->configuration) && array_key_exists($plugin, $this->configuration['plugins.'])) {
					$file = preg_replace($pattern . 'e', '$\1', $this->configuration['plugins.'][$plugin]);

					if (strcmp(substr($file, 0, 4), 'EXT:') == 0) {
						list($extKey, $filePart) = explode('/', substr($file, 4), 2);

						if (strcmp($extKey, '') != 0 && t3lib_extMgm::isLoaded($extKey) && strcmp($filePart, '') != 0) {

							if (file_exists(t3lib_extMgm::extPath($extKey) . $filePart)) {
								$file = t3lib_extMgm::siteRelPath($extKey) . $filePart;
							}

						}

					} else {

						if (!file_exists(PATH_site . $file)) {
							continue;
						}
					}

					$pluginFiles[] = $file; 
				}

			}

		}

		// Now we can process everything
		$data = '';
		// 1. css
		if (!$noCSS) {
			$data .= '
<style type="text/css">
	/*<![CDATA[*/
	<!--
';
			$data .= '@import url("' . t3lib_extMgm::siteRelPath('extjs') . 'versions/' . $version . '/resources/css/ext-all.css' . '");';

			if (strcasecmp($resource, 'default') != 0) {
				$data .= "\n" . '@import url("' . t3lib_extMgm::siteRelPath('extjs') . 'versions/' . $version . '/resources/css/' . $resourceFile . '");';
			} // if (strcasecmp($resource, 'default') != 0)

			$data .= '
	// -->
	/*]]>*/
</style>
';
		} // if (!$noCSS)

		// 2. Adapter
		foreach ($adapterFiles as $file) {
			$data .= '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . 'versions/' . $version . '/adapter/' . $adapter . '/' . $file . '"></script>' . "\n";
		} // foreach ($adapterFiles as $file)

		// 3. Main js-file
		$data .= '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . 'versions/' . $version . '/source/' . $variantFile . '"></script>' . "\n";

		// 4. language-file
		if (strlen($language) > 0) {
			$data .= '<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath('extjs') . 'versions/' . $version . '/source/locale/' . $variant . '/' . $languageFile . '"></script>' . "\n";
		} // if (strlen($language) > 0)

		// 5. plugins
		if (count($pluginFiles) > 0) {

			foreach ($pluginFiles as $file) {
				$data .= '<script type="text/javascript" src="' . $file . '"></script>' . "\n";
			} // foreach ($pluginFiles as $file)

		} // if (count($pluginFiles) > 0)

		// 6. BLANK-IMG
		$data .= '
<script type="text/javascript">
	/*<![CDATA[*/
	<!--
		Ext.BLANK_IMAGE_URL = "' . t3lib_extMgm::siteRelPath('extjs') . 'versions/' . $version . '/resources/images/' . $resource . '/s.gif";
	// -->
	/*]]>*/
</script>
';

		// 7. Should a loading indicator be displayed
		// This make only sense, if jsmanager is configured to put everything in the body
		if ($loading) {
			$data = '
<div id="loading-mask" style=""></div>
<div id="loading">
	<div class="loading-indicator"><img src="' . t3lib_extMgm::siteRelPath('extjs') . 'versions/' . $version . '/resources/images/default/wait.gif' . '" width="18" height="18" style="margin-right: 8px;" align="absmiddle" />Loading...</div>
</div>
			' . $data;
		} // if ($loading)

		return $data;
	}

	/**
	 * getter-method for the isIncluded-var
	 *
	 * @return	bool
	 */
	public function checkIsIncluded() {
		return $this->isIncluded;
	}

	/**
	 * setter-method for the isIncluded-var
	 *
	 * @param	bool	$isIncluded
	 * @return	void
	 */
	public function setIsIncluded($isIncluded = TRUE) {
		$this->isIncluded = $isIncluded;
	}

	/**
	 * Returns all available versions of extjs.
	 * To achieve this, it iterates over the versions-directory.
	 * 
	 * @return	array
	 */
	protected function getVersions() {
		$versions = array();
		$directory = new DirectoryIterator(t3lib_extMgm::extPath('extjs', 'versions'));

		foreach ($directory as $entry) {
			if ($entry->isDir() && !$entry->isDot() && is_numeric(substr($entry->getFilename(), 0, 1))) {
				$versions[] = $entry->getFilename();
			}
		}

		sort($versions);
		return $versions;
	}

	/**
	 * Returns all available variants of the extjs-main-js-class (ext-all)
	 * To achieve this, it iterates over the source-directory.
	 * 
	 * @param	string	$version	Version, to know, in which directory to search
	 * @return	array
	 */
	protected function getVariants($version) {
		$possibleVariants = array(
			'normal' => '.',
			'minimized' => '.min.',
		);
		$variants = array();
		$directory = new DirectoryIterator(t3lib_extMgm::extPath('extjs', 'versions/' . $version . '/source'));

		foreach ($directory as $entry) {

			if ($entry->isFile()) {
				$fileName = $entry->getFilename();
				$fileName = str_replace('ext-all', '', $fileName);
				$fileName = str_replace('js', '', $fileName);
				$variant = array_search($fileName, $possibleVariants);

				if ($variant) {
					$variants[$variant] = $entry->getFilename();
				}

			}

		}

		return $variants;
	}

	/**
	 * Returns all available adapters.
	 * To achieve this, it iterates over the adapter-directory
	 * 
	 * @param	string	$version	Version, to know, in which directory to search
	 * @return	array
	 */
	protected function getAdapters($version) {
		$adapters = array();
		$directory = new DirectoryIterator(t3lib_extMgm::extPath('extjs', 'versions/' . $version . '/adapter'));

		foreach ($directory as $entry) {

			if ($entry->isDir() && !$entry->isDot() && substr($entry->getFilename(), 0, 1) !== '.') {
				$adapter = $entry->getFilename();
				$adapterDirectory = new DirectoryIterator(t3lib_extMgm::extPath('extjs', 'versions/' . $version . '/adapter/' . $adapter));
				$files = array();

				foreach ($adapterDirectory as $adapterEntry) {

					if ($adapterEntry->isFile()) {
						$files[] = $adapterEntry->getFilename();
					}

				}

				$adapters[$adapter] = $files;
			}

		}

		return $adapters;
	}

	/**
	 * Returns all availabe languages.
	 * To achieve this, it iterates over the locale-directory
	 * 
	 * @param	string	$version	Version, to know, in which directory to search
	 * @param	string	$variant	Variant, to know, in which directory to search
	 * @return	array
	 */
	protected function getLanguages($version, $variant) {
		$languages = array();
		$directory = new DirectoryIterator(t3lib_extMgm::extPath('extjs', 'versions/' . $version . '/source/locale/' . $variant));

		foreach ($directory as $entry) {

			if ($entry->isFile()) {
				$fileName = $entry->getFilename();
				$fileName = str_replace('ext-lang-', '', $fileName);
				$fileName = str_replace(($variant=='minimized')?'-min.js':'.js', '', $fileName);
				$languages[$fileName] = $entry->getFilename();
			}

		}

		return $languages;
	}

	/**
	 * Returns all available themes.
	 * To achieve this, it iterates over the images- and css-directory
	 * 
	 * @param	string	$version	Version, to know, in which directory to search
	 * @return	array
	 */
	protected function getResources($version) {
		$resources = array();
		$imageDirectory = new DirectoryIterator(t3lib_extMgm::extPath('extjs', 'versions/' . $version . '/resources/images'));
		$cssDirectory = new DirectoryIterator(t3lib_extMgm::extPath('extjs', 'versions/' . $version . '/resources/css'));

		foreach ($imageDirectory as $entry) {

			if ($entry->isDir() && !$entry->isDot() && substr($entry->getFilename(), 0, 1) !== '.' && strcasecmp($entry->getFilename(), 'default') != 0) {
				$resources[$entry->getFilename()] = '';
			}

		}

		foreach ($cssDirectory as $entry) {

			if ($entry->isFile() && substr($entry->getFilename(), 0, 7) == 'xtheme-') {
				$fileName = $entry->getFilename();
				$fileName = str_replace('xtheme-', '', $fileName);
				$fileName = str_replace('.css', '', $fileName);

				if (array_key_exists($fileName, $resources)) {
					$resources[$fileName] = $entry->getFilename();
				}

			}

		}

		foreach ($resources as $resourceName => $resourceFile) {

			if ($resourceFile == '') {
				unset($resources[$resourceName]);
			}

		}

		return $resources;
	}

	/**
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function main($content,$conf)	{
	}

	/**
	 * include the library and other data for page renderung into a BE-site
	 * any configuration has to be done before with the set-fucntions
	 * 
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function BEincludeLib() {
		global $BACK_PATH;
		$returnArr = array(
			'css' => '',
			'additional_js' => '',
			'js' => '',
		);
		$fileArr = tx_extjs::getLibs($BACK_PATH . '../' . t3lib_extMgm::siteRelPath('extjs'));

		if ($GLOBALS['tx_extjs']['no_css']) {
			$fileArr['css'] = array();
		}

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
	 * 
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function includeLib()	{
		$fileArr = tx_extjs::getLibs(t3lib_extMgm::siteRelPath('extjs'));

		if ($GLOBALS['tx_extjs']['no_css']) {
			$fileArr['css'] = array();
		}

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

	/**
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function getLibs($path) {
		$returnArr = array(
			'css' => array(),
			'additional_js' => '',
			'js' => array(),
		);

		// first we look, which kind of plugins should be loaded (compressed or uncompressed)
		if (!isset($GLOBALS['tx_extjs']['compressed']))	{

			if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['compressed']))	{

				if (strCaseCmp($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['compressed'], 'true') == 0)	{
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

			if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['adapter']))	{
				tx_extjs::setAdapter($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['adapter']);
			} else {
				tx_extjs::setAdapter();
			}

		}

		if (!isset($GLOBALS['tx_extjs']['resource']))	{

			if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['resource']))	{
				tx_extjs::setResource($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['resource']);
			} else {
				tx_extjs::setResource();
			}

		}

		if (!isset($GLOBALS['tx_extjs']['language'])) {

			if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['language'])) {
				tx_extjs::setLanguage($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['language']);
			} else {
				tx_extjs::setLanguage();
			}

		}

		if (!isset($GLOBALS['tx_extjs']['no_css'])) {

			if (isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['no_css'])) {

				if (strCaseCmp($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_extjs.']['no_css'], 'true') == 0) {
					tx_extjs::setCompressed(TRUE);
				} else {
					tx_extjs::setNoCSS(FALSE);
				}

			} else {
				tx_extjs::setNoCSS();
			}

		}

		// add everything to return-array
		$returnArr['css'][] = '@import url("' . $path . 'resources/css/ext-all.css");';

		// first the css
		switch ($GLOBALS['tx_extjs']['resource'])	{
			case 'aero':
				$returnArr['css'][] = '@import url("' . $path . 'resources/css/xtheme-aero.css");';
				$returnArr['additional_js'] = 'Ext.BLANK_IMAGE_URL = "' . $path . 'resources/images/aero/s.gif";';
				break;
			case 'default':
				$returnArr['additional_js'] = 'Ext.BLANK_IMAGE_URL = "' . $path . 'resources/images/default/s.gif";';
				break;
			case 'gray':
				$returnArr['css'][] = '@import url("' . $path . 'resources/css/xtheme-gray.css");';
				$returnArr['additional_js'] = 'Ext.BLANK_IMAGE_URL = "' . $path . 'resources/images/gray/s.gif";';
				break;
			case 'vista':
				$returnArr['css'][] = '@import url("' . $path . 'resources/css/xtheme-vista.css");';
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

		// third the main js-file
		$returnArr['js'][] = '<script type="text/javascript" src="' . $path . ($GLOBALS['tx_extjs']['compressed']==false?'uncompressed_':'') . 'src/ext-all.js"></script>';

		// fourth the language
		if (strCaseCmp($GLOBALS['tx_extjs']['language'], '') != 0) {
			$returnArr['js'][] = '<script type="text/javascript" src="' . $path . 'src/locale/ext-lang-' . $GLOBALS['tx_extjs']['language'] . '.js"></script>';
		}

		return $returnArr;
	}

	/**
	 * set value which adapter should be used (ext, jquery, prototype, yui)
	 * 
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function setAdapter($adapter='ext')	{
		$GLOBALS['tx_extjs']['adapter'] = (string)$adapter;
	}

	/**
	 * set value which theme should be used (aero, default, gray, vista)
	 * 
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function setResource($resource='default')	{
		$GLOBALS['tx_extjs']['resource'] = (string)$resource;
	}

	/**
	 * set value if compressed scripts should be included
	 * 
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function setCompressed($var=TRUE)	{
		$GLOBALS['tx_extjs']['compressed'] = (bool)$var;
	}

	/**
	 * set value which language should be used
	 * 
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function setLanguage($lang='') {
		$GLOBALS['tx_extjs']['language'] = (string)trim($lang);
	}

	/**
	 * set value if no css-files should be included at all
	 * 
	 * @deprecated	deprecated since dependency of jsmanager
	 */
	function setNoCSS($var=FALSE) {
		$GLOBALS['tx_extjs']['no_css'] = (bool)$var;
	}

}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/extjs/class.tx_extjs.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/extjs/class.tx_extjs.php']);
}

?>
