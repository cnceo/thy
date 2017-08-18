// 彩票开奖配置
exports.cp=[
	
	{
		title:'重庆时时彩',
		source:'360',
		name:'cqssc',
		enable:true,
		timer:'cqssc', 

		option:{
			host:"cp.360.cn",
			timeout:50000,
			path: '/ssccq/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getFrom360CP(str,1);
			}catch(err){
				//throw('重庆时时彩解析数据不正确');
			}
		}
	},
	//}}}
	
	{
		title:'天津时时彩',
		source:'网站',
		name:'tjssc',
		enable:true,
		timer:'tjssc',

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/tjssc.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:35,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				throw('天津时时彩解析数据不正确');
			}
		}
	},////////////
	
	{
		title:'新疆时时彩',
		source:'网站',
		name:'xjssc',
		enable:true,
		timer:'xjssc',

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/xjssc.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:12,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				throw('新疆时时彩解析数据不正确');
			}
		}
	},
	
	{
		title:'排列5',
		source:'76612521',
		name:'pai5',
		enable:true,
		timer:'pai5',

		option:{
			host:"www.500wan.com",
			timeout:50000,
			path: '/static/info/kaijiang/xml/plw/list10.xml',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				str=str.substr(0,300);
				var m;	 
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;
				if(m=str.match(reg)){
					return {
						type:53,
						time:m[3],
						number:20+m[1],
						data:m[2]
					};
				}
			}catch(err){
			    throw('排列5解析数据不正确');
			}
		}
	},
	//}}}
	
	{
		title:'排列3',
		source:'排列3娱乐平台',
		name:'pai3',
		enable:true,
		timer:'pai3',

		option:{
			host:"www.500wan.com",
			timeout:50000,
			path: '/static/info/kaijiang/xml/pls/list10.xml',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				str=str.substr(0,300);
				var m;	 
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;
				if(m=str.match(reg)){
					return {
						type:10,
						time:m[3],
						number:20+m[1],
						data:m[2]
					};
				}
			}catch(err){
				throw('排3解析数据不正确');
			}
		}
	},
	//}}}
	
	{
		title:'五分彩',
		source:'qtllc',
		name:'qtllc',
		enable:true,
		timer:'qtllc',

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/index.php/xyylcp/xml',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 			
				var m;
				if(m=str.match(reg)){
					return {
						type:14,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}
			}catch(err){
				throw('五分彩解析数据不正确');
			}
		}
	},
//}}}

//{{{
	{
		title:'江西时时彩',
		source:'牛彩',
		name:'jxssc',
		enable:true,
		timer:'jxssc',

		option:{
			host:"127.0.0.19",           //务必修改成你自己的域名
			timeout:50000,
			path: '/index.php/xyylcp/xml33',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 			
				var m;
				if(m=str.match(reg)){
					return {
						type:3,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}
			}catch(err){
				throw('江西时时彩解析数据不正确');
			}
		}
	},
//}}}

//{{{
	{
		title:'两分彩',
		source:'牛彩',
		name:'lfc',
		enable:true,
		timer:'lfc',
		option:{
			host:"127.0.0.19",           //务必修改成你自己的域名
			timeout:50000,
			path: '/index.php/xyylcp/xml2',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);	
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
				if(m=str.match(reg)){
					return {
						type:26,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}					
			}catch(err){
				throw('两分彩解析数据不正确')
			}
		}
	},
//}}}

//{{{
	{
		title:'分分彩',
		source:'牛彩',
		name:'ffc',
		enable:true,
		timer:'ffc',
		option:{
			host:"127.0.0.19",            //务必修改成你自己的域名
			timeout:50000,
			path: '/index.php/xyylcp/xml3',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);	
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
				if(m=str.match(reg)){
					return {
						type:5,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}					
			}catch(err){
				throw('分分彩解析数据不正确');
			}
		}
	},
//}}}

//{{{
	{
		title:'福彩3D',
		source:'福彩3D娱乐平台',
		name:'fc3d',
		enable:true,
		timer:'fc3d',

		option:{
			host:"www.500wan.com",
			timeout:50000,
			path: '/static/info/kaijiang/xml/sd/list10.xml',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				str=str.substr(0,300);
				var m;
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)" trycode="[\d\,]*?" tryinfo="" \/>/;
                                        
				if(m=str.match(reg)){
					return {
						type:9,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}
			}catch(err){
				throw('福彩3D解析数据不正确');
			}
		}
	},
//}}}

//{{{
	{
		title:'香港11选',
		source:'牛彩',
		name:'xg11x5',
		enable:true,
		timer:'xg11x5',
		option:{
			host:"127.0.0.19",            //务必修改成你自己的域名
			timeout:50000,
			path: '/index.php/xyylcp/xml102',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);	
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
				if(m=str.match(reg)){
					return {
						type:102,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}					
			}catch(err){
				throw('香港11选5解析数据不正确');
			}
		}
	},
	//}}}
	
	{
		title:'广东11选5',
		source:'牛彩',
		name:'gd11x5',
		enable:true,
		timer:'gd11x5',

 

		option:{
			host:"cp.360.cn",
			timeout:50000,
			path: '/gd11/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getFrom360CP(str,6);
			}catch(err){
				//throw('广东11选5解析数据不正确');
			}
		}
	},
	//}}}
	
	{

		title:'辽宁11选5',
		source:'网站',
		name:'ln11x5',
		enable:true,
		timer:'ln11x5',

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/ln115.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:23,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				throw('辽宁11选5解析数据不正确');
			}
		}
	},////////////

	//}}}
	{
		title:'山东11选5',
		source:'牛彩',
		name:'sd11x5',
		enable:true,
		timer:'sd11x5', 

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/sd115.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:7,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('山东11选5解析数据不正确');
			}
		}
	},////////////

	//}}}
	{
		title:'上海11选5',
		source:'上海11选5',
		name:'sh11x5',
		enable:true,
		timer:'sh11x5', 

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/sh115.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:22,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('上海11选5解析数据不正确');
			}
		}
	},////

	{
		title:'江西11选5',
		source:'牛彩',
		name:'jx11x5',
		enable:true,
		timer:'jx11x5',
 

		option:{
			host:"cp.360.cn",
			timeout:50000,
			path: '/dlcjx/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		parse:function(str){
			try{
				return getFrom360CP(str,16);
			}catch(err){
				//throw('江西多乐彩解析数据不正确');
			}
		}
	},////////
	
	//{{{
	{
		title:'全天快三',
		source:'qtks',
		name:'qtks',
		enable:true,
		timer:'qtks',

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/index.php/xyylcp/xml60',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);
				
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				//<row expect="20130720017" opencode="4,9,1,2,9" opentime="2013-07-20 01:25:30"/>
				
				var m;
				if(m=str.match(reg)){
					return {
						type:60,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}					
				
			}catch(err){
				throw('全天快三解析数据不正确');
			}
		}
	},////////////

	//}}}
	{
		title:'江苏快3',
		source:'江苏快3',
		name:'jsk3',
		enable:true,
		timer:'jsk3', 

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/jsk3.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:25,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('江苏快3解析数据不正确');
			}
		}
	},////////////

	//}}}
	{
		title:'广西快3',
		source:'广西快3',
		name:'gxk3',
		enable:true,
		timer:'gxk3', 

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/gxk3.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:52,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('广西快3解析数据不正确');
			}
		}
	},////////////

	//}}}
	{
		title:'吉林快3',
		source:'吉林快3',
		name:'jlk3',
		enable:true,
		timer:'jlk3', 

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/jlk3.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:30,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('吉林快3解析数据不正确');
			}
		}
	},////////////

	//}}}
	{
		title:'安徽快3',
		source:'安徽快3',
		name:'ahk3',
		enable:true,
		timer:'ahk3', 

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/ahk3.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:39,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('安徽快3解析数据不正确');
			}
		}
	},////////////

	//}}}
	{
		title:'湖南快乐10分',
		source:'湖南快乐10分',
		name:'hnklsf',
		enable:true,
		timer:'hnklsf', 

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/hnklsf.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:27,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('湖南快乐10分解析数据不正确');
			}
		}
	},////////////

	//}}}
	{
		title:'广东快乐10分',
		source:'广东快乐10分',
		name:'gdklsf',
		enable:true,
		timer:'gdklsf', 

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/gdklsf.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:17,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('广东快乐10分解析数据不正确');
			}
		}
	},////////
	
	//{{{
	{
		title:'北京PK10',
		source:'北京PK10平台',
		name:'bjpk10',
		enable:true,
		timer:'bjpk10',

		option:{

			host:"www.bwlc.net",
			timeout:50000,
			path: '/bulletin/trax.html',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				return getFromPK10(str,20);
			}catch(err){
				throw('北京PK10解析数据不正确');
			}
		}
	},
//}}}

//{{{
	{
		title:'全天pk10',
		source:'牛彩',
		name:'qtpk10',
		enable:true,
		timer:'qtpk10',

		option:{
			host:"127.0.0.19",           //务必修改成你自己的域名
			timeout:50000,
			path: '/index.php/xyylcp/xml103',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 			
				var m;
				if(m=str.match(reg)){
					return {
						type:103,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}
			}catch(err){
				throw('全天pk10解析数据不正确');
			}
		}
	},
	//}}}
	
	{

		title:'北京快乐8',
		source:'网站',
		name:'bjk8',
		enable:true,
		timer:'bjk8',

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/caiji/kl8.php?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,5);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:24,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				throw('北京快乐8解析数据不正确');
			}
		}
	},////////
	
	//{{{
	{
		 title:'香港六合彩',
		source:'香港六合彩',
		name:'xglhc',
		enable:true,
		timer:'xglhc',
 

		option:{
			host:"www.14444.net",
			timeout:30000,
			path: '/lotterydata.xml?ac=ssc',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			//return getFromCalilecWeb(str,146);
			try{
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:59,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{2})$/, '$1-0$2'),
						data:m[2]
					};
				}					
			}catch(err){
				//throw('香港六合彩解析数据不正确');
			}
		}
	},
//}}}

//{{{
	{
		title:'快速六合彩',
		source:'lhc',
		name:'lhc',
		enable:true,
		timer:'lhc',

		option:{
			host:"127.0.0.19",
			timeout:50000,
			path: '/index.php/xyylcp/xml4',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "
			}
		},
		parse:function(str){
			try{
				str=str.substr(0,200);
				
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				//<row expect="20130720017" opencode="12,39,30,27,30,11,15" opentime="2013-07-20 01:25:30"/>
				
				var m;
				if(m=str.match(reg)){
					return {
						type:55,
						time:m[3],
						number:m[1],
						data:m[2]
					};
				}					
				
			}catch(err){
				throw('快速六合彩解析数据不正确');
			}
		}
	},
//}}}
	
];

// 出错时等待 15
exports.errorSleepTime=15;

// 重启时间间隔，以小时为单位，0为不重启
//exports.restartTime=0.4;
exports.restartTime=0;

exports.submit={

	host:'127.0.0.1',
	path:'/admin778899.php/dataSource/kj'
}

exports.dbinfo={
	host:'127.0.0.1',
	user:'root',
	password:'qq2605559995',
	database:'wanjing'

}

global.log=function(log){
	var date=new Date();
	console.log('['+date.toDateString() +' '+ date.toLocaleTimeString()+'] '+log)
}

function getFromXJFLCPWeb(str, type){
	str=str.substr(str.indexOf('<td><a href="javascript:detatilssc'), 300).replace(/[\r\n]+/g,'');
         
	var reg=/(\d{10}).+(\d{2}\:\d{2}).+<p>([\d ]{9})<\/p>/,
	match=str.match(reg);
	
	if(!match) throw new Error('数据不正确');
	//console.log('期号：%s，开奖时间：%s，开奖数据：%s', match[1], match[2], match[3]);
	
	try{
		var data={
			type:type,
			time:match[1].replace(/^(\d{4})(\d{2})(\d{2})\d{2}/, '$1-$2-$3 ')+match[2],
			number:match[1].replace(/^(\d{8})(\d{2})$/, '$1-$2'),
			data:match[3].split(' ').join(',')
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}


function getFromCaileleWeb(str, type, slen){
	if(!slen) slen=380;
	str=str.substr(str.indexOf('<tr bgcolor="#FFFAF3">'),slen);
	//console.log(str);
	var reg=/<td.*?>(\d+)<\/td>[\s\S]*?<td.*?>([\d\- \:]+)<\/td>[\s\S]*?<td.*?>((?:[\s\S]*?<div class="ball_yellow">\d+<\/div>){3,5})\s*<\/td>/,
	match=str.match(reg);
	if(match.length>1){
		
		if(match[1].length==7) match[1]='2016'+match[1].replace(/(\d{4})(\d{3})/,'$1-$2');
		if(match[1].length==8){
			if(parseInt(type)!=11){
				match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-0$2');
			}else{match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');}
		}
		if(match[1].length==9) match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');
		if(match[1].length==10) match[1]=match[1].replace(/(\d{8})(\d{2})/,'$1-0$2');
		var mynumber=match[1].replace(/(\d{8})(\d{3})/,'$1-$2');
	try{
		var data={
			type:type,
			time:match[2],
			number:mynumber
		}
		
		reg=/<div.*>(\d+)<\/div>/g;
		data.data=match[3].match(reg).map(function(v){
			var reg=/<div.*>(\d+)<\/div>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
   }
}

function getFrom360CP(str, type){

	str=str.substr(str.indexOf('<em class="red" id="open_issue">'),380);
	//console.log(str);
	var reg=/[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
	match=str.match(reg);
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	//console.log(match);
	if(match.length>1){
		if(match[1].length==7) match[1]=year+match[1].replace(/(\d{8})(\d{3})/,'$1-$2');
		if(match[1].length==6) match[1]=year+match[1].replace(/(\d{4})(\d{2})/,'$1-0$2');
		if(match[1].length==9) match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');
		if(match[1].length==10) match[1]=match[1].replace(/(\d{8})(\d{2})/,'$1-0$2');
		var mynumber=match[1].replace(/(\d{8})(\d{3})/,'$1-$2');
		
		try{
			var data={
				type:type,
				time:mytime,
				number:mynumber
			}
			
			reg=/<li class=".*?">(\d+)<\/li>/g;
			data.data=match[2].match(reg).map(function(v){
				var reg=/<li class=".*?">(\d+)<\/li>/;
				return v.match(reg)[1];
			}).join(',');
			
			//console.log(data);
			return data;
		}catch(err){
			throw('解析数据失败');
		}
	}
}

function getFromPK10(str, type){

	str=str.substr(str.indexOf('<div class="lott_cont">'),350).replace(/[\r\n]+/g,'');
    //console.log(str);
	var reg=/<tr class=".*?">[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	try{
		var data={
			type:type,
			time:match[3],
			number:match[1],
			data:match[2]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}

function getFromK8(str, type){

	str=str.substr(str.indexOf('<div class="lott_cont">'),450).replace(/[\r\n]+/g,'');
    //console.log(str);
	var reg=/<tr class=".*?">[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	try{
		var data={
			type:type,
			time:match[4],
			number:match[1],
			data:match[2]+'|'+match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}


function getFromCJCPWeb(str, type){

	//console.log(str);
	str=str.substr(str.indexOf('<table class="qgkj_table">'),1200);
	
	//console.log(str);
	
	var reg=/<tr>[\s\S]*?<td class=".*">(\d+).*?<\/td>[\s\S]*?<td class=".*">([\d\- \:]+)<\/td>[\s\S]*?<td class=".*">((?:[\s\S]*?<input type="button" value="\d+" class=".*?" \/>){3,5})[\s\S]*?<\/td>/,
	match=str.match(reg);
	
	//console.log(match);
	
	if(!match) throw new Error('数据不正确');
	try{
		var data={
			type:type,
			time:match[2],
			number:match[1].replace(/(\d{8})(\d{2})/,'$1-0$2')
		}
		
		reg=/<input type="button" value="(\d+)" class=".*?" \/>/g;
		data.data=match[3].match(reg).map(function(v){
			var reg=/<input type="button" value="(\d+)" class=".*?" \/>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}

function getFromCaileleWeb_1(str, type){
	str=str.substr(str.indexOf('<tbody id="openPanel">'), 120).replace(/[\r\n]+/g,'');
         
	var reg=/<tr.*?>[\s\S]*?<td.*?>(\d+)<\/td>[\s\S]*?<td.*?>([\d\:\- ]+?)<\/td>[\s\S]*?<td.*?>([\d\,]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	var number,_number,number2;
	var d = new Date();
	var y = d.getFullYear();
	if(match[1].length==9 || match[1].length==8){number='20'+match[1];}else if(match[1].length==7){number='2016'+match[1];}else{number=match[1];}
	_number=number;
	if(number.length==11){number2=number.replace(/^(\d{8})(\d{3})$/, '$1-$2');}else{number2=number.replace(/^(\d{8})(\d{2})$/, '$1-0$2');_number=number.replace(/^(\d{8})(\d{2})$/, '$10$2');}
	try{
		var data={
			type:type,
			time:_number.replace(/^(\d{4})(\d{2})(\d{2})\d{3}/, '$1-$2-$3 ')+match[2],
			number:number2,
			data:match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}

function getFrom360sd11x5(str, type){

	str=str.substr(str.indexOf('<em class="red" id="open_issue">'),380);
	//console.log(str);
	var reg=/[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
	match=str.match(reg);
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString(); 
	//console.log(mytime);
	//console.log(match);
	
	if(!match) throw new Error('数据不正确');
	try{
		var data={
			type:type,
			time:mytime,
			number:match[1].replace(/(\d{8})(\d{2})/,'$1-0$2')
		}
		
		reg=/<li class=".*?">(\d+)<\/li>/g;
		data.data=match[2].match(reg).map(function(v){
			var reg=/<li class=".*?">(\d+)<\/li>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}

function getFromCaileleWeb_2(str, type){

	str=str.substr(str.indexOf('<tbody id="openPanel">'), 500).replace(/[\r\n]+/g,'');
	//console.log(str);
	var reg=/<tr>[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<td>([\d\,]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	var number,_number,number2;
	var d = new Date();
	var y = d.getFullYear();
	if(match[1].length==9 || match[1].length==8){number='20'+match[1];}else if(match[1].length==7){number='2016'+match[1];}else{number=match[1];}
	_number=number;
	if(number.length==11){number2=number.replace(/^(\d{8})(\d{3})$/, '$1-$2');}else{number2=number.replace(/^(\d{8})(\d{2})$/, '$1-0$2');_number=number.replace(/^(\d{8})(\d{2})$/, '$10$2');}
	try{
		var data={
			type:type,
			time:_number.replace(/^(\d{4})(\d{2})(\d{2})\d{3}/, '$1-$2-$3 ')+match[2],
			number:number2,
			data:match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}