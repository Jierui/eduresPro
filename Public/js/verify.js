// JavaScript Document

var code; //��ȫ�� ������֤��
function createCode()
{ //������֤�뺯��
 code = "";
 var codeLength =5;//��֤��ĳ���
 var selectChar = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');//���к�ѡ�����֤����ַ�����ȻҲ���������ĵ�
       
 for(var i=0;i<codeLength;i++)
 {    
  var charIndex =Math.floor(Math.random()*36);
  code +=selectChar[charIndex];    
 }

// ������֤�����ʾ��ʽ������ʾ
 document.getElementById("discode").style.fontFamily="Fixedsys";  //��������
 document.getElementById("discode").style.letterSpacing="3px";  //������
 document.getElementById("discode").style.color="#ff0000";   //������ɫ
 document.getElementById("discode").style.background="#FFFFFF";     
 document.getElementById("discode").innerHTML=code;      // ��ʾ
}