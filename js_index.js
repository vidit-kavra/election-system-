var show=0;
//FUNCTIONS
function slideshow(){
	var i;
	var x = document.getElementsByClassName("slide");
	for(i=0;i<x.length;i++)
	{
		x[i].style.display="none";
	}
	x[show].style.display="block";
	show++;
	if(show>3)
	{
		show=0;
	}
setTimeout(slideshow,5000);
}