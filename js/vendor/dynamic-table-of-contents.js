/************************************************************************************************************
Dynamic Table Of Contents
Copyright (C) April 2011  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2011
Owner of DHTMLgoodies.com

************************************************************************************************************/




if(!window.DG) {
  window.DG = {};
}



DG.TableOfContents = new Class({
	
	dom : {
		el : null,
		toc : null
	},
	toTop : {
		depth : 3,
		enabled : false,
		txt : 'Top'
	},
	numbering : {
		enabled : false,
		format : '111111',
		separator : '.',
		suffix : ' ',
		formatObj : null
	},
	
	heading : '',
	depth : 3,

	currentNumberingValues : [null, 0,0,0,0,0,0],
	
	initialize : function(config){
		config = config || {};
		
		if(config.el){
			this.dom.el = $(config.el);
		}else{
			this.setParentAutomatically();
		}
		if(config.tocEl){
			this.dom.toc = config.tocEl;
		}else{
			this.setTocElAutomatically();
		}
		if(config.heading != undefined){
			this.heading = config.heading;
		}
		
		if(config.numbering){
			if(config.numbering.enabled !== undefined){
				this.numbering.enabled = config.numbering.enabled;
			}
			if(config.numbering.format){
				this.numbering.format = config.numbering.format;
			}
			if(config.numbering.separator){
				this.numering.separator = config.numbering.separator;
			}
		}
		this.createTopAnchor();
		this.createHeading();
		
		if(config.tocDepth){
			this.depth = config.tocDepth;
		}
		
		if(config.toTop){
			if(config.toTop.depth){
				this.toTop.depth = config.toTop.depth;
			}
			if(config.toTop.enabled !== undefined){
				this.toTop.enabled = config.toTop.enabled;
			}		
			if(config.toTop.txt){
				this.toTop.txt = config.toTop.txt;
			}			
		}
		this.createToc();
		
	},
	
	createToc : function() {
		var parent = this.dom.el;
		var currentParents = [parent];
		var tocEl = $(this.dom.toc);
		var elements = parent.getElements(this.getCssSelectorsForHeadings());
		var countElements = elements.length;

		var ul = new Element('ul');
		
		var numberOfPreviousHeading = null;
		var currentParentUls = {
			h1 : ul,
			h2 : null,
			h3 : null,
			h4 : null,
			h5 : null,
			h6 : null				
		}
			
		var numbering = [null, 0,0,0,0,0,0];
		
		var previousHeading = {
			headingNumber : 1
		}
		for(var i = 0;i<countElements;i++){		
			
			var headingNumber = this.getNumericValueOfHeading(elements[i]);
			if(i>0 && this.toTop.enabled && headingNumber <= this.toTop.depth){
				this.createToTopLink(elements[i]);
			}
			
			if(headingNumber < previousHeading.headingNumber){
				this.resetNumberingFromLevel(headingNumber);
			};
			this.increaseNumberingValueForCurrentLevel(headingNumber);
			
			if(headingNumber > previousHeading.headingNumber && i > 0){
				currentParentUls['h' + headingNumber] = new Element('ul');
				li.adopt(currentParentUls['h' + headingNumber]);
			}		
			var anchorName = 'tocEl-' + i;
			var anchor = new Element('a', {
				name : anchorName
			});
			anchor.inject(elements[i], 'before');
			
			var li = new Element('li');
			li.addClass('DG-toc-level-' + headingNumber);
			var tocText = elements[i].get('text');
			if(this.numbering.enabled){
				tocText = this.getNumber(headingNumber) + tocText;
			}
			var a = new Element('a', {
				href : '#' + anchorName,
				text : tocText
			});
			a.addClass('DG-toc-anchor-level-' + headingNumber);
			li.adopt(a);

            var parent = currentParentUls[elements[i].tagName.toLowerCase()];
            if(!parent){
                parent = ul;
            }
            parent.adopt(li);

			previousHeading = {
				headingNumber : headingNumber
			}
		}
		this.dom.toc.adopt(ul);		
		if(this.toTop.enabled){
			var el = new Element('div');
			this.dom.el.adopt(el);
			this.createToTopLink(el);
		}		
	},
	resetNumberingFromLevel : function(level){
		for(var i=level + 1;i<=6;i++){
			this.currentNumberingValues[i] = 0;
		}
	},
	increaseNumberingValueForCurrentLevel : function(level){
		this.currentNumberingValues[level]++;
	},
	getNumber : function(level){
		var ret = '';
		for(var i=1;i<=level;i++){
            if(this.currentNumberingValues[i] > 0){
                if(i > 1 && this.currentNumberingValues[i-1] != 0){
                    ret = ret + this.numbering.separator;
                }
                ret = ret + this.getNumberInCorrectFormat(i);
            }
		}
		ret = ret + this.numbering.suffix;
		return ret;
	},
	
	getNumberInCorrectFormat : function(level) {
		if(!this.numbering.formatObj){
			this.numbering.formatObj = [];
			for(var i=0;i<this.numbering.format.length;i++){
				this.numbering.formatObj[i+1] = this.numbering.format.substr(i,1);
			}
		}
		switch(this.numbering.formatObj[level]){
			case 'a':
				return String.fromCharCode(96 + this.currentNumberingValues[level])
			case 'A':
				return String.fromCharCode(64 + this.currentNumberingValues[level])
		
			case 'i':
				return this.toRoman(this.currentNumberingValues[level], true).toLowerCase();				
			case 'I':
				return this.toRoman(this.currentNumberingValues[level], true);	
			default: 
				return this.currentNumberingValues[level];		
		}		
	},
	// Convert to Roman Numerals
	// copyright 25th July 2005, by Stephen Chapman http://javascript.about.com
	// permission to use this Javascript on your web page is granted
	// provided that all of the code (including this copyright notice) is
	// used exactly as shown
	toRoman : function(n,s) {
		var r = '';
		var d; 
		var rn = new Array('IIII','V','XXXX','L','CCCC','D','MMMM'); 
		for (var i=0; i< rn.length; i++) {
			var x = rn[i].length+1;
			var d = n%x; 
			r= rn[i].substr(0,d)+r;
			n = (n-d)/x;
		} 
		if (s) {
			r=r.replace(/DCCCC/g,'CM');
			r=r.replace(/CCCC/g,'CD');
			r=r.replace(/LXXXX/g,'XC');
			r=r.replace(/XXXX/g,'XL');
			r=r.replace(/VIIII/g,'IX');
			r=r.replace(/IIII/g,'IV');
		} 
		return r;
	},	                  
	
	createToTopLink : function(parent) {
		var a = new Element('a', {
			href : '#dynamic-table-of-contents-top',
			text : this.toTop.txt
		});
		a.inject(parent, 'before');
	},
	
	getNumericValueOfHeading : function(heading) {
		return heading.tagName.replace(/[^0-9]/g,'') / 1;
	},
	getCssSelectorsForHeadings : function(){
		var ret = 'h1';
		for(var i=2;i<=this.depth;i++){
			ret = ret + ', h'+i;
		}
		return ret;
	},
	setParentAutomatically : function(){
		this.dom.el = $$('.DG-toc-container')[0];
	},
	setTocElAutomatically : function(){
		this.dom.toc = new Element('div');
		this.dom.toc.addClass('DG-toc-parent')
		this.dom.toc.inject(this.dom.el, 'before');
	},
	createTopAnchor : function(){
		var el = new Element('a', { name : 'dynamic-table-of-contents-top'});
		this.dom.toc.adopt(el);
	},
	
	createHeading : function(){
		if(this.heading){
			var el = new Element('h1', { text : this.heading } );
			el.addClass('DG-toc-heading');			
		}
		this.dom.toc.adopt(el);
		
		
	}
	
	
});