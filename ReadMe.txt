
Bestsellers Box, Specials Box and Whats New Box Replacements. Written by R. Pink.

Replaces the exisitng boxes, using javascript to transition between products in each category.
It uses the jquery library with the excellent Cycle plugin from: http://malsup.com/jquery/cycle/

Warning if you are using any other Javascript libraries you may experience problems with this contribution,
Support for Jquery can be found at: http://jquery.com/

This contribution has been tested in Safari, Firefox, Netscape and Internet Explorer with no problems found yet.We
have been running this modification for around 9 months with nor bug reports yet.

For a Live preview please visit: http://www.airsoft-viper.com, but make sure you disable your flash plugins first.






/****************************************************************************************************************/
/*	Installation												*/
/****************************************************************************************************************/

IMPORTANT! 	Before modifying any file always make a backup first, 

1/ In the directory: catalog/includes/boxes/ 
	overwrite the files whats_new.php, specials.php and best_sellers.php with the files in the contribution;

2/ copy the folder JS/ in the contribution to the root of your shop, i.e. /catalog/;


3/ Open catalog/stylesheet.css,
	Copy the following textand paste it at the end of stylesheet:
		
/*Start whats new Style*/
.wncontainer { /*Main div holding children whats new products*/
	height:170px;
	width: 150px;
	text-align:center;
}

.whatsnew {/*Child div holding whats new products*/
	height:170px;
	width: 150px;
}
.whatsnew table{
	width:100%;
}

.whatsnew td{/*TD child specials products*/
	text-align:center;
	color:#000000;
}

.whatsnew a{/* Hyperlink style within specials products*/
	color:#33FF00;
}
/*End whats new Scroll Style */
/*Start specials style*/
.speccontainer { /*Main div holding children specials products*/
	height:170px;
	width: 150px;
	text-align:center;
}

.specials {/*Child div holding specials products*/
	height:170px;
	width:150px;
}
.specials table{
	width:100%;

}

.specials td{/*TD child specials products*/
	color:#000000;
	text-align:center;
}

.specials a{/* Hyperlink style within specials products*/
	color:#33FF00;
}
/*end specials style*/
/*Start Bestsellers scroll style options*/
.bscontainer { /*Main div holding children bestelling products*/
	height:170px;
	width: 150px;
	text-align:center;

}

.bestsellers {/*Child div holding bestelling products*/
	height:170px;
	width:150px;
}
.bestsellers table{
	width:100%;
	text-align:center;
}

.bestsellers td{/*TD child bestelling products*/
	text-align:center;
	color:#000000;
}

.bestsellers a{/* Hyperlink style within bestselling products*/
	color:#33FF00;
}
/*End Best Seller Scroll Style Functions*/ 



4/ open the File catalog/index.php
	around line 42, before the </head> tag add the following 2 lines:

<script type="text/javascript" src="js/jquery-1.2.6.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.pack.js"></script>



That's it for the installation.


/****************************************************************************************************************/
/*	Customisation												*/
/****************************************************************************************************************/

Each box has its own independant style that can be modifed in the stylesheet. Each of the boxes has an internal setting
determining the transition that occurs, and the time interval between tranistions, to change this set up, it can be found on around line
56 of specials.php, line 57 of whats_new.php and line 61 of best_sellers.php. For full reference of the settings that
can be applied please visit the jquery cycle plugin homepage at: http://malsup.com/jquery/cycle/




