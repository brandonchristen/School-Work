var root = "http://localhost:3000";
var curID;
var globalData;
var matches = false;
var $ = jQuery.noConflict();

function GetBlogs() {
$("#spinner").hide();
$.ajax({
  url: root + '/posts/',
  method: 'GET'
,
success:function(data) {
    $("#spinner").hide();
  console.log(data);
  globalData = data;
  $("#BlogPostsTable").html("");
    for(i=0; i < data.length; i++){
        console.log(data[i]);
        //console.log(data[i]['title']);
        //console.log(data[i]['body']);
    $("#BlogPostsTable").append("<tr>" + "<td>" +data[i]['title'] + "</td>" + "<td>" + 
        data[i]['body'] + "</td>" + "<td>" +data[i]['date'] + "</td>" +
        "<td>" + 
        "<button id=editButton" + i + " onclick=edit("+i+")" + ">" + 
		"<i class='fa fa-pencil' aria-hidden='true'></i>" +
		"</button>" + 
        "<button id=deleteButton" + i + " onclick=DeleteDialog("+i+")" + ">" + 
        "<i class='fa fa-trash-o' aria-hidden='true'></i></button>" + 
         "</td>");//end append

    }
     runEffect();

},
 error: function (request, status, error) {
        alert(request.responseText);
    }
});
}

function edit(i) {
    $("#BlogTitle").html(globalData[i].title);
    $("#BlogBody").html(globalData[i].body);
    curID= i+1;

}

function savebuttonClicked(){
    debugger;
    if($("#BlogTitle").val() ==""|| $("#BlogTitle").val() ==null){
        alert("Title can not be null");
    }
    else{
   for(j=0; j < globalData.length; j++){
    if($("#BlogTitle").val() === globalData[j].title){
        //code for PATCH/UPDATE goes here
        matches = true;
        var d = new Date();
        var realmonth = d.getMonth() + 1;
        var datestring = d.getFullYear() + "-" + realmonth + "-" + d.getDate() + "  " + d.getHours() + ":" +  d.getMinutes();
       $("#spinner").show();
        $.ajax({
        url: root + '/posts/' + curID,
        type: 'PATCH',
        data: { 
            title: $("#BlogTitle").val(),
            body: $("#BlogBody").val(),
            date: datestring
        },
        dataType: 'json',
    error: function (request, status, error) {
        alert(request.responseText);
    },
    success:function(){
        $("#spinner").hide();
        location.reload(true);
    }

    });

    }//end if title matches

   }

   if(matches == false){
    //code for creating note goes here.
        var d = new Date();
        var realmonth = d.getMonth() + 1;
        var datestring = d.getFullYear() + "-" + realmonth + "-" + d.getDate() + "  " + d.getHours() + ":" +  d.getMinutes();
        $("#spinner").show();
        $.ajax({
        url: root + '/posts/',
        type: 'POST',
        data: { 
            title: $("#BlogTitle").val(),
            body: $("#BlogBody").val(),
            date: datestring
        },
        dataType: 'json',
    error: function (request, status, error) {
        alert(request.responseText);
    },
    success:function(){
        $("#spinner").hide();
        location.reload(true);
    }

    });

   }
}//end else

}


function runEffect() {
      // get effect type from
      var selectedEffect = "Fade";
 
      // Most effect types need no options passed by default
      var options = {};
      // Run the effect
    $( "#effect" ).fadeIn();

    }

function DeleteDialog(i) {
    curID = i+1;
    $("<div class='dialog' id='my-custom-dialog' title='DELETE'>" +
      "<button id='DelteButton" + i + "' onclick='Delete()'> DELETE" + "</button>" +
      "</div>").dialog();
     //$( "#dialog").css('visibility', 'visible');
     //$( "#dialog").dialog();

}

function Delete(){
    $("#spinner").show();
 $.ajax({
        url: root + '/posts/' + curID,
        type: 'DELETE',
    error: function (request, status, error) {
        alert(request.responseText);
    },
    success:function(){
        $("#spinner").hide();
        location.reload(true);
    }

    });
}

function callback() {
      setTimeout(function() {
        $( "#effect" ).removeAttr( "style" ).hide().fadeIn();
      }, 1000 );
    };

$(function(){GetBlogs()});
