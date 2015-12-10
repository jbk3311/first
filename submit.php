<?php  header("content-type:text/html;charset=GBK"); ?>
<head>
<title>提交工具</title>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<style>
#form{
    margin-left:auto;
    margin-right:auto;
    padding:1%;
    width:48%;
    line-height:135%;
    background-color:#b0e0e6;
}
#submit_url{
    width:55%;
}
#outcome{
    border:none;
    margin-left:25%;
    margin-right:auto;
    margin-bottom:20%;
    height:500px;
    width:50%;
    line-height:135%;
    background-color:#b0e0e6;
}
#marquee{
    margin-left:auto;
    margin-right:auto;
    width:50%;
    line-height:110%;
    text-align:center;
    background-color:#b0e0e6;
    color:red;
}
</style>
<script>
function $(id){
	return document.getElementById(id);
}
function url(e){
    $('form').action=e.value;
}
function get_file_name(e){
	e.name=e.value;
    $(e.id+'_').name=e.value;
}
function on_submit(){
	form1=$('form');
	e=$('submit_method');
	form1.method=e.value;
	if(e.value=='get')form1.action=form1.action+'?'+$('name_value').value;
	$('add_param').innerHTML='';
	add_param();
	return true;
}
</script>

</head>
<div id="marquee">
    <marquee scrollAmount=3 width="75%" onmouseover=stop() onmouseout=start() behavior=alternate >
        <a >注意！本工具在Firefox浏览器下测试通过</a>
    </marquee>
</div>
<form id="form" action="" target="outcome" method="post" enctype="multipart/form-data" onsubmit="return on_submit(this);">
   提交地地址:<input type="text" id="submit_url"  onchange="url(this);" ><br/>
    提交方式:<select id="submit_method">
            <option value="post">post</option>
            <option value="get">get</option>
          </select><br/>
    提交参数(格式name1=value1&name2=value2):<br/>
        <textarea cols="80" rows="6" id="name_value"><?php echo "stoken=".md5('szbike'.date('Y-m-d')); ?></textarea><br/>
        <div class='addimg' id="add_param" ></div>
    上传文件:<br/>
    字段名:<input type="text" id="file" name="file" value="file" onchange="get_file_name(this);" >
         <input type="file" id="file_" name="file" onchange=""><br/>
         <a onclick="add_file();">添加文件</a>
         <div id="br"></div><br/>
         <input type="submit" name="sub" value="提交">

</form>


<script>
var i=0,
div=document.getElementsByTagName("div")[1];
div2=document.getElementsByTagName("div")[2];

function add_param(){
	param=$('name_value').value.split('&');
	for(i=0;i<param.length;i++){
		value=param[i].split('=');
	    var input=document.createElement("input");//创建input
        input.setAttribute("type","hidden");//设置type属性
        input.setAttribute("name",value[0]);//设置name属性
        input.setAttribute("value",value[1]);//设置value属性
        div.appendChild(input);//插入到div内
	}
};

function add_file(){
    //文件名
    var input=document.createElement("input");//创建input
    input.setAttribute("type","text");//设置type属性
    input.setAttribute("name",'file'+(++i));//设置name属性
    input.setAttribute("id",'file'+i);//设置id属性
    input.setAttribute("value",'file'+i);//设置value属性
    input.setAttribute("onchange",'get_file_name(this)');//设置事件属性
    div2.appendChild(input);//插入到div内
    //文件，先用着。有时间再改进一下
    var input=document.createElement("input");//创建input
    input.setAttribute("type","file");//设置type属性
    input.setAttribute("name",'file'+i);//设置name属性
    input.setAttribute("id",'file'+i+'_');//设置id属性
    input.setAttribute("value",'file'+i);//设置value属性
    input.setAttribute("onchange",'add_file()');//设置事件属性
    div2.appendChild(input);//插入到div内
    var br=document.createElement("br");//创建input
    div2.appendChild(br);//插入到div内
};
</script>
<iframe id="outcome" name="outcome" ></iframe>










