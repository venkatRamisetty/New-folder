$("#nxtbtn").click(function(){
    
    if($('#category').val()==null||$('#category').val()=='undefined'){
        alert("Please select category");
        return false;
    }
    if($('#template_name').val()==''||$('#template_name').val()==null||$('#template_name').val()=='undefined'){
        alert("Please enter Template name");
        return false;
    }
    if($('#multiple').val()==''||$('#multiple').val()==null||$('#multiple').val()=='undefined'){
        alert("Please select language");
        return false;
    }
    var languages="";
    var languages_id="";
    $('#multiple :selected').each(function(i, sel){ 
        console.log( $(sel).text() ); 
        languages=languages+$(sel).text()+"-";
        languages_id=languages_id+$(sel).val()+"-";
    
    });
    languages=languages.substring(0,languages.length - 1);
    languages_id=languages_id.substring(0,languages_id.length - 1);
    
    $.ajax({
        url:"ajax/templates.php",
        type:"POST",
        data:'cmd=create_templates&languages='+languages+'&languages_id='+languages_id,
        beforeSend: function() {
            loading();
        },
        success: function(data) {
            stop_loading();
            $("#language_templates").html(data);
            
        }
    });
    
   // return false;
    document.getElementById('secondwizard').style.display = 'block';
    document.getElementById('firstwizard').style.display = 'none';
});
function submit_template(){
    var formdata = new FormData();
    formdata.append("category",$("#category").val());
    formdata.append("name",$("#template_name").val());
    var languages="";
    var languages_id="";
    $('#multiple :selected').each(function(i, sel){ 
        console.log( $(sel).text() ); 
        languages=languages+$(sel).text()+"-";
        languages_id=languages_id+$(sel).val()+"-";
    
    });
    languages=languages.substring(0,languages.length - 1);
    languages_id=languages_id.substring(0,languages_id.length - 1);
    formdata.append("languages",languages);
    formdata.append("languages_id",languages_id);
    var check=true;
    $('#multiple :selected').each(function(i, sel){ 
        var langtext=$(sel).text() ;
        var langid= $(sel).val() ; 
        var headersel=$("#headerselector"+langid).val();
        var bodysel=$("#editor"+langid).text();
        var footertxt=$("#footer"+langid).val();
        var footerbtn=$("#buttonselector"+langid).val();
        console.log(langtext+"footerbtn:"+footerbtn);
        console.log(langtext+"footer:"+footertxt);
        console.log(langtext+"body:"+bodysel);
        console.log(langtext+"headersel:"+headersel);
        if(bodysel===''||bodysel===null||bodysel=='\n'){
            alert("Please enter Body for the template of "+langtext+" language");
            check=false;
            return false;
        }else{
            formdata.append("bodytxt-"+langid,bodysel);
        }
        if(headersel=='undefined'||headersel==null||headersel==''){
            alert("Please select header for "+langtext+" language");
            check=false;
            return false;

        }
        formdata.append("header-"+langid,headersel);
        if(headersel=='text'){
          var headertxt=$("#headertxt"+langid).val();
          if(headertxt==''||headertxt=='undefined'){
              alert("Please enter header text for "+langtext+" language");
              check=false;
              return false;
          }else{
            formdata.append("headertxt-"+langid,headertxt);
          }
          
        }
        if(headersel=="media"){
            //alert($('.media'+langid)[1].files[0]);

            var media=$('.media'+langid).val();
            if(media==0){
                alert("Please select media type");
            }else{
                formdata.append("media-"+langid,media);
            }
            // $('.media'+langid).each(function(index){
            //     if($('.media'+langid)[index].files.length !== 0  ){
            //        // alert("file present at"+index);
            //        mediacheck=true;
            //         formdata.append("media-"+langid,$('.media'+langid)[index].files[0]);
            //     }   
                
            // });
            // if(mediacheck==false){
            //     alert("Please upload media file for "+langtext+" language");
            //     check=false;
            //     return false;
            // }
           
        }
        
        if(footertxt==''||footertxt==null){
            alert("Please enter footer for the template of "+langtext+" language");
            check=false;
            return false;
        }else{
            formdata.append("footertxt-"+langid,footertxt);
        }
        if(footerbtn==''||footerbtn==null){
            alert("Please select Button Type of "+langtext+" language");
            check=false;
            return false;
        }else{
            formdata.append("footerbtn-"+langid,footerbtn);
            if(footerbtn=='calltoaction'){
                var clt="";
                $('.clt'+langid).each(function(index){
                    clt=clt+$(this).val()+"&&&";
                    
                });
                formdata.append("clt-"+langid,clt);
                var clttext="";
                $('.clttext'+langid).each(function(index){
                    if($(this).val()==''||$(this).val()==null||$(this).val()=='undefined'){
                        alert("Please enter Call to action Button text of "+langtext+" language");
                        check=false;
                        return false;
                    }else{
                        clttext=clttext+$(this).val()+"&&&";
                        
                    }
                });
                formdata.append("clttext-"+langid,clttext);
                var cltsel="";
                $('.cltsel'+langid).each(function(index){
                    cltsel=cltsel+$(this).val()+"&&&";
                    
                });
                formdata.append("cltsel-"+langid,cltsel);
                var clturl="";
                $('.clturl'+langid).each(function(index){
                    if($(this).val()==''||$(this).val()==null||$(this).val()=='undefined'){
                        alert("Please enter url for  Call to action  of "+langtext+" language");
                        check=false;
                        return false;
                    }else{
                        clturl=clturl+$(this).val()+"&&&";
                        
                    }
                });
                formdata.append("clturl-"+langid,clturl);
            }else{
                var quicktext="";
                $('.quicktext'+langid).each(function(index){
                    if($(this).val()==''||$(this).val()==null||$(this).val()=='undefined'){
                        alert("Please enter text for quick reply "+langtext+" language");
                        check=false;
                        return false;
                    }else{
                        quicktext=quicktext+$(this).val()+"&&&";
                    }
                });
                formdata.append("quicktext-"+langid,quicktext);
            }
        }
       

    
    });
    if(check){
        formdata.append("cmd","create_template");
        loading();
        $.ajax({
            url:"api.php",
            type:"POST",
            data : formdata,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success : function(data) {
                stop_loading();
                alert(data);
                if(data=='Successfully updated'){
                    location.href='template_list.php';
                }
                
            }
        });
    }
    
}
function language_change(){
    var sel_lang=$('input[name="language_radio_button"]:checked').val();
    $('.sel_lag').hide();
    $('#'+sel_lang).show();

}

$("#prevbtn").click(function(){
    document.getElementById('firstwizard').style.display = 'block';
    document.getElementById('secondwizard').style.display = 'none';
});
function loading(){

}
function stop_loading(){

}
function header_change(i){
    var did=$(i).attr('data-id');
    var hval=$(i).val();
    $(".header-"+did).hide();
    $("#"+hval+did).show();

}
function button_selector(i){
    var did=$(i).attr('data-id');
    var bval=$(i).val();
    $('.buttonform'+did).hide();
    $('#' + bval+did).show();
}

     $(function () {
//  $('[data-toggle="tooltip"]').tooltip()
});
$(document).ready(function(){	
var colorPalette = ['000000', 'FF9966', '6699FF', '99FF66', 'CC0000', '00CC00', '0000CC', '333333', '0066FF', 'FFFFFF'],
forePalette = $('.fore-palette'),
backPalette = $('.back-palette'),
editor = $('.editor');

  for (var i = 0; i < colorPalette.length; i++) {
    forePalette.append('<a href="#" data-command="foreColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
    backPalette.append('<a href="#" data-command="backColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
  }
  $('.toolbar a').click(function(e) {
		e.preventDefault();
    var command = $(this).data('command');
    if (command == 'h1' || command == 'h2' || command == 'p') {
      document.execCommand('formatBlock', false, command);
    }
    if (command == 'foreColor' || command == 'backColor') {
			var color = $(this).data('value');
      document.execCommand($(this).data('command'), false, color);
			alert(color);
    }
		if (command == 'removeFormat') {
      document.execCommand('removeFormat', false, command);
    }
    if (command == 'createlink' || command == 'insertimage') {
      url = prompt('Enter the link here: ', 'http:\/\/');
			console.log(command + " " + url);
			document.execCommand($(this).data('command'), false);
      // document.execCommand($(this).data('command') && 'enableObjectResizing', false, url);
    } else document.execCommand($(this).data('command'), false);
  });
	$('.editorAria img').click(function(){
      document.execCommand('enableObjectResizing', false);
	});
	$("#getHTML").click(function(){
		var editorId = $(this).attr('get-data');
		var html = $("#" + editorId).find('.editorAria').html();
		alert(html);
	});
});
$(document).ready(function(){
    $("#messaging").addClass("side-menu--active");
});
function add_calltoaction(i){
    var did=$(i).attr('data-id');
    if($(i).attr('data-cnt')==1){
        alert("you cannot add more than two");
        return false;
    }
    var div = $("<tr />");
    div.html(calltoaction("",did));
    $("#calltoactionContainer"+did).append(div);
    $(i).attr('data-cnt',1);
}
function remove_dynamic(i){
    var did=$(i).attr('data-id');
    var dtype=$(i).attr('data-type');
    console.log("did"+did);
    console.log("dtype"+dtype);
    $('#'+dtype+did).attr('data-cnt',0);
    $(i).closest("tr").remove();
}
$(function () {
$("#calltoactionbtn").bind("click", function () {
    var div = $("<tr />");
    div.html(calltoaction(""));
    $("#calltoactionContainer").append(div);
});
$("body").on("click", ".remove", function () {
    $(this).closest("tr").remove();
});
});

function GetDynamicTextBox(value,id) {
    return '<td><input  type="text" maxlength="20" class="input w-full border mt-2 flex-1 txt'+id+' quicktext'+id+'" placeholder="Header"> '+ '<td><button type="button" class="button w-24 justify-center block bg-theme-1 text-white ml-2 remove dtxtbox-'+id+'" data-type="btnAdd" data-id="'+id+'" onclick="remove_dynamic(this);"><i class="glyphicon glyphicon-remove-sign"></i>Remove</button></td>'
}

function calltoaction(value,id) {
return '<td><select  class=clt'+id+'"  input border"><option value="CallPhone">Call Phone</option><option value="VisitWebsite">VisitWebsite</option></select></td>'+'<td> <input type="text" class="input w-full border clttext'+id+'" placeholder="Button Text"/> </td>' + '<td><select class="input  border cltsel'+id+'" ><option value="Static"> Static</option><option value="Dynamic">Dynamic</option></select></td>' + '<td><input type="text" class="input w-full border cltsel'+id+'" placeholder="Website URL"> </td>' + '<td><button type="button" class="button  justify-center block bg-theme-1 text-white remove dctbtn-'+id+'" data-type="calltoactionbtn" data-id="'+id+'" onclick="remove_dynamic(this);">X</button></td>'
}
function addanotherbox(i){
    var did=$(i).attr('data-id');
    if($(i).attr('data-cnt')==1){
        alert("you cannot add more than two");
        return false;
    }
    var div = $("<tr />");
        div.html(GetDynamicTextBox("",did));
        $("#TextBoxContainer"+did).append(div);
        $(i).attr('data-cnt',1);
}                                            
$(function () {
    $("#btnAdd").bind("click", function () {
        var div = $("<tr />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer").append(div);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
    });
});

$(function () {
$('[data-toggle="tooltip"]').tooltip()
});
$(document).ready(function(){	
var colorPalette = ['000000', 'FF9966', '6699FF', '99FF66', 'CC0000', '00CC00', '0000CC', '333333', '0066FF', 'FFFFFF'],
forePalette = $('.fore-palette'),
backPalette = $('.back-palette'),
editor = $('.editor');

for (var i = 0; i < colorPalette.length; i++) {
forePalette.append('<a href="#" data-command="foreColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
backPalette.append('<a href="#" data-command="backColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
}
$('.toolbar a').click(function(e) {
   e.preventDefault();
var command = $(this).data('command');
if (command == 'h1' || command == 'h2' || command == 'p') {
 document.execCommand('formatBlock', false, command);
}
if (command == 'foreColor' || command == 'backColor') {
       var color = $(this).data('value');
 document.execCommand($(this).data('command'), false, color);
       alert(color);
}
   if (command == 'removeFormat') {
 document.execCommand('removeFormat', false, command);
}
if (command == 'createlink' || command == 'insertimage') {
 url = prompt('Enter the link here: ', 'http:\/\/');
       console.log(command + " " + url);
       document.execCommand($(this).data('command'), false);
 // document.execCommand($(this).data('command') && 'enableObjectResizing', false, url);
} else document.execCommand($(this).data('command'), false);
});
$('.editorAria img').click(function(){
 document.execCommand('enableObjectResizing', false);
});
$("#getHTML").click(function(){
   var editorId = $(this).attr('get-data');
   var html = $("#" + editorId).find('.editorAria').html();
   alert(html);
});
});
                                        