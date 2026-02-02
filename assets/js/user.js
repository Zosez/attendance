const API_URL = "http://localhost/attendance/config/leaveServer.php";
// const API_URL = "https://student.heraldcollege.edu.np/~np03cs4a240115/attendance/config/leaveServer.php";

const leaveBtn = document.getElementById("leave-btn");
const popUp = document.getElementById("pop-up");
const close = document.getElementById("close");
const submitBtn = document.getElementById("leave-submit");
const leaveForm = document.getElementById("leave-form");

leaveBtn.addEventListener("click",function(){
	popUp.style.display="block";
});

close.addEventListener("click",function(){
	popUp.style.display="none";
});


async function addLeave(){
	let date = document.getElementById("leave-date").value.trim();
	let type = document.getElementById("leave-type").value.trim();
	let reason = document.getElementById("leave-reason").value.trim();
	let name = document.getElementById("leave-name").value;
	let empId = document.getElementById("emp-id").value;
	

	if(date!="" && type!="" && reason!=""){

		const newLeave = {
			empId:empId,
			name:name,
			date:date,
			type:type,
			reason:reason
		}

		const response = await fetch(API_URL,{
			method:'POST',
			headers:{'Content-Type':'application/json'},
			body:JSON.stringify(newLeave)
		});

		if(response.ok){
			leaveForm.reset();
			popUp.style.display="none";
			alert("Leave request submitted sucessfully");
		}else{
			alert("Issue");
		}


		

	}else{
		alert("The field need to be field");
	}



}

