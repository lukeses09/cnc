$(document).ready(function(){
      var loc = window.location.toString();
      var currentLoc = loc.substr(loc.lastIndexOf("/"));
      $("#accordion ul").find("a").each(function(){
        var urlLoc = $(this).attr("href");
        if(currentLoc === "/"+urlLoc){
          $(this).parent().parent().parent().addClass("in")
        	$(this).parent().addClass("selected");
	}
      });
  });