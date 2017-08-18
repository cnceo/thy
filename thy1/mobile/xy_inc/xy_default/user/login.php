

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 让360双核浏览器用webkit内核渲染页面-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?=$this->iff($args[0], $args[0] . '－'). $this->settings['webName']?></title>

<script type="text/javascript" src="/skin/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/skin/js/onload.js?v=wj5.0"></script>
<script type="text/javascript" src="/skin/js/reglogin.js?v=wj5.0"></script>
<script type="text/javascript">window.onerror=function(){return true;}</script>

  
	<link rel="stylesheet" href="/abc/bootstrap.min.css">
	<link rel="stylesheet" href="/abc/font-awesome.min.css">
	<link rel="stylesheet" href="/abc/ui-dialog.css">
	<link rel="stylesheet" href="/abc/ezweb.css">
	
	<link href="/abc/lanrenzhijia.css" type="text/css" rel="stylesheet">
</head>

<body class="inner container" style="background-image:url(/abc/bg.png)">

	<div style="margin:90px 30PX">
	<div style="text-align:center ">
		<img src="/abc/logo1.png" ></img>
		</div>
		 <form action="/index.php/user/logined" method="post" onajax="userBeforeLogin" enter="true" call="userLogin" target="ajax">
	
			

			<div class="form-group field-loginuser-username required">
			<div style="height:20px"></div>
			<div class="input-group"><span class="input-group-addon" style="background-image:url(/abc/yonghuming.png)"></span>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo $_COOKIE['username'];?>" /> </div>
		
			<div class="help-block"></div>
			</div>

			<div class="form-group field-loginuser-password required">
			<div style="height:20px"></div>
			<div class="input-group"><span class="input-group-addon" style="background-image:url(/abc/mima.png)"><i class="fa "></i></span>
			<input type="password" id="password" class="form-control" name="password" ></div>
			<div class="help-block"></div>
			</div>

		<div class="forget_pwd">
                    
                       <input name="vcode" type="hidden" value=""/>
                   </div>

			<div class="form-group">
			
            <button type="submit" class="btn btn-green btn-lg btn-block" name="login-button">
			<a href="#" onclick="$(this).closest('form').submit();return false;" id="acc">登 录</a></button>
            </div>
           
			</form>
		
	</div>	
<div style="height:90px"></div>

         
<script type="text/javascript" src="/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.spinner.js"></script>
<script type="text/javascript">
    $('.spinnerExample').spinner({});
</script>

<script type="text/javascript" language=JavaScript charset="UTF-8">
      document.onkeydown=function(event){
            var e = event || window.event || arguments.callee.caller.arguments[0];          
             if(e && e.keyCode==13){ // enter 键
                document.getElementById('acc').click();
            }
        }; 
</script>

</body>
</html>