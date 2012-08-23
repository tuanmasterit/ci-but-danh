jQuery(document).ready(function(){

		var arr = jQuery("#hdfview").attr("value");
		var str_arr = arr.split(',');
		var max_view=0;
		var flash = Array();
		if(str_arr.length>0)
		{
			for(var i=1;i<str_arr.length;i++)
			{
				flash[i-1] = [i,str_arr[i]];
				if(max_view<parseInt(str_arr[i])){max_view=parseInt(str_arr[i]);}
			}
		}
		else{
			flash = [[0, 146], [1, 576], [2,600], [3, 614], [4, 667], [5, 689], [6, 699]];			
		}
		
		//for (var i = 0; i < 14; i += 0.5)
       	//	flash.push([i, Math.sin(i)]);

		
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}

		
		var plot = jQuery.plot(jQuery("#chartplace"),
			   [ { data: flash, label: "Visits", color: "#069"} ], {
				   series: {
					   lines: { show: true, lineWidth: 1, fill: true, fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.5 } ] } },
					   points: { show: true, radius: 2 }, shadowSize: 0
				
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, labelMargin: 5, borderWidth: 1, borderColor: '#bbb' },
				   yaxis: { show: false, min: 0, max: max_view*1.5 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    jQuery("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY,
                                item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                jQuery("#tooltip").remove();
                previousPoint = null;            
            }
	
		});
	
		jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
		
		//datepicker
		jQuery('#datepicker').datepicker();
		
		//show tabbed widget
		jQuery('#tabs').tabs();
		
		
		/*****SIMPLE CHART*****/
		
	/***** WIDGET LIST HOVER *****/
	jQuery('.widgetlist a').hover(function(){
		jQuery(this).switchClass('default', 'hover');
	},function(){
		jQuery(this).switchClass('hover', 'default');
	});

});