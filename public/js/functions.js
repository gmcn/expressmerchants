( function($) {

  /**
   * Match Height (Including Safari onload fix)
   */
   $(function() {
   	$('.matchheight').matchHeight(options);
    $('.store').matchHeight(options);
   });
  window.onload = startMatchHeight;



});

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

$(document).ready(function() {
  $("input[id='alternate']").click(function() {

      $(".selectMerchant").hide();
      $(".inputMerchant").show();

      document.getElementById("selectMerchant").disabled = true;
      document.getElementById("inputMerchant").disabled = false;

  });
  $("input[id='pre-approved']").click(function() {

      $(".selectMerchant").show();
      $(".inputMerchant").hide();

      document.getElementById("inputMerchant").disabled = true;
      document.getElementById("selectMerchant").disabled = false;
  });

  $("input[id='van-stock']").click(function() {

      $(".poProject").hide();

      document.getElementById("poProject").required = false;

  });

  $("input[id='ppe']").click(function() {

      $(".poProject").hide();

      document.getElementById("poProject").required = false;

  });

  $("input[id='project']").click(function() {

      $(".poProject").show();

      document.getElementById("poProject").required = true;

  });

});
