<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" >
	<title>Flights</title>
	<link rel="shortcut icon" href="//www.redtag.ca/favicon.ico" >

	<?php  load_view('common/css'); ?>

<style type="text/css">	
.errors {  position: relative;} 
.errors h4 {font-size: 24px; margin-top: 0;  line-height: 30px;}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error .row-fluid .blue2 {margin-top: 40px;font-size: 24px;}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error .row-fluid .blue2 a { text-decoration:none;}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error .row-fluid .blue2 a b { text-decoration:none;}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error .row-fluid .red2 {color: #ca0000;clear: left;margin-top: 60px;font-size: 24px;}
.errors .detail-box { overflow: hidden;}
.errors .detail-box h3 {padding-left: 0px;color:#ca0000;}
.errors .detail-box .submit-form-btn{ margin-top: 5px; background-color: #659A41;
background-image: -webkit-gradient(linear, left top, left bottom, from(#a3a5a8), to(#717274));
background-image: -webkit-linear-gradient(top, #a3a5a8, #717274);
background-image: -moz-linear-gradient(top, #a3a5a8, #717274);
background-image: -o-linear-gradient(top, #a3a5a8, #717274);
background-image: linear-gradient(to bottom, #a3a5a8, #717274);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a3a5a8', endColorstr='#717274', GradientType=0);}
.errors .detail-box	.submit-form-btn:hover{	background-color: #333;
background-image: -webkit-gradient(linear, left top, left bottom, from(#333), to(#666));
background-image: -webkit-linear-gradient(top, #333, #666);
background-image: -moz-linear-gradient(top, #333, #666);
background-image: -o-linear-gradient(top, #333, #666);
background-image: linear-gradient(to bottom, #333, #666);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#333', endColorstr='#666', GradientType=0);}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box {border: solid 1px #ecf0f1;width: 96%;padding: 2%; position:relative; float: left;}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error{ position:relative;}
#main_container .flight_result_container .flight_info_container .padding.detail-box.shadow-small.form-box {background: #F7F2F2; padding: 2%;  width:96.1%; float:left; margin-top:20px;}		
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error .row-fluid .btn.span6.chat .chat-img { background-color: green; width:294px; height:49px; z-index:1;}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error .row-fluid .error-img {width:188px; height:252px; float: right; position:absolute; bottom: -6%; right:10%;}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error .row-fluid .span6.call-us .line-one {font-size: 21px; margin-top:10px; margin-bottom:5px;}
.errors .detail-box .terms-conditions .call-us .line-one.two {font-size: 22px;color: #000;font-weight: bold;}
.errors .container .row-fluid .span8 .detail-box.shadow-small.errors-box .sub-container.terms-conditions.error .row-fluid .span6.call-us .tel {font-size: 27px; color: #000000; font-weight: bold;line-height: 30px;text-decoration: none;}
.padding.detail-box.shadow-small.form-box input,
.padding.detail-box.shadow-small.form-box textarea {
width:70%;
padding:10px !important; -webkit-border-radius: 5px;
-moz-border-radius: 5px;
-ms-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px; box-shadow: none;
-webkit-appearance: textfield;
padding: 1px;
background-color: white;
border: 1px solid gray;}
.detail-box.shadow-small.form-box .row-fluid .row-fluid .btn.btn-large.span6.submit-form-btn {
color: #fff;
font-size: 16px;
font-weight: bold;
padding: 11px 14px; text-decoration:none;
margin-top: 0px;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-ms-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px; 
background-color: #659A41;
background-image: -webkit-gradient(linear, left top, left bottom, from(#a3a5a8), to(#717274));
background-image: -webkit-linear-gradient(top, #a3a5a8, #717274);
background-image: -moz-linear-gradient(top, #a3a5a8, #717274);
background-image: -o-linear-gradient(top, #a3a5a8, #717274);
background-image: linear-gradient(to bottom, #a3a5a8, #717274);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a3a5a8', endColorstr='#717274', GradientType=0);}
.detail-box.shadow-small.form-box .row-fluid .row-fluid .btn.btn-large.span6.submit-form-btn:hover{			
background-color: #333;
background-image: -webkit-gradient(linear, left top, left bottom, from(#333), to(#666));
background-image: -webkit-linear-gradient(top, #333, #666);
background-image: -moz-linear-gradient(top, #333, #666);
background-image: -o-linear-gradient(top, #333, #666);
background-image: linear-gradient(to bottom, #333, #666);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#333', endColorstr='#666', GradientType=0);}
</style>
</head>
<body>


<?php  load_view('common/header'); ?>

<div id="main_container">  

	<!-- passenger_container-->
	<div class="flight_result_container">

		<div class="flight_new_search alpha"> 
			<!-- side bar -->
			<div class="sidebar">
				<?php
					load_view('search/form', null);
				?>
			</div>
			<!-- end of sidebar-->
		</div>
		<!-- end flight new search -->


		<!-- flight_info_container-->
		<div class="flight_info_container">
			<div class="depart_details_space"></div>
			<div class="clear"></div>

				<!-- Error Details... -->
				<div class="errors">
					<div class="container">
						<div class="row-fluid">
							<div class="span8">							
								<div class="detail-box shadow-small errors-box">
									<div class="sub-container terms-conditions error">
										
										<div class="row-fluid">
											<h4 class="row-fluid">
												<?=$results['error']['long_description']?>
											</h4>
											<h2 class="blue2">
												<a href="" data-original-title="" title=""><!-- <i class="icon-minus-sign"></i> --><b>Go Back</b></a> to your search results. 
											</h2>
										</div>
										<div class="row-fluid">
											<h2 class="red2">
												Need help?
											</h2>
										</div>

										<div class="row-fluid">
											<!-- BEGIN LivePerson Button Code -->                
								                <div id='LP_DIV_1381248747514' style='width:221px;height:86px;'></div>
								            <!-- END LivePerson Button code -->
											<div class="span6 call-us">
												<div class="line-one">Call us at:</div>
												<a class="tel "href="tel18665733824">1-866-573-3824</a>												
											</div>
                                            <div class="">
												<img class="error-img"src="<?=BASEURL?>public/images/error-page-girl-b.png">
											</div>
										</div>

									</div>

								</div>
							</div>

							
						</div>
					</div>
				</div>
                
					<div class="padding detail-box shadow-small form-box">
						<h3>Email Us</h3>
						<div class="row-fluid">
							<label for="subtitle"><p>Use our contact form and one of our travel experts will get back to you shortly.</p></label>
						
							<div class="span10">
								<label for="name"><p></p></label>
								<input type="text" required="" id="form-emailus-name" name="form-emailus-name" placeholder="Name" pattern="[A-Za-z\s?]{2,}">								
							</div>							
							<div class="span10">
								<label for="email"><p></p></label>								
								<input type="text" placeholder="Email" id="email" name="email" required="" pattern="\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b">
							</div>
							<div class="span10">
								<label for="phone"><p></p></label>								
								<input maxlength="13" type="text" placeholder="Phone #" id="phone" name="phone" required="" pattern="(|\(|\s|){0,}\d{3}(\-|\)|\s|\.|){1,}\d{3}(\-|\s|\.|){1,}\d{4}">
							</div>
							<div class="span10">
								<label for="message"><p></p></label>								

								<form class="bs-docs-example form-inline">
						          <textarea rows="4" placeholder="Message"></textarea>
						        </form>
							</div>							
							<div class="row-fluid">
								<label for="submit-btn"><p></p></label>
						
								<a class="btn btn-large span6 submit-form-btn" href="" data-original-title="" title="">Submit Form</a>								
							</div>
                            <br>

						</div>		
					</div>
				
		
			<div class="clear"></div>
		</div>
		<!--end flight_info_container-->

	</div>
	<div class="clear"></div>
</div>





<?php  load_view('common/footer'); ?>



<div class="clear"></div>


<?php  load_view('common/js'); ?>

<script type="text/javascript">
window.lpTag={site:'60539493',_v:'1.1',protocol:location.protocol,events:{bind:function(app,ev,fn){lpTag.defer(function(){lpTag.events.bind(app,ev,fn);});},trigger:function(app,ev,json){lpTag.defer(function(){lpTag.events.trigger(app,ev,json);});}},defer:function(fn){this._defL=this._defL||[];this._defL.push(fn);},load:function(src,chr,id){var t=this;setTimeout(function(){t._load(src,chr,id);},0);},_load:function(src,chr,id){var url=src;if(!src){url=this.protocol+'//'+((this.ovr&&this.ovr.domain)?this.ovr.domain:'lptag.liveperson.net')+'/tag/tag.js?site='+this.site;}var s=document.createElement('script');s.setAttribute('charset',chr?chr:'UTF-8');if(id){s.setAttribute('id',id);}s.setAttribute('src',url);document.getElementsByTagName('head').item(0).appendChild(s);},init:function(){this._timing=this._timing||{};this._timing.start=(new Date()).getTime();var that=this;if(window.attachEvent){window.attachEvent('onload',function(){that._domReady('domReady');});}else{window.addEventListener('DOMContentLoaded',function(){that._domReady('contReady');},false);window.addEventListener('load',function(){that._domReady('domReady');},false);}if(typeof(window._lptStop)=='undefined'){this.load();}},_domReady:function(n){if(!this.isDom){this.isDom=true;this.events.trigger('LPT','DOM_READY',{t:n});}this._timing[n]=(new Date()).getTime();}};lpTag.init();
</script>


</body>
</html>