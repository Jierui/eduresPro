// JavaScript Document
function change(a){
			var change1 = document.getElementById("intrL-T").getElementsByTagName("li");
			var change2 = document.getElementById("intrL").getElementsByTagName("li");
			for(var i=0;i<change1.length;i++)
			{
				if(a==change1[i]){
					 change1[i].className = "cur1";
					change2[i].className = "show";
					
					/*
					if(i==0)
							$("#intrL").css("margin-left","60px"); 
						else if(i==1)	
							$("#intrL").css("margin-left","160px"); 	
						else if(i==2)	
							$("#intrL").css("margin-left","260px"); 	
						else if(i==3)	
							$("#intrL").css("margin-left","360px");
						else
							$("#intrL").css("margin-left","460px"); 	 	
						
				*/
				
				}
				else{
					 change1[i].className = "";
					change2[i].className = "hidden";
					}
			}
		}

