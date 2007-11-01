﻿/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2007 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * FCKToolbarBreak Class: breaks the toolbars.
 * It makes it possible to force the toolbar to break to a new line.
 * This is the IE specific implementation.
 */

var FCKToolbarBreak = function()
{}

FCKToolbarBreak.prototype.Create = function( targetElement )
{
	var oBreakDiv = FCKTools.GetElementDocument( targetElement ).createElement( 'div' ) ;

	oBreakDiv.className = 'TB_Break' ;

	oBreakDiv.style.clear = FCKLang.Dir == 'rtl' ? 'left' : 'right' ;

	targetElement.appendChild( oBreakDiv ) ;
}
