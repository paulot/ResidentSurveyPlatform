/**
 * 
 */



function toKg(weight){ return 0.45359237*weight; }
function ftTocm(ft){ return 30.48*ft; }
function inTocm(inc){ return 2.54*inc; }



function updateElement(id,val){
	document.getElementById(id).value =  val;
}

function updateElementHTML(id,val){
	document.getElementById(id).innerHTML =  val;
}


function openCloseOther(el, caller){
	if(caller.checked){
		el.style.visibility = "visible";
	} else{
		el.style.visibility = "hidden";
	}	
}


function convertValue(code, val, nameTo){
	if(code == "in")
		nameTo.value = inTocm(val);
	else if(code == "lb")
		nameTo.value = toKg(val);
	else
		nameTo.value = val;
}



function updateElementAE(id, val){
	if(val == 0)
			document.getElementById(id).innerHTML = "Good: easily palpable spinal dorsal process";
	else if(val == 1)
			document.getElementById(id).innerHTML = "Poor: difficult to palpate";
	else if(val == 2)
			document.getElementById(id).innerHTML = "None: unable to positively identify spinous process";
}

function updateElementPOS(id, val){
	if(val == 0)
		document.getElementById(id).innerHTML = "Good: able to flex spine adequately";
	if(val == 1)
		document.getElementById(id).innerHTML = "Poor: unable to flex spine";
}


//Move

/*
function moveRight(id, hMuch){
	el = document.getElementById(id);
	el.style.width = hMuch + "px";
}

function moveRightHelp(el, hMuch, cleft){
	if(hMuch = 0)
			return;
	el.style.left = 1 + cleft + "px";
	setTimeout("moveRightHelp(el, hMuch--, cleft++)", 10);
}

function moveLeft(id, hMuch){
	if(hMuch = 0)
		return;
	document.getElementById(id).style.left--;
	setTimeout("moveLeft(id. hMuch--)", 10);
}
*/

var open = 1;
function expandEl(id, size){
	if(open){
		$("."+id).animate({"width": "0px"}, "slow");
		open = 0;
	}else{
		$("."+id).animate({"width": size+"px"}, "slow");
		open = 1;
	}
	
}





//Floating the div

var ns = (navigator.appName.indexOf("Netscape") != -1);
var d = document;
function JSFX_FloatDiv(id, sx, sy, rid)
{
	var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
	var px = document.layers ? "" : "px";
	window[id + "_obj"] = el;
	if(d.layers)el.style=el;
	el.cx = el.sx = sx;el.cy = el.sy = sy;
	el.sP=function(x,y){this.style.left=document.getElementById(rid).offsetLeft - x+px;this.style.top=y+px;};
	//el.sP=function(x,y){$("#"+id).animate({"left" : document.getElementById(rid).offsetLeft - x+px,
	//									"top" : y+px}, 200);};
		
	
	
	
	el.floatIt=function()
	{
		var pX, pY;
		pX = (this.sx >= 0) ? 0 : ns ? innerWidth : 
		document.documentElement && document.documentElement.clientWidth ? 
		document.documentElement.clientWidth : document.body.clientWidth;
		pY = ns ? pageYOffset : document.documentElement && document.documentElement.scrollTop ? 
		document.documentElement.scrollTop : document.body.scrollTop;
		if(this.sy<0) 
		pY += ns ? innerHeight : document.documentElement && document.documentElement.clientHeight ? 
		document.documentElement.clientHeight : document.body.clientHeight;
		this.cx += (pX + this.sx - this.cx)/8;this.cy += (pY + this.sy - this.cy)/8;
		this.sP(this.cx, this.cy);
		setTimeout(this.id + "_obj.floatIt()", 20);
	};
	return el;
}
