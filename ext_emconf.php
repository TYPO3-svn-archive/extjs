<?php

########################################################################
# Extension Manager/Repository config file for ext: "extjs"
# 
# Auto generated 12-09-2007 14:10
# 
# Manual updates:
# Only the data in the array - anything else is removed by next write
########################################################################

$EM_CONF[$_EXTKEY] = Array (
	'title' => 'Ext JS',
	'description' => 'World-class Javascript, Ajax and UI Components',
	'category' => 'fe',
	'shy' => 0,
	'dependencies' => 'jsmanager',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'TYPO3_version' => '',
	'PHP_version' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author' => 'Joerg Schoppet',
	'author_email' => 'joerg@schoppet.de',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'version' => '1.1.1',	// Don't modify this! Managed automatically during upload to repository.
	'_md5_values_when_last_written' => 'a:365:{s:18:"class.tx_extjs.php";s:4:"3358";s:12:"ext_icon.gif";s:4:"8a01";s:24:"ext_typoscript_setup.txt";s:4:"6a59";s:14:"src/ext-all.js";s:4:"f340";s:25:"src/locale/ext-lang-af.js";s:4:"9610";s:25:"src/locale/ext-lang-cs.js";s:4:"6c21";s:25:"src/locale/ext-lang-da.js";s:4:"4b8f";s:25:"src/locale/ext-lang-de.js";s:4:"6f4e";s:28:"src/locale/ext-lang-el_GR.js";s:4:"0990";s:25:"src/locale/ext-lang-en.js";s:4:"b4e1";s:28:"src/locale/ext-lang-en_UK.js";s:4:"225c";s:25:"src/locale/ext-lang-fr.js";s:4:"bfe4";s:28:"src/locale/ext-lang-fr_CA.js";s:4:"bf5d";s:25:"src/locale/ext-lang-gr.js";s:4:"0b75";s:25:"src/locale/ext-lang-hr.js";s:4:"4828";s:25:"src/locale/ext-lang-hu.js";s:4:"249e";s:25:"src/locale/ext-lang-it.js";s:4:"4cbb";s:25:"src/locale/ext-lang-ja.js";s:4:"bdbf";s:25:"src/locale/ext-lang-lv.js";s:4:"77d1";s:25:"src/locale/ext-lang-mk.js";s:4:"a5a5";s:25:"src/locale/ext-lang-nl.js";s:4:"6017";s:25:"src/locale/ext-lang-no.js";s:4:"f653";s:25:"src/locale/ext-lang-pl.js";s:4:"8951";s:28:"src/locale/ext-lang-pt_br.js";s:4:"08a8";s:25:"src/locale/ext-lang-ro.js";s:4:"885f";s:25:"src/locale/ext-lang-ru.js";s:4:"9c17";s:25:"src/locale/ext-lang-sk.js";s:4:"76ae";s:25:"src/locale/ext-lang-sl.js";s:4:"ef3f";s:25:"src/locale/ext-lang-sp.js";s:4:"b386";s:28:"src/locale/ext-lang-sr_RS.js";s:4:"a80e";s:28:"src/locale/ext-lang-sv_se.js";s:4:"3a4a";s:25:"src/locale/ext-lang-tr.js";s:4:"e064";s:25:"src/locale/ext-lang-vn.js";s:4:"3c31";s:28:"src/locale/ext-lang-zh_CN.js";s:4:"1463";s:28:"src/locale/ext-lang-zh_TW.js";s:4:"2995";s:23:"adapter/ext/ext-base.js";s:4:"f4b4";s:36:"adapter/jquery/ext-jquery-adapter.js";s:4:"29bd";s:32:"adapter/jquery/jquery-plugins.js";s:4:"14a3";s:28:"adapter/prototype/effects.js";s:4:"c7cf";s:42:"adapter/prototype/ext-prototype-adapter.js";s:4:"01e0";s:30:"adapter/yui/ext-yui-adapter.js";s:4:"f6a9";s:28:"adapter/yui/yui-utilities.js";s:4:"5ed9";s:27:"uncompressed_src/ext-all.js";s:4:"2dee";s:40:"resources/images/default/gradient-bg.gif";s:4:"e117";s:30:"resources/images/default/s.gif";s:4:"fc94";s:37:"resources/images/default/shadow-c.png";s:4:"3abb";s:38:"resources/images/default/shadow-lr.png";s:4:"9862";s:35:"resources/images/default/shadow.png";s:4:"860b";s:36:"resources/images/default/qtip/bg.gif";s:4:"49c0";s:39:"resources/images/default/qtip/close.gif";s:4:"0379";s:44:"resources/images/default/qtip/tip-sprite.gif";s:4:"1163";s:52:"resources/images/default/toolbar/btn-arrow-light.gif";s:4:"fa49";s:46:"resources/images/default/toolbar/btn-arrow.gif";s:4:"12bd";s:48:"resources/images/default/toolbar/btn-over-bg.gif";s:4:"fadd";s:44:"resources/images/default/toolbar/gray-bg.gif";s:4:"cf2d";s:42:"resources/images/default/toolbar/tb-bg.gif";s:4:"5309";s:50:"resources/images/default/toolbar/tb-btn-sprite.gif";s:4:"3aed";s:40:"resources/images/default/dd/drop-add.gif";s:4:"95eb";s:39:"resources/images/default/dd/drop-no.gif";s:4:"ae53";s:40:"resources/images/default/dd/drop-yes.gif";s:4:"f321";s:42:"resources/images/default/tree/drop-add.gif";s:4:"95eb";s:46:"resources/images/default/tree/drop-between.gif";s:4:"edb5";s:41:"resources/images/default/tree/drop-no.gif";s:4:"67f8";s:43:"resources/images/default/tree/drop-over.gif";s:4:"d6b3";s:44:"resources/images/default/tree/drop-under.gif";s:4:"55e5";s:42:"resources/images/default/tree/drop-yes.gif";s:4:"f321";s:52:"resources/images/default/tree/elbow-end-minus-nl.gif";s:4:"5e5b";s:49:"resources/images/default/tree/elbow-end-minus.gif";s:4:"a469";s:51:"resources/images/default/tree/elbow-end-plus-nl.gif";s:4:"f0f5";s:48:"resources/images/default/tree/elbow-end-plus.gif";s:4:"ec14";s:43:"resources/images/default/tree/elbow-end.gif";s:4:"3455";s:44:"resources/images/default/tree/elbow-line.gif";s:4:"90e4";s:48:"resources/images/default/tree/elbow-minus-nl.gif";s:4:"5e5b";s:45:"resources/images/default/tree/elbow-minus.gif";s:4:"71bb";s:47:"resources/images/default/tree/elbow-plus-nl.gif";s:4:"f0f5";s:44:"resources/images/default/tree/elbow-plus.gif";s:4:"9455";s:39:"resources/images/default/tree/elbow.gif";s:4:"2767";s:45:"resources/images/default/tree/folder-open.gif";s:4:"c569";s:40:"resources/images/default/tree/folder.gif";s:4:"b720";s:38:"resources/images/default/tree/leaf.gif";s:4:"2375";s:41:"resources/images/default/tree/loading.gif";s:4:"00ef";s:35:"resources/images/default/tree/s.gif";s:4:"fc94";s:45:"resources/images/default/box/corners-blue.gif";s:4:"86fd";s:40:"resources/images/default/box/corners.gif";s:4:"d2d1";s:39:"resources/images/default/box/l-blue.gif";s:4:"ced9";s:34:"resources/images/default/box/l.gif";s:4:"c4d9";s:39:"resources/images/default/box/r-blue.gif";s:4:"82db";s:34:"resources/images/default/box/r.gif";s:4:"bf1e";s:40:"resources/images/default/box/tb-blue.gif";s:4:"7c4b";s:35:"resources/images/default/box/tb.gif";s:4:"dd3f";s:48:"resources/images/default/sizer/e-handle-dark.gif";s:4:"b862";s:43:"resources/images/default/sizer/e-handle.gif";s:4:"510e";s:49:"resources/images/default/sizer/ne-handle-dark.gif";s:4:"115f";s:44:"resources/images/default/sizer/ne-handle.gif";s:4:"8e26";s:49:"resources/images/default/sizer/nw-handle-dark.gif";s:4:"4a36";s:44:"resources/images/default/sizer/nw-handle.gif";s:4:"1120";s:48:"resources/images/default/sizer/s-handle-dark.gif";s:4:"4a6b";s:43:"resources/images/default/sizer/s-handle.gif";s:4:"5e33";s:49:"resources/images/default/sizer/se-handle-dark.gif";s:4:"f3d8";s:44:"resources/images/default/sizer/se-handle.gif";s:4:"71ed";s:41:"resources/images/default/sizer/square.gif";s:4:"4431";s:49:"resources/images/default/sizer/sw-handle-dark.gif";s:4:"44b2";s:44:"resources/images/default/sizer/sw-handle.gif";s:4:"c3e0";s:39:"resources/images/default/grid/Thumbs.db";s:4:"c3af";s:50:"resources/images/default/grid/arrow-left-white.gif";s:4:"b04e";s:51:"resources/images/default/grid/arrow-right-white.gif";s:4:"714e";s:49:"resources/images/default/grid/col-move-bottom.gif";s:4:"9c38";s:46:"resources/images/default/grid/col-move-top.gif";s:4:"c458";s:39:"resources/images/default/grid/dirty.gif";s:4:"decc";s:38:"resources/images/default/grid/done.gif";s:4:"3652";s:41:"resources/images/default/grid/drop-no.gif";s:4:"b53c";s:42:"resources/images/default/grid/drop-yes.gif";s:4:"af96";s:43:"resources/images/default/grid/footer-bg.gif";s:4:"65ed";s:46:"resources/images/default/grid/grid-blue-hd.gif";s:4:"dd35";s:49:"resources/images/default/grid/grid-blue-split.gif";s:4:"0494";s:43:"resources/images/default/grid/grid-hrow.gif";s:4:"5597";s:46:"resources/images/default/grid/grid-loading.gif";s:4:"9ac6";s:44:"resources/images/default/grid/grid-split.gif";s:4:"3ef4";s:47:"resources/images/default/grid/grid-vista-hd.gif";s:4:"675f";s:46:"resources/images/default/grid/grid3-hd-btn.gif";s:4:"e3e7";s:49:"resources/images/default/grid/grid3-hrow-over.gif";s:4:"a92d";s:44:"resources/images/default/grid/grid3-hrow.gif";s:4:"4c58";s:54:"resources/images/default/grid/grid3-special-col-bg.gif";s:4:"c9df";s:58:"resources/images/default/grid/grid3-special-col-sel-bg.gif";s:4:"a940";s:40:"resources/images/default/grid/hd-pop.gif";s:4:"e5f2";s:43:"resources/images/default/grid/hmenu-asc.gif";s:4:"048e";s:44:"resources/images/default/grid/hmenu-desc.gif";s:4:"f0a9";s:44:"resources/images/default/grid/hmenu-lock.gif";s:4:"bcef";s:44:"resources/images/default/grid/hmenu-lock.png";s:4:"2a3b";s:46:"resources/images/default/grid/hmenu-unlock.gif";s:4:"8cc8";s:46:"resources/images/default/grid/hmenu-unlock.png";s:4:"c1f6";s:46:"resources/images/default/grid/invalid_line.gif";s:4:"04a8";s:41:"resources/images/default/grid/loading.gif";s:4:"00ef";s:40:"resources/images/default/grid/mso-hd.gif";s:4:"37fb";s:40:"resources/images/default/grid/nowait.gif";s:4:"23c9";s:53:"resources/images/default/grid/page-first-disabled.gif";s:4:"8d31";s:44:"resources/images/default/grid/page-first.gif";s:4:"16ec";s:52:"resources/images/default/grid/page-last-disabled.gif";s:4:"1d12";s:43:"resources/images/default/grid/page-last.gif";s:4:"ef52";s:52:"resources/images/default/grid/page-next-disabled.gif";s:4:"0f4b";s:43:"resources/images/default/grid/page-next.gif";s:4:"f6f9";s:52:"resources/images/default/grid/page-prev-disabled.gif";s:4:"eefc";s:43:"resources/images/default/grid/page-prev.gif";s:4:"80da";s:45:"resources/images/default/grid/pick-button.gif";s:4:"b431";s:41:"resources/images/default/grid/refresh.gif";s:4:"8dae";s:50:"resources/images/default/grid/row-check-sprite.gif";s:4:"2d0a";s:51:"resources/images/default/grid/row-expand-sprite.gif";s:4:"be81";s:42:"resources/images/default/grid/row-over.gif";s:4:"f639";s:41:"resources/images/default/grid/row-sel.gif";s:4:"ca87";s:42:"resources/images/default/grid/sort_asc.gif";s:4:"cc18";s:43:"resources/images/default/grid/sort_desc.gif";s:4:"fcfe";s:38:"resources/images/default/grid/wait.gif";s:4:"b0cd";s:47:"resources/images/default/panel/tool-sprites.gif";s:4:"31cc";s:44:"resources/images/default/shared/calendar.gif";s:4:"8129";s:44:"resources/images/default/shared/glass-bg.gif";s:4:"bc2c";s:44:"resources/images/default/shared/left-btn.gif";s:4:"6bf3";s:45:"resources/images/default/shared/right-btn.gif";s:4:"e7ad";s:43:"resources/images/default/shared/warning.gif";s:4:"448d";s:45:"resources/images/default/editor/tb-sprite.gif";s:4:"a2f0";s:44:"resources/images/default/layout/collapse.gif";s:4:"dfce";s:42:"resources/images/default/layout/expand.gif";s:4:"c9c9";s:47:"resources/images/default/layout/gradient-bg.gif";s:4:"e117";s:47:"resources/images/default/layout/ns-collapse.gif";s:4:"efa9";s:45:"resources/images/default/layout/ns-expand.gif";s:4:"da1f";s:47:"resources/images/default/layout/panel-close.gif";s:4:"b185";s:50:"resources/images/default/layout/panel-title-bg.gif";s:4:"b663";s:56:"resources/images/default/layout/panel-title-light-bg.gif";s:4:"688d";s:41:"resources/images/default/layout/stick.gif";s:4:"be9e";s:41:"resources/images/default/layout/stuck.gif";s:4:"745e";s:48:"resources/images/default/layout/tab-close-on.gif";s:4:"0ae2";s:45:"resources/images/default/layout/tab-close.gif";s:4:"f921";s:51:"resources/images/default/basic-dialog/btn-arrow.gif";s:4:"9e23";s:52:"resources/images/default/basic-dialog/btn-sprite.gif";s:4:"73a8";s:47:"resources/images/default/basic-dialog/close.gif";s:4:"2d54";s:50:"resources/images/default/basic-dialog/collapse.gif";s:4:"63b2";s:50:"resources/images/default/basic-dialog/e-handle.gif";s:4:"f935";s:48:"resources/images/default/basic-dialog/expand.gif";s:4:"740a";s:51:"resources/images/default/basic-dialog/hd-sprite.gif";s:4:"6a54";s:50:"resources/images/default/basic-dialog/progress.gif";s:4:"baff";s:51:"resources/images/default/basic-dialog/progress2.gif";s:4:"3390";s:50:"resources/images/default/basic-dialog/s-handle.gif";s:4:"36b9";s:51:"resources/images/default/basic-dialog/se-handle.gif";s:4:"668b";s:41:"resources/images/default/menu/checked.gif";s:4:"692b";s:47:"resources/images/default/menu/group-checked.gif";s:4:"f797";s:45:"resources/images/default/menu/menu-parent.gif";s:4:"d303";s:38:"resources/images/default/menu/menu.gif";s:4:"5d34";s:43:"resources/images/default/menu/unchecked.gif";s:4:"9b90";s:47:"resources/images/default/form/clear-trigger.gif";s:4:"97b3";s:46:"resources/images/default/form/date-trigger.gif";s:4:"30b5";s:51:"resources/images/default/form/error-tip-corners.gif";s:4:"3644";s:45:"resources/images/default/form/exclamation.gif";s:4:"4049";s:48:"resources/images/default/form/search-trigger.gif";s:4:"559e";s:41:"resources/images/default/form/text-bg.gif";s:4:"d5ba";s:45:"resources/images/default/form/trigger-tpl.gif";s:4:"d7be";s:41:"resources/images/default/form/trigger.gif";s:4:"4501";s:58:"resources/images/default/tabs/tab-btm-inactive-left-bg.gif";s:4:"4f14";s:59:"resources/images/default/tabs/tab-btm-inactive-right-bg.gif";s:4:"eb24";s:49:"resources/images/default/tabs/tab-btm-left-bg.gif";s:4:"a36e";s:50:"resources/images/default/tabs/tab-btm-right-bg.gif";s:4:"9e42";s:44:"resources/images/default/tabs/tab-sprite.gif";s:4:"6a7d";s:38:"resources/images/vista/gradient-bg.gif";s:4:"e117";s:28:"resources/images/vista/s.gif";s:4:"fc94";s:34:"resources/images/vista/qtip/bg.gif";s:4:"09bc";s:42:"resources/images/vista/qtip/tip-sprite.gif";s:4:"947a";s:42:"resources/images/vista/toolbar/gray-bg.gif";s:4:"01d1";s:48:"resources/images/vista/toolbar/tb-btn-sprite.gif";s:4:"be68";s:46:"resources/images/vista/sizer/e-handle-dark.gif";s:4:"1f1c";s:41:"resources/images/vista/sizer/e-handle.gif";s:4:"9208";s:47:"resources/images/vista/sizer/ne-handle-dark.gif";s:4:"2e7d";s:42:"resources/images/vista/sizer/ne-handle.gif";s:4:"0c76";s:47:"resources/images/vista/sizer/nw-handle-dark.gif";s:4:"1bcc";s:42:"resources/images/vista/sizer/nw-handle.gif";s:4:"1236";s:46:"resources/images/vista/sizer/s-handle-dark.gif";s:4:"1a2a";s:41:"resources/images/vista/sizer/s-handle.gif";s:4:"b215";s:47:"resources/images/vista/sizer/se-handle-dark.gif";s:4:"83ea";s:42:"resources/images/vista/sizer/se-handle.gif";s:4:"a52f";s:47:"resources/images/vista/sizer/sw-handle-dark.gif";s:4:"b87b";s:42:"resources/images/vista/sizer/sw-handle.gif";s:4:"bd8b";s:42:"resources/images/vista/grid/grid-split.gif";s:4:"3ef4";s:45:"resources/images/vista/grid/grid-vista-hd.gif";s:4:"675f";s:42:"resources/images/vista/layout/collapse.gif";s:4:"0ec6";s:40:"resources/images/vista/layout/expand.gif";s:4:"d6bb";s:45:"resources/images/vista/layout/gradient-bg.gif";s:4:"15e8";s:45:"resources/images/vista/layout/ns-collapse.gif";s:4:"d9f3";s:43:"resources/images/vista/layout/ns-expand.gif";s:4:"824e";s:45:"resources/images/vista/layout/panel-close.gif";s:4:"ed4c";s:48:"resources/images/vista/layout/panel-title-bg.gif";s:4:"e38e";s:54:"resources/images/vista/layout/panel-title-light-bg.gif";s:4:"a150";s:39:"resources/images/vista/layout/stick.gif";s:4:"dd56";s:46:"resources/images/vista/layout/tab-close-on.gif";s:4:"99f2";s:43:"resources/images/vista/layout/tab-close.gif";s:4:"2460";s:49:"resources/images/vista/basic-dialog/bg-center.gif";s:4:"dc9a";s:47:"resources/images/vista/basic-dialog/bg-left.gif";s:4:"d69d";s:48:"resources/images/vista/basic-dialog/bg-right.gif";s:4:"05b1";s:45:"resources/images/vista/basic-dialog/close.gif";s:4:"166e";s:48:"resources/images/vista/basic-dialog/collapse.gif";s:4:"4fc5";s:46:"resources/images/vista/basic-dialog/dlg-bg.gif";s:4:"ac0c";s:48:"resources/images/vista/basic-dialog/e-handle.gif";s:4:"9ac6";s:46:"resources/images/vista/basic-dialog/expand.gif";s:4:"8e41";s:49:"resources/images/vista/basic-dialog/hd-sprite.gif";s:4:"9d63";s:48:"resources/images/vista/basic-dialog/s-handle.gif";s:4:"8d2d";s:49:"resources/images/vista/basic-dialog/se-handle.gif";s:4:"41c3";s:48:"resources/images/vista/basic-dialog/w-handle.gif";s:4:"01ae";s:56:"resources/images/vista/tabs/tab-btm-inactive-left-bg.gif";s:4:"84f7";s:57:"resources/images/vista/tabs/tab-btm-inactive-right-bg.gif";s:4:"c3dc";s:47:"resources/images/vista/tabs/tab-btm-left-bg.gif";s:4:"2fc4";s:48:"resources/images/vista/tabs/tab-btm-right-bg.gif";s:4:"2c0e";s:42:"resources/images/vista/tabs/tab-sprite.gif";s:4:"9b10";s:37:"resources/images/gray/gradient-bg.gif";s:4:"e117";s:27:"resources/images/gray/s.gif";s:4:"fc94";s:33:"resources/images/gray/qtip/bg.gif";s:4:"09bc";s:41:"resources/images/gray/qtip/tip-sprite.gif";s:4:"a80f";s:41:"resources/images/gray/toolbar/gray-bg.gif";s:4:"cf2d";s:47:"resources/images/gray/toolbar/tb-btn-sprite.gif";s:4:"32a6";s:45:"resources/images/gray/sizer/e-handle-dark.gif";s:4:"1f1c";s:40:"resources/images/gray/sizer/e-handle.gif";s:4:"9208";s:46:"resources/images/gray/sizer/ne-handle-dark.gif";s:4:"2e7d";s:41:"resources/images/gray/sizer/ne-handle.gif";s:4:"0c76";s:46:"resources/images/gray/sizer/nw-handle-dark.gif";s:4:"1bcc";s:41:"resources/images/gray/sizer/nw-handle.gif";s:4:"1236";s:45:"resources/images/gray/sizer/s-handle-dark.gif";s:4:"1a2a";s:40:"resources/images/gray/sizer/s-handle.gif";s:4:"b215";s:46:"resources/images/gray/sizer/se-handle-dark.gif";s:4:"83ea";s:41:"resources/images/gray/sizer/se-handle.gif";s:4:"a52f";s:46:"resources/images/gray/sizer/sw-handle-dark.gif";s:4:"b87b";s:41:"resources/images/gray/sizer/sw-handle.gif";s:4:"bd8b";s:40:"resources/images/gray/grid/grid-hrow.gif";s:4:"c88c";s:41:"resources/images/gray/layout/collapse.gif";s:4:"489e";s:39:"resources/images/gray/layout/expand.gif";s:4:"904c";s:44:"resources/images/gray/layout/gradient-bg.gif";s:4:"15e8";s:44:"resources/images/gray/layout/ns-collapse.gif";s:4:"8f01";s:42:"resources/images/gray/layout/ns-expand.gif";s:4:"ca92";s:44:"resources/images/gray/layout/panel-close.gif";s:4:"ed4c";s:47:"resources/images/gray/layout/panel-title-bg.gif";s:4:"b663";s:53:"resources/images/gray/layout/panel-title-light-bg.gif";s:4:"7956";s:38:"resources/images/gray/layout/stick.gif";s:4:"ea26";s:45:"resources/images/gray/layout/tab-close-on.gif";s:4:"99f2";s:42:"resources/images/gray/layout/tab-close.gif";s:4:"f921";s:44:"resources/images/gray/basic-dialog/close.gif";s:4:"b394";s:47:"resources/images/gray/basic-dialog/collapse.gif";s:4:"0843";s:45:"resources/images/gray/basic-dialog/dlg-bg.gif";s:4:"ac0c";s:47:"resources/images/gray/basic-dialog/e-handle.gif";s:4:"9ac6";s:45:"resources/images/gray/basic-dialog/expand.gif";s:4:"4597";s:48:"resources/images/gray/basic-dialog/hd-sprite.gif";s:4:"e6da";s:47:"resources/images/gray/basic-dialog/s-handle.gif";s:4:"8d2d";s:48:"resources/images/gray/basic-dialog/se-handle.gif";s:4:"41c3";s:38:"resources/images/gray/menu/checked.gif";s:4:"692b";s:44:"resources/images/gray/menu/group-checked.gif";s:4:"f797";s:42:"resources/images/gray/menu/menu-parent.gif";s:4:"4a05";s:35:"resources/images/gray/menu/menu.gif";s:4:"b592";s:40:"resources/images/gray/menu/unchecked.gif";s:4:"9b90";s:55:"resources/images/gray/tabs/tab-btm-inactive-left-bg.gif";s:4:"e512";s:56:"resources/images/gray/tabs/tab-btm-inactive-right-bg.gif";s:4:"1a24";s:46:"resources/images/gray/tabs/tab-btm-left-bg.gif";s:4:"09c8";s:47:"resources/images/gray/tabs/tab-btm-right-bg.gif";s:4:"a9a8";s:41:"resources/images/gray/tabs/tab-sprite.gif";s:4:"a55e";s:37:"resources/images/aero/gradient-bg.gif";s:4:"e117";s:27:"resources/images/aero/s.gif";s:4:"fc94";s:33:"resources/images/aero/qtip/bg.gif";s:4:"09bc";s:36:"resources/images/aero/toolbar/bg.gif";s:4:"39e8";s:47:"resources/images/aero/toolbar/tb-btn-sprite.gif";s:4:"ba0a";s:45:"resources/images/aero/sizer/e-handle-dark.gif";s:4:"1f1c";s:40:"resources/images/aero/sizer/e-handle.gif";s:4:"9208";s:46:"resources/images/aero/sizer/ne-handle-dark.gif";s:4:"2e7d";s:41:"resources/images/aero/sizer/ne-handle.gif";s:4:"0c76";s:46:"resources/images/aero/sizer/nw-handle-dark.gif";s:4:"1bcc";s:41:"resources/images/aero/sizer/nw-handle.gif";s:4:"1236";s:45:"resources/images/aero/sizer/s-handle-dark.gif";s:4:"1a2a";s:40:"resources/images/aero/sizer/s-handle.gif";s:4:"b215";s:46:"resources/images/aero/sizer/se-handle-dark.gif";s:4:"83ea";s:41:"resources/images/aero/sizer/se-handle.gif";s:4:"a52f";s:46:"resources/images/aero/sizer/sw-handle-dark.gif";s:4:"b87b";s:41:"resources/images/aero/sizer/sw-handle.gif";s:4:"bd8b";s:46:"resources/images/aero/grid/grid-blue-split.gif";s:4:"0494";s:40:"resources/images/aero/grid/grid-hrow.gif";s:4:"6720";s:41:"resources/images/aero/grid/grid-split.gif";s:4:"225c";s:44:"resources/images/aero/grid/grid-vista-hd.gif";s:4:"675f";s:39:"resources/images/aero/grid/pspbrwse.jbf";s:4:"92db";s:42:"resources/images/aero/grid/sort-col-bg.gif";s:4:"c3f6";s:39:"resources/images/aero/grid/sort_asc.gif";s:4:"2352";s:40:"resources/images/aero/grid/sort_desc.gif";s:4:"d104";s:41:"resources/images/aero/layout/collapse.gif";s:4:"0ec6";s:39:"resources/images/aero/layout/expand.gif";s:4:"d6bb";s:44:"resources/images/aero/layout/gradient-bg.gif";s:4:"15e8";s:44:"resources/images/aero/layout/ns-collapse.gif";s:4:"d9f3";s:42:"resources/images/aero/layout/ns-expand.gif";s:4:"824e";s:44:"resources/images/aero/layout/panel-close.gif";s:4:"ed4c";s:47:"resources/images/aero/layout/panel-title-bg.gif";s:4:"8b92";s:53:"resources/images/aero/layout/panel-title-light-bg.gif";s:4:"c395";s:45:"resources/images/aero/layout/tab-close-on.gif";s:4:"99f2";s:42:"resources/images/aero/layout/tab-close.gif";s:4:"2460";s:54:"resources/images/aero/basic-dialog/aero-close-over.gif";s:4:"b790";s:49:"resources/images/aero/basic-dialog/aero-close.gif";s:4:"bba9";s:48:"resources/images/aero/basic-dialog/bg-center.gif";s:4:"5aa2";s:46:"resources/images/aero/basic-dialog/bg-left.gif";s:4:"5a54";s:47:"resources/images/aero/basic-dialog/bg-right.gif";s:4:"cb27";s:44:"resources/images/aero/basic-dialog/close.gif";s:4:"166e";s:52:"resources/images/aero/basic-dialog/collapse-over.gif";s:4:"f76d";s:47:"resources/images/aero/basic-dialog/collapse.gif";s:4:"d4e1";s:47:"resources/images/aero/basic-dialog/e-handle.gif";s:4:"9ac6";s:50:"resources/images/aero/basic-dialog/expand-over.gif";s:4:"3cd3";s:45:"resources/images/aero/basic-dialog/expand.gif";s:4:"0709";s:48:"resources/images/aero/basic-dialog/hd-sprite.gif";s:4:"2903";s:47:"resources/images/aero/basic-dialog/s-handle.gif";s:4:"8d2d";s:48:"resources/images/aero/basic-dialog/se-handle.gif";s:4:"272b";s:47:"resources/images/aero/basic-dialog/w-handle.gif";s:4:"01ae";s:38:"resources/images/aero/menu/checked.gif";s:4:"cb7b";s:40:"resources/images/aero/menu/item-over.gif";s:4:"bb4c";s:35:"resources/images/aero/menu/menu.gif";s:4:"ae12";s:40:"resources/images/aero/menu/unchecked.gif";s:4:"3184";s:55:"resources/images/aero/tabs/tab-btm-inactive-left-bg.gif";s:4:"30c8";s:56:"resources/images/aero/tabs/tab-btm-inactive-right-bg.gif";s:4:"4ab7";s:46:"resources/images/aero/tabs/tab-btm-left-bg.gif";s:4:"26c2";s:47:"resources/images/aero/tabs/tab-btm-right-bg.gif";s:4:"ab4e";s:41:"resources/images/aero/tabs/tab-sprite.gif";s:4:"7f4e";s:43:"resources/images/aero/tabs/tab-strip-bg.gif";s:4:"75ea";s:43:"resources/images/aero/tabs/tab-strip-bg.png";s:4:"d99e";s:47:"resources/images/aero/tabs/tab-strip-btm-bg.gif";s:4:"f76e";s:25:"resources/css/ext-all.css";s:4:"e932";s:29:"resources/css/xtheme-aero.css";s:4:"4a51";s:29:"resources/css/xtheme-gray.css";s:4:"512b";s:30:"resources/css/xtheme-vista.css";s:4:"182b";s:21:"doc/INCLUDE_ORDER.txt";s:4:"5688";s:19:"doc/ext-license.txt";s:4:"de20";s:14:"doc/manual.sxw";s:4:"5124";}',
);

?>