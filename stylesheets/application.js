$(document).ready(function(){

  // Open external links in new tab/window
  $("a[href*='http://']:not([href*='"+location.hostname+"'])").click(function(){
    this.target = "_blank";
  });

  // Return inputs to default value on blur.
  $('input[alt]').focus(function(){
    if ($(this).attr("value") === $(this).attr("defaultValue")) {
      $(this).attr("value", "");
    }
  }).blur(function(){
    if ($(this).attr("value") === "") {
     $(this).attr("value", $(this).attr("defaultValue"));
    }
  });

  //Homepage Cycle

  $('#home-page #banner').cycle({
      fx:     'fade',
      speed:  'fast',
      timeout: 10000,
      pager:  '#pager',
      next:   '#next',
      prev:   '#prev'
  });

  //Search Show/Hide

  $("#global-search input").hide();
  $("#global-search a").click(function(){
    $(this).hide();
    $("#global-search input").fadeIn();
    $("#global-search .search-terms").focus();
  });

  //Filters Show/Hide
  $("#filters").not('.stockist').hide();
  $("#filter-button").toggle(function(){
    $("#filters").slideDown();
    $(this).addClass('active');
    return false;
  }, function(){
    $("#filters").slideUp();
    $(this).removeClass('active');
    return false;
  });

  //Comments Show/Hide
  $("#comments-section").hide();
  $("#comments-button").toggle(function(){
    $("#comments-section").fadeIn();
    return false;
  }, function(){
    $("#comments-section").fadeOut();
    return false;
  });

  if($("#errorExplanation").length == 1) {
    $("#comments-section").show();
  }

  //Colorbox Popups

  $("#nutrition").colorbox({inline:true, href:"#nutrition-popup", width: "500"});
  $(".subscribe-link,.subscribe-button").click(function(){
    $.colorbox({href: "/subscribers/new", iframe:true, height:"640px", width: "400px"});
    return false;
  });

  $("#global-subscribe").submit(function(){
    var subscriber_email = $("#footer_subscriber_email").val();
    if (subscriber_email == "Email Address") { subscriber_email = ""; }
    $.colorbox({href: "/subscribers/new?subscriber[email]=" + subscriber_email,
                iframe:true, height:"700px", width: "400px"});

    return false;
  });

  $(".colorbox").colorbox({
    iframe: true,
    height: "720px",
    width: "960px"
  });

  //Related products/recipes Show/Hide
  var $related = $('#related');
  $related.find('ul:not(:first)').hide();
  $related.find('.tab-button').click(function(me, you){
    $related.find('.active').removeClass('active');
    $related.find('ul').hide().eq($(this).addClass('active').index()).show();
    return false;
  }).first().addClass('active');

  //Table Striping
  $("table tr:odd").addClass("even");


  //Navigation Dropdowns

  var $dropdown = $(".dropdown").hide();
  // Open
  $('#nav-products').hover(function(){
    $dropdown.stop().fadeTo('normal', 1);
  });
  // Close
  $('.sf-menu > li > a:not(#nav-products)').hover(function(){
    $dropdown.stop().fadeTo('normal', 0, function(){ $(this).hide(); });
  });
  $('.dropdown').bind('mouseleave', function(){
    $dropdown.stop().fadeTo('normal', 0, function(){ $(this).hide(); });
  });

  $("#nav-subscribe").toggle(
    function(){
      $(".subscribe.dropdown").fadeIn();
    },
    function(){
      $(".subscribe.dropdown").stop(true, true).fadeOut();
    }
  );

  $(function(){ $("input:checkbox, input:file, form select#state, form select#turn_in_order_state").uniform(); });


  // Stockists
  $('#secondary #q').focus(function(e){
    if(this.value == 'Search') this.value = '';
    else $(this).select();
  });
  $('#secondary #q').blur(function(e){
    if(this.value === '') this.value = 'Search';
  });


	//Subnav Hide/show
	$('#secondary-nav li ul').hide();

	$("#secondary-nav .active").each(function(){
    $(this).parents("li").last().find("ul").show();
	});

	$('.show_subcats').toggle(function(){
		$(this).addClass('open');
		$(this).next('ul').show(300);
		return false;
	},
	function(){
		$(this).removeClass('open');
		$(this).next('ul').hide(300);
	});

  // Subscribe
  $("#footer_subscriber_email").focus(function() {
    $(this).val("");
  });

  //Downloads select
  $(".download_desc").click(function(){
    $(this).next('.select_download').find('span input').click();
  });

  // Request a sample ABN lookup
  $('#sample_request_ABN').change(function(){
    $('.company').val('Loading...');
    $.get('/abn_lookup/'+encodeURI(this.value), function(response){
      $('.company').val(response);
    });
  });

  // image popup based on localstorage
  var popupID = $('.image-popup').attr("data-id");
  var popupImageWidth = $('.image-popup').width();
  var popupImageHeight = $('.image-popup').height();  

  console.log(popupImageWidth+' '+popupImageHeight);

  // close image popup if clicked on popup icon
  $('.image-popup--closer').click(function(){
    $.colorbox.close();
  });

  // wait 3 seconds before checking if image id already exists in localstorage
  setTimeout(function(){
      if (popupID && !localStorage.getItem(popupID)){
        // add custom style for jusrt this colorbox object so there's no conflict with other colorbox implementations
        $(document).bind('cbox_open', function(){ 
          $('#cboxContent').css("background", "transparent");
          $('#cboxClose').remove();
        });

        $.colorbox({inline:true, scalePhotos:true, closeButton: true, href:".image-popup--wrapper"});
        $(document).bind('cbox_closed', function(){  
          localStorage.setItem(popupID,'true');
        });
      }
    },3000
  );
});