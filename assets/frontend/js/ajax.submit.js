/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * supmitting the form in ajax request.
 */
var versionId= Math.floor(Math.random() * 100000000000);
var jconfirmedId = 'jconfirmed_'+versionId,jdelete_popupId='jdelete_popup_'+versionId,
joverlayId= 'joverlay_'+versionId,jmessage_deleteId='jmessage_delete_'+versionId,
jcancelId='jcancel_'+versionId,jloading_overlayId='jloading_overlay_'+versionId;
var radiosValue = function(radios){
    for(i=0; i< radios.length;i ++){
        if(radios[i].checked){
            return radios[i].value;
        }
    }
    return null;
}
var fitchArrayValues = function(paramName,array){
    var data = ""
    for(var a=0 ;a < array.length; a++){
        data+=paramName +"="+encodeURIComponent(array[a])+"&";
    }
    return data;
}
var submitMe=function(form,message,complete,loadingmessage){
    jloading(loadingmessage);
    try{
        var data="";
        $(form).find("input,textarea,select").each(function(){
            if(this.name != null && this.name != ""){
                if(this.type == 'radio'){
                    if(data.indexOf(this.name, 0) == -1){
                        var radiovalue=radiosValue($("input[name='"+this.name+"']"));
                        data+=this.name+"="+encodeURIComponent($.trim(radiovalue))+"&"
                    }
                }else if(this.type == 'checkbox'){
                    if(this.checked){
                        data+=this.name+"="+encodeURIComponent($.trim($(this).val()))+"&";
                    }
                }else if($(this).val() instanceof Array){
                    data+=fitchArrayValues(this.name,$.trim($(this).val()));
                }else{
                    if($(this).val() != null || $(this).val() != undefined)
                        data+=this.name+"="+encodeURIComponent($.trim($(this).val()))+"&";
                }
            }
        });
        data = data.substr(0, data.length -1);
        $.ajax({
            url:$(form).attr('action'),
            type:"POST",
            data:data,
            cache:false,
            complete:function(jqXHR, textStatus){
                if(complete){
                    complete(jqXHR, textStatus);
                    return;
                }
                if(jqXHR && jqXHR.status == 200){
                    if(jqXHR.responseText.length > 200){
                        if(message)
                            jalert(message);
                        else
                            jalert("Something went wrong , check your application and try again. ");
                        return;
                    }
                    window.location.href=jqXHR.responseText;
                }else{
                    if(message)
                        jalert(message);
                    else
                        jalert("Something went wrong , check your application and try again. ");
                }
            }
        });
    }catch(e){
        if(message)
            jalert(message);
        else
            jalert("Something went wrong , check your application and try again. ");
    }
    return false;
}
var jalert = function(message,loader,OkLabel){
    if($('#'+joverlayId).length == 0){
        buildHTML();
    }
    $("html, body").animate({
        scrollTop: 0
    }, "fast");
    $('#'+jdelete_popupId).css({
        left: '50%', 
        marginLeft: ($('#'+jdelete_popupId).outerWidth() / 2) * -1
    });
    $('#'+jdelete_popupId).css({
        top: '50%', 
        marginBottom: ($('#'+jdelete_popupId).outerHeight() / 2) * -1
    });
    $("#"+jconfirmedId).html(OkLabel);
    $("#"+jcancelId).hide();
    $('#'+jloading_overlayId).hide();
    $('#'+jmessage_deleteId).html(message);
    $('#'+joverlayId).css('filter', 'alpha(opacity=90); BACKGROUND-COLOR: white');
    $('#'+joverlayId).fadeIn('fast',function(){
        $('#'+jdelete_popupId).show();
    });
    $('#'+jconfirmedId).click(function(){
        $('#'+joverlayId).hide();
        $('#'+jdelete_popupId).hide(function(){
            $('#'+joverlayId).hide();
            if(loader)
                loader();
        });
    });
}
var jloading = function(message){
    if($('#'+joverlayId).length == 0){
        buildHTML();
    }
    $("#"+jdelete_popupId).hide();
    if ($(window).height() < $(document).height()) {
        $('#'+joverlayId).css({
            height: $(document).height() + 'px'
        });
    } else {
        $('#'+joverlayId).css({
            height: '100%'
        });
    }
    if(message)
        $('#'+jloading_overlayId).html(message);
    $('#'+jloading_overlayId).show();
    $('#'+joverlayId).css('filter', 'alpha(opacity=90); BACKGROUND-COLOR: white');
    $('#'+joverlayId).fadeIn('fast',function(){});
}

var buildHTML = function(loadingMessage,cancelLabel,OkLabel,addCancel){
    $("div#"+joverlayId).remove().next("div#"+jdelete_popupId).remove();
    var joverlay =document.createElement("div");
    joverlay.setAttribute("id",joverlayId);
    joverlay.setAttribute("style", "background-color: black;left: 0;position: fixed;top: 0;z-index: 1100;width:100%;height:100%;filter:alpha(opacity=70);opacity:0.7;display:none;");
    var jloading = document.createElement("span");
    jloading.setAttribute("id", jloading_overlayId);
    jloading.setAttribute("style", "background: #C53727;margin: 0 auto;color: white;padding: 10px 25px;text-align: center;display: none;position: absolute;left: 48%;margin-left: -50px;");
    if(loadingMessage){
        jloading.innerHTML = loadingMessage;
    }else{
        jloading.innerHTML = 'Saving';
    }
    joverlay.appendChild(jloading);
    document.body.appendChild(joverlay);
    
    var popup = document.createElement("div");
    popup.setAttribute("id", jdelete_popupId);
    popup.setAttribute("style", "line-height:20px;width: 400px; border: 10px solid #222; -webkit-border-radius: 15px;-moz-border-radius: 15px;border-radius: 15px;"
                       +"padding: 10px 0; background: url(assets/frontend/images/rope.png) white repeat-x 0 -1px;color: #323232;position: absolute;z-index: 1200;");
    var message_delete = document.createElement("div");
    message_delete.setAttribute("id", jmessage_deleteId);
    message_delete.setAttribute("style","text-align: center;");
    popup.appendChild(message_delete);
    var div = document.createElement("div");
    if(addCancel){
        var aCancel = document.createElement("a");
        aCancel.setAttribute("id", jcancelId);
        if(cancelLabel){
            aCancel.innerHTML = cancelLabel;
        }else{
            aCancel.innerHTML = "Cancel";
        }
        div.appendChild(aCancel);
    }
    var aconfirmed = document.createElement("a");
    aconfirmed.setAttribute("style", "float:right !important;margin-left: 5px;border: 1px solid #E30606;"+"color: white;"+
        "text-align: center;"+"padding: 0 8px;"+"font-weight:bold;"+"background-color: #4d90fe;"+"background-image: -webkit-gradient(linear, left top, left bottom, from(#4d90fe), to(#4787ed));"+
        "background-image: -webkit-linear-gradient(top, #E30606, #E30606);"+"background-image: -moz-linear-gradient(top, #E30606, #E30606);"+
        "background-image: -ms-linear-gradient(top, #E30606, #E30606);"+"background-image: -o-linear-gradient(top, #E30606, #E30606);"+
        "background-image: linear-gradient(top, #E30606, #E30606);"+"-webkit-border-radius: 2px;"+"-moz-border-radius: 2px;"+"border-radius: 2px;"+
        "-webkit-user-select: none;"+"-moz-user-select: none;"+"user-select: none;"+"cursor: default;"+"display: inline-block;"+"text-align: center;"+
        "color: #fff;"+"font-size: 11px;"+"font-weight: bold;"+"height: 27px;"+"padding: 0 8px;"+"line-height: 27px;"+"line-height: 29px;"+
        "vertical-align: bottom;"+"height: 32px;"+"font-size: 13px;"+"color:#fff;"+"font-family: 'open sans';"+"margin: 0 0 0 2px;"+
        "height: 30px;"+"line-height: 30px;"+"color:#fff;cursor:pointer;margin-right: 20px;");
    $(aconfirmed).hover(function(){
        $(this).css("background-color","#e30606");
        $(this).css("background-color","-webkit-linear-gradient(top, #4d90fe, #e30606)");
        $(this).css("background-color","-moz-linear-gradient(top, #4d90fe, #e30606)");
        $(this).css("background-color","-ms-linear-gradient(top, #4d90fe, #e30606)");
        $(this).css("background-color","-o-linear-gradient(top, #4d90fe, #e30606)");
        $(this).css("background-color","linear-gradient(top, #4d90fe, #e30606)");
        $(this).css("border"," 1px solid #e30606");
    });
    $(aconfirmed).focus(function(){
        $(this).css("-webkit-box-shadow"," inset 0 0 0 1px #fff;");
        $(this).css("-moz-box-shadow","inset 0 0 0 1px #fff");
        $(this).css("box-shadow","inset 0 0 0 1px #fff");
        $(this).css("border","1px solid white");
        $(this).css("border","1px solid transparent");
        $(this).css("outline","1px solid #4D90FE");
        $(this).css("outline","0 transparent");
    });
    aconfirmed.setAttribute("id", jconfirmedId);
    if(OkLabel){
        aconfirmed.innerHTML = OkLabel;
    }else{
        aconfirmed.innerHTML = "Ok";
    }
    div.appendChild(aconfirmed);
    popup.appendChild(div);
    document.body.appendChild(popup);
}
var jconfirm = function(message,success,failer){
    $('#'+jmessage_deleteId).html(message);
    $("html, body").animate({
        scrollTop: 0
    }, "fast");
    $('#'+jdelete_popupId).css({
        left: '48%', 
        marginLeft: ($('#'+jdelete_popupId).outerWidth() / 2) * -1
    });
    $('#'+jdelete_popupId).css({
        top: '42%', 
        marginBottom: ($('#'+jdelete_popupId).outerHeight() / 2) * -1
    });
    $('#'+joverlayId).css('filter', 'alpha(opacity=90); BACKGROUND-COLOR: white');
    $('#'+joverlayId).fadeIn('fast',function(){
        $('#'+jdelete_popupId).show();
    });
    $("#"+jcancelId).show();
    $('#'+jloading_overlayId).hide();
    $('#'+jcancelId).show().click(function(){
        $('#'+jdelete_popupId).hide(function(){
            $('#'+joverlayId).hide();
            $("#"+jcancelId).hide();
            if(failer)
                failer();
        });
    });
    $('#'+jconfirmedId).click(function(){
        $('#'+jdelete_popupId).hide(function(){
            $('#'+joverlayId).hide();
            $("#"+jcancelId).hide();
            if(success)
                success();
        });
    });
}
var jHide= function(){
    $('#'+jdelete_popupId).hide(function(){
        $('#'+joverlayId).hide();
        $("#"+jcancelId).hide();
    });
}
var validator;
var executeAfterJqueryLoad = function(){
    $(function(){
        $('form.ajax-submit').each(function(){
            $(this).submit(function(){
                if($(this).valid()){
                    submitMe(this);
                }
                return false;
            });
        });
        $('form.validate').each(function(){
            validator = $(this).validate();
        })
    });
}
if(typeof jQuery == 'undefined'){
    var scripts = document.getElementsByTagName('script')[0];
    var jquery = document.createElement("script");
    jquery.setAttribute("type", "text/javscript");
    jquery.setAttribute("src", "/assets/backend/lib/jquery-1.7.1.min.js");
    jquery.async = true;
    scripts.parentNode.insertBefore(jquery, scripts);
    var validates = document.createElement("script");
    validates.setAttribute("type", "text/javscript");
    validates.async = true;
    validates.setAttribute("src", "/assets/backend/lib/jquery.validate.1.9/jquery.validate.js");
    scripts.parentNode.insertBefore(validates, scripts);
    window.setTimeout(function(){
        executeAfterJqueryLoad();
    },1000)
}else{
    executeAfterJqueryLoad();
}