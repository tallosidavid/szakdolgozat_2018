function setStyle(id,style,value)
	{
	id.style[style] = value;
	}
	function opacity(el,opacity)
	{
	setStyle(el,"filter:","alpha(opacity="+opacity+")");
	setStyle(el,"-moz-opacity",opacity/100);
	setStyle(el,"-khtml-opacity",opacity/100);
	setStyle(el,"opacity",opacity/100);
	}
	function calendar()
	{
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth();
	var year = date.getFullYear();
	
	months = new Array('Január', 'Február', 'Március', 'Április', 'Május', 'Június', 'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December');
	days_in_month = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
	if(year%4 == 0)
	{
	days_in_month[1]=29;
	}
	total = days_in_month[month];
	var date_today = year+' '+months[month]+' '+day;
	beg_j = date;
	beg_j.setDate(1);
	
	beg_j = beg_j.getDay();
	document.write('<table class="cal_calendar" onload="opacity(document.getElementById(\'cal_body\'),20);"><tbody id="cal_body"><tr><th colspan="7">'+date_today+'</th></tr>');
	document.write('<tr class="cal_d_weeks"><th>Vasárnap</th><th>Hétfõ</th><th>Kedd</th><th>Szerda</th><th>Csütörtök</th><th>Péntek</th><th>Szombat</th></tr><tr>');
	week = 0;
	for(i=1;i<=beg_j;i++)
	{
	document.write('<td class="cal_days_bef_aft">'+(days_in_month[month-1]-beg_j+i)+'</td>');
	week++;
	}
	for(i=1;i<=total;i++)
	{
	if(week==0)
	{
	document.write('<tr>');
		}
		if(day==i)
		{
		document.write('<td class="cal_today">'+i+'</td>');
		}
		else
		{
		document.write('<td>'+i+'</td>');
		}
		week++;
		if(week==7)
		{
	document.write('</tr>');
	week=0;
	}
	}
	for(i=1;week!=0;i++)
	{
	document.write('<td class="cal_days_bef_aft">'+i+'</td>');
	week++;
	if(week==7)
	{
document.write('</tr>');
week=0;
}
}
document.write('</tbody></table>');
opacity(document.getElementById('cal_body'),70);
return true;
}