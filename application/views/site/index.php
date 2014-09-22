
<div class="container documents">
    <div class="page-header">
        <h1 id="timeline">Timeline</h1>
    </div>
    
    
    
<div class="row" id='time-line'>
	<!-- div class="col-md-12">
		<div class="timeline">
				  <dl>
				     <dt>2014 九月</dt>
				     <?php 
				       $i = 0;
				       foreach ($date_list as $date){       
				     ?>
					  <dd class="pos-<?php if($i%2==0){echo 'right'; }else{ echo 'left'; }?> clearfix">
						  <div class="circ <?php if($i==4){echo 'circ-active'; }?>" style="<?php if($i==4){echo 'border: 4px solid #ed5565;'; }?>"></div>
						  <div class="time"><?php echo date('Y/m/d',strtotime($date['date'])); ?></div>
						  <div class="events">
							  <div class="pull-left">
								  <img class="events-object img-rounded" src="/public/img/photo-1.jpg">
							  </div>
							  <div class="events-body">
								  <h4 class="events-heading">Bootstrap</h4>
								  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
							  </div>
						  </div>
					  </dd>
					  <?php $i++; } ?>
				 </dl>
		 </div>
	</div-->	 		 
</div>

<script id="entry-template" type="text/x-handlebars-template">
  <div class="col-md-12">
		<div class="timeline">
			<dl>
				<dt>2014 九月</dt>
				  {{#each items}}
                     {{#if @index}}
					   <dd class="pos-right clearfix">
					 {{else}}
                        <dd class="pos-left clearfix">
					 {{/if}}
						  <div class="circ"></div>
						  <div class="time">{{this.format_date}}</div>
						  <div class="events">
							  <div class="pull-left">
								  <img class="events-object img-rounded" src="/public/img/photo-1.jpg">
							  </div>
							  <div class="events-body">
								  <h4 class="events-heading">Bootstrap</h4>
								  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
							  </div>
						  </div>
					  </dd>
				  {{/each}}	  
			</dl>
        </div> 
</div>			  		 
</script>

<script>
$(function() { //equivalent to document.ready
	//var scroll_offset = $(".circ-active").offset();
	//console.log(scroll_offset.top);
	
	/*$("body,html").animate({
		scrollTop: (scroll_offset.top-150) //让body的scrollTop等于pos的top，就实现了滚动
	 },1000);*/


	Handlebars.registerHelper("formatDate", function(timestamp){
		  date = new Date(timestamp); 
	      if (typeof(date) == "undefined") {
	         return "Unknown";
	      }
	      return date.getFullYear() + "/" + date.getMonth() + "/" + date.getDay() ;
	});

    Handlebars.registerHelper('if', function(val, options) {
		  if(val%2 == 0) {
		    return options.fn(this);
		  } else {
		    return options.inverse(this);
		  }
	});

    Handlebars.registerHelper('active', function(val, options) {
		  if(val%2 == 0) {
		    return options.fn(this);
		  } else {
		    return options.inverse(this);
		  }
	});
		
	 
    var so = {};
    $.ajax({
		type: "get",
		url: '/api/date_list',
		dataType: 'json',
		success: function(obj){
			console.log(obj);
			so.items = obj;
			var source = $("#entry-template").html();
			var template = Handlebars.compile(source);
			var html = template(so);
			$('#time-line').html(html);			
		},
		error: function(res){

	 }
	});
});
          
</script>