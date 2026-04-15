function getOuterLeft(v,tab = 3) {
  let nbs = '';
  for (let i = 0;i<tab;i++){
    nbs+='&nbsp';
  }
  let str = '';
  str += `<li class="chatmsg" id="xiaox_${v.cid}">`;

    
  if(v.type == 2){

    str += '<img  class="my-circle  se_pic" src="/assets/images/index/ai_service.png" width="40px" height="40px" />';

  }else{

    str += `<img  class="my-circle  se_pic" src=${v.avatar} width="40px" height="40px" />`;
    
  }
  if(v.nick_name=='系统'){

      str += `<div class='outer-left' ><span style="color: #aca7a7; margin-bottom: 2px;">${v.nick_name}${nbs};${v.time}</span><div class='service2'">`;
  }else{
      str += `<div class='outer-left' ><span style="color: #aca7a7; margin-bottom: 2px;">${v.nick_name}${nbs};${v.time}</span><div class='service'>`;
  }


  str += "<pre>" + v.content + "</pre>";

  str += "</div></div>";
  if (v.tip!=undefined && v.tip){
    msg += "<div style='clear: both'></div><div class='showtime' style='margin-top: 10px'>" + v.tip + "</div></li>";

  }

  str += "</li>";


  return str;
}
function getOuterRight(v,tab = 3) {
  let nbs = '';
  for (let i = 0;i<tab;i++){
    nbs+='&nbsp';
  }
  let name = '';
  if(v.is_read==1){
    name="已读";
  }else if(v.is_read==0){
    name="未读";
  }
 let str = `<li class="chatmsg" id="xiaox_${v.cid}" style="flex-direction: row-reverse;">`;
  if(v.pic!=undefined && v.pic==='我'){
    // str += `<h2   class="my-circle cu_pic" style="position: unset;float:right;width: 30px;height: 40px;font-size: 14px">${v.pic}</h2>`;
    str += `<div class="" style="position: absolute;right: 0px;"><img class="my-circle" src="${pic}" width="35px" height="35px"></div>`;
  }
  else if (v.pic!=undefined && v.pic!==''){
    str += `<div class="" style="position: absolute;right: 0px;"><img class="my-circle cu_pic" src="${v.pic}" width="35px" height="35px"></div>`;
  }
//   else {
//     str += `<div class="" style="position: absolute;right: 0px;"><img class="my-circle cu_pic" src="${pic}" width="35px" height="35px"></div>`;
//   }
  

// =============================
//   str += '<div class="" style="position: absolute;right: 0px;"><img class="my-circle" src="' + v.avatar + '" width="35px" height="35px"></div>';

//   str += '<div class="" style="position: absolute;right: 0px;"><img class="my-circle" src="' + pic + '" width="35px" height="35px"></div>';

  str += `<div class='outer-right'><pre id='cid${v.cid}' class='noredcustomer'>${name}</pre><div class='msg_body'><span style="color: #aca7a7;">${v.time}</span><div class='customer'>`;

  str += `<pre>${v.content}</pre>`;

  str += "</div></div>";



  str += "";

  str += "</div></div>";

  str += "</li>";


  return str;
}
function formattingTime (d){
  let time = '';



  time += d.getHours() + ':';

  time += d.getMinutes() + ':';

  time += d.getSeconds();
  return time;
}
function commentStr(data){
      var html = '<div style="margin-bottom: 20px;">'+data.title+'</div>';
                $.each(data.comments,function(index,value){
                    html += ` <div class=\'evaluate-item evaluate-score\' data-score="0">
                                        <span class="evaluate-title">${value}</span>
                                        <input type="hidden" name="${value}"/>
                                        <img class="star" data-id="1" src="${imageSrc}/index/star.png" alt="">
                                  <img class="star" data-id="2" src="${imageSrc}/index/star.png" alt="">
                                        <img class="star" data-id="3" src="${imageSrc}/index/star.png" alt="">
                                        <img class="star" data-id="4" src="${imageSrc}/index/star.png" alt="">
                                        <img class="star" data-id="5" src="${imageSrc}/index/star.png" alt="">
                                    </div>`;
                });

                if (data.word_switch == 'open') {
                    html += '<div class=\'evaluate-item\' style="height: 80px;line-height: 1;margin-top: 10px;align-items: flex-start">\n' +
                        '                <span style="display: inline-block;margin-right: 12px;white-space: nowrap">'+ data.word_title +'</span>\n' +
                        '                <textarea class="about-text" name="" id="" cols="30" rows="4"></textarea>\n' +
                        '            </div>';
                }

                html += ` <div class="evaluate-btn">
                              <button class="reset">${langCancel}</button>
                                    <button class="submit">${langSubmit}</button>
                                </div>`;
                    return html;
}

function getNickName(v) {

    if(v.visiter_name.indexOf("游客") === 0){
        v.visiter_name = "";
    }

    v.visiter_name = (v.visiter_name ? v.visiter_name + '-' : "") + (v.location ? v.location : "地区未知") + '-' + v.ip;
    return v.name !== "" ? v.name : v.visiter_name;
}