<?php  header("content-type:text/html;charset=GBK"); ?>
<head>
<title>�ύ����</title>
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
        <a >ע�⣡��������Firefox������²���ͨ��</a>
    </marquee>
</div>
<form id="form" action="" target="outcome" method="post" enctype="multipart/form-data" onsubmit="return on_submit(this);">
   �ύ�ص�ַ:<input type="text" id="submit_url"  onchange="url(this);" ><br/>
    �ύ��ʽ:<select id="submit_method">
            <option value="post">post</option>
            <option value="get">get</option>
          </select><br/>
    �ύ����(��ʽname1=value1&name2=value2):<br/>
        <textarea cols="80" rows="6" id="name_value"><?php echo "stoken=".md5('szbike'.date('Y-m-d')); ?></textarea><br/>
        <div class='addimg' id="add_param" ></div>
    �ϴ��ļ�:<br/>
    �ֶ���:<input type="text" id="file" name="file" value="file" onchange="get_file_name(this);" >
         <input type="file" id="file_" name="file" onchange=""><br/>
         <a onclick="add_file();">����ļ�</a>
         <div id="br"></div><br/>
         <input type="submit" name="sub" value="�ύ">

</form>


<script>
var i=0,
div=document.getElementsByTagName("div")[1];
div2=document.getElementsByTagName("div")[2];

function add_param(){
	param=$('name_value').value.split('&');
	for(i=0;i<param.length;i++){
		value=param[i].split('=');
	    var input=document.createElement("input");//����input
        input.setAttribute("type","hidden");//����type����
        input.setAttribute("name",value[0]);//����name����
        input.setAttribute("value",value[1]);//����value����
        div.appendChild(input);//���뵽div��
	}
};

function add_file(){
    //�ļ���
    var input=document.createElement("input");//����input
    input.setAttribute("type","text");//����type����
    input.setAttribute("name",'file'+(++i));//����name����
    input.setAttribute("id",'file'+i);//����id����
    input.setAttribute("value",'file'+i);//����value����
    input.setAttribute("onchange",'get_file_name(this)');//�����¼�����
    div2.appendChild(input);//���뵽div��
    //�ļ��������š���ʱ���ٸĽ�һ��
    var input=document.createElement("input");//����input
    input.setAttribute("type","file");//����type����
    input.setAttribute("name",'file'+i);//����name����
    input.setAttribute("id",'file'+i+'_');//����id����
    input.setAttribute("value",'file'+i);//����value����
    input.setAttribute("onchange",'add_file()');//�����¼�����
    div2.appendChild(input);//���뵽div��
    var br=document.createElement("br");//����input
    div2.appendChild(br);//���뵽div��
};
</script>
<iframe id="outcome" name="outcome" ></iframe>










