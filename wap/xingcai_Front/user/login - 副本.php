<html xmlns="http://www.w3.org/1999/xhtml" style="font-size: 16.56px;"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,user-scalable=no,maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
    <title>���������-�ٷ���վ</title>
    <link rel="stylesheet" href="/css/nsc_m/normalize.css?v=1.17.1.12">
	<script type="text/javascript" src="/skin/js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="/skin/js/onload.js"></script>
<script type="text/javascript" src="/skin/main/reglogin.js"></script>
<script type="text/javascript" src="/skin/js/gamecommon.js"></script>
   <style media="screen">
        html,body{height:100%;font-family:microsoft yahei;background-color:#fff;background-image:url(/images/nsc_m/login/login_bg.png);background-repeat:no-repeat;background-size:100%;background-attachment:fixed;background-position:0 0;}
        ul,li{list-style-type:none;margin:0;padding:0;}
        .container{height:100%;}
        header img{display:block;height:4.74rem;padding:3.55rem 0 1.7rem;margin:0 auto;}
        #form-area form{width:20.55rem;margin:0 auto;}
        #form-area dl{width:100%;height:2.96rem;/*background:url(/images/nsc_m/login/input_line.png) 0 bottom repeat-x;*/border-bottom:0.15rem solid rgba(238,238,238,0.5);position:relative;}
        #form-area dt{position:absolute;}
        #form-area dd{display:block;margin:0 0 0 4.18rem;padding:0;}
        #form-area input::-webkit-input-placeholder{color:#fff9ed;transition:color .15s;-webkit-transition:color .15s;-moz-transition:color .15s;}
        #form-area .has-error::-webkit-input-placeholder{color:#ffdb7d;}
        #form-area input{border:none;outline:none;width:100%;height:2.8rem;color:#f9f2e5;background:none; font-size:1.2rem;}
        #form-area .btn-submit{width:100%;border:none;outline:none;height:3.07rem;margin-top:3.7rem;font-size:1.78rem;letter-spacing:1rem;background-color:#7f6173;color:#fff;}
        #form-area label img{position:absolute;}
        #form-area label[for='uname'] img{width:1.85rem;left:0.9rem;top:0.5rem;}
        #form-area label[for='upass'] img{width:1.35rem;left:1.15rem;top:0.6rem;}
        #form-area label[for='code'] img{width:1.85rem;left:0.9rem;top:0.5rem;}
        #form-area .validate-code{position:relative;}
        #dvcode{position:absolute;right:0;bottom:0.61rem;z-index:99;}
        footer .tip-messages{text-align:center;font-size:0.7rem;color:#ae9287;margin:2.2rem 0 4rem;}
        footer .download-sticky{position:fixed;z-index: 101;left:0;bottom:0;width:100%;height:2.92rem;background:url(/images/nsc_m/login/down_bg.png) repeat;}
        footer .download-sticky ul{display:block;margin-top:0.5rem;overflow:hidden;}
        footer .download-sticky li{float:left;color:#fff;font-size:0.89rem;}
        footer .download-sticky li span{vertical-align:middle;}
        footer .download-sticky li img{vertical-align:middle;}
        footer .download-sticky a{text-decoration:none;color:#fff;}
        footer .download-sticky .close-btn img{width:0.8rem;margin:0.55rem 0 0 0.5rem;}
        footer .download-sticky .down-logo img{width:2rem;margin-left:1.7rem;margin-right:0.7rem;}
        footer .download-sticky .platform-icon{float:right;margin-right:0.8rem;}
        footer .download-sticky .platform-icon img{width:4.67rem;vertical-align:-0.6rem;}
    </style>
	<!--<script>alert('��ѯQQ��820206909');</script>-->
    <script type="text/javascript">
        ;(function(win){
            var doc = win.document;
            var docEl = doc.documentElement;
            var tid,rem,initialFontSize = 27,initialWidth = 675;
            refreshRem();
            win.addEventListener('resize', function() {
                clearTimeout(tid);
                tid = setTimeout(refreshRem, 300);
                fnCheckMobile();
            }, false);

            win.addEventListener('pageshow',function(e){
                if(e.persisted){
                    clearTimeout(tid);
                    tid = setTimeout(refreshRem, 300);
                    fnCheckMobile();
                }
            }, false);

            function refreshRem(){
                var width = docEl.getBoundingClientRect().width,
                    height = docEl.getBoundingClientRect().height;
                var orientation = width>height?"landscape":"portrait";
                if(orientation === "landscape"){
                    rem = height*initialFontSize/initialWidth;
                }else{
                    if(width > 540)width = 540;
                    rem = width*initialFontSize/initialWidth;
                }
                docEl.style.fontSize = rem + 'px';
            }
        })(window);

                window.onload = function(){
            var isLoginNow = true;
            var events = {
              
                "submit form":fnFormSubmit,//���ύ
                "blur #username":fnCheckUname,//�û�����֤
                "blur #password":fnCheckUpass,//������֤
                "blur #vcode":fnCheckCode,//��֤��
                "click #dvcode":refreshimg//ˢ����֤��
            }
            if(typeof Object.keys === "function"){
                Object.keys(events).forEach(function(ele,index){
                    var eventDetail = ele.split(" ");
                    var eventType = eventDetail[0],
                        eventListener = events[ele],
                        selector = document.querySelectorAll(eventDetail[1]);
                    [].forEach.call(selector,function(ele,index){
                        ele.addEventListener(eventType,eventListener,false);
                    });
                });
            }else{
                for(var key in events){
                    var eventDetail = key.split(" ");
                    var eventType = eventDetail[0],
                        eventListener = events[key],
                        selector = document.querySelectorAll(eventDetail[1]);
                    for(var i = 0;i<selector.length;i++){
                        selector[i].addEventListener(eventType,eventListener,false);
                    }
                }
            }
          
            function fnFormSubmit(e){//���ύ
                e.preventDefault();
                var passedArr = [],valArr = [];
                [].forEach.call(this.querySelectorAll("input"),function(ele,index){
                    var val = ele.value;
                    var tPassed = !(val === "" || ele.classList.contains("has-error"));
                    passedArr.push(tPassed);
                    valArr.push(val);
                });
                if(passedArr.indexOf(false) > -1){
                    layer.open({
                        content:"����ȷ��д��������Ϣ",
                        btn:"ȷ��"
                    });
                }else{
                   // LoginNow(valArr[0],valArr[1],valArr[2]);
                }
            }
            function fnCheckUname(){//��֤�û���
                var uname = this.value;
                if(uname === " " || !uname){
                    this.setAttribute("placeholder","�û�������Ϊ��");
                    this.className  = "has-error";
                }else{
                    this.className = "";
                }
            }
            function fnCheckUpass(){//��֤����
                var upass = this.value;
                if(upass === " " || !upass){
                    this.setAttribute("placeholder","���벻��Ϊ��");
                    this.className  = "has-error";
                }else{
                    this.className = "";
                }
            }
            function fnCheckCode(){//��֤��˶�
                var code = this.value;
                if(code === " " || !code){
                    this.setAttribute("placeholder","��֤�벻��Ϊ��");
                    this.className  = "has-error";
                }else{
                    this.className = "";
                }
            }
            function refreshimg(){
                var url = "/index.php/user/vcode/" + (new Date()).getTime();
                document.querySelector("#dvcode").src = url;
            }

        }
    </script>
<link href="/js/nsc_m/libs/need/layer.css?2.0" type="text/css" rel="styleSheet" id="layermcss"></head>
<body>
    <div class="container">
        <header><img src="/images/nsc_m/login/logo.png?v=1.17.1.12" alt="logo"></header>
        <section id="form-area">
            <form action="/index.php/user/logined" method="post" onajax="userBeforeLogin" enter="true" call="userLogin" target="ajax">
                <dl>
                    <dt><label for="uname"><img src="/images/nsc_m/login/icon_user.png?v=1.17.1.12" alt=""></label></dt>
                    <dd><input type="text" id="username" name="username" placeholder="�����˺�"></dd>
                </dl>
                <dl>
                    <dt><label for="upass"><img src="/images/nsc_m/login/icon_pass.png?v=1.17.1.12" alt=""></label></dt>
                    <dd><input type="password" id="password" name="password" placeholder="��������"></dd>
                </dl>
                <dl>
                    <dt><label for="code"><img src="/images/nsc_m/login/icon_code.png?v=1.17.1.12" alt=""></label></dt>
                    <dd class="validate-code">
                        <input type="text" id="vcode" name="vcode" maxlength="4" placeholder="������֤��" onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                        <img title="���ˢ��" style="cursor:pointer;" id="dvcode" name="dvcode" src="/index.php/user/vcode/<?=$this->time?>">
                    </dd>
                </dl>
                <button class="btn-submit" type="submit" data-form-sbm="1483930096400.321">��¼</button><br>

                <div align="center" style="color: #333">��û��ע�ᣬ<a href="http://www.thy08.com/index.php/user/r/5D5555" style="color:#7f6173">���ע��</a></div>
            </form>
        </section>
        <footer>
            <div class="tip-messages">
                δ��18�����ֹ����<br>
                Copyright ��������� ��Ȩ����
            </div>
      
        </footer>
    </div>
    <script type="text/javascript" src="/js/nsc_m/libs/layer.js?v=1.17.1.12"></script>
</body></html>