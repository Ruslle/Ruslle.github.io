///////////////////////////////////////// Регистрация //////////////////////////////
function ResetCaptcha(vitem){
	
	
	vitem.innerHTML = '<img src="captcha.php?rnd='+ Math.random() +'" border="0"/>';
	
}

function GetSumPer(){
	
	var sum = parseInt(document.getElementById("sum").value);
	var percent = parseInt(document.getElementById("percent").value);
	var add_sum = 0;
	
	if(sum > 0){
		
		if(percent > 0){
			add_sum = (percent / 100) * sum;
		}
		
		document.getElementById("res_sum").innerHTML = Math.round(sum+add_sum);
	}
	
}



function PaymentSum(){
	
	var sum = parseInt(document.getElementById("sum").value);
	var ser = parseInt(document.getElementById("ser_per").value);
	
		document.getElementById("res_sum").value = (sum/ser).toFixed(2);
	
}