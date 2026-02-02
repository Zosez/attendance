const API_URL = "http://localhost/attendance/config/leaveServer.php";
// const API_URL = "https://student.heraldcollege.edu.np/~np03cs4a240115/attendance/config/leaveServer.php";
let table = document.getElementById('leave_table');
let option=document.getElementById('filter-option');
let leaveType = document.getElementById("filter-type");


function renderLeave(leaveList){

	table.innerHTML=`<tr>
						<th>Leave Id</th>
						<th>Name</th>
						<th>Leave Date</th>
						<th>Leave Type</th>
						<th>Reason</th>
						<th>Status</th>
					</tr>`;
	if (leaveList.length === 0) {
		table.innerHTML = '<p>No leaves found.</p>';
		return;
	}
	
	leaveList.forEach(leave => {
		const tableElement = document.createElement('tr');
		if(leave['status'].toLowerCase()==="pending"){

			tableElement.innerHTML = `
				<td>${leave['Id']}</td>
				<td>${leave['name']}</td>
				<td>${leave['leave_date']}</td>
				<td>${leave['leave_type']}</td>
				<td>${leave['reason']}</td>
				<td><p class="pending-text">${leave['status']}</p></td>
				<td><button class="approve-button" id="approve-btn" 
				onclick="decision('Approved',${leave['Id']})" >Approve</button>
				<br><button class="reject-button" id="delete-btn" onclick="decision('Rejected',${leave['Id']})">Reject</button></td>
			`;
			
		}else if(leave['status'].toLowerCase()==="approved"){
			tableElement.innerHTML = `
				<td>${leave['Id']}</td>
				<td>${leave['name']}</td>
				<td>${leave['leave_date']}</td>
				<td>${leave['leave_type']}</td>
				<td>${leave['reason']}</td>
				<td><p class="approved-text">${leave['status']}</p></td>`;

			
		}else{
			tableElement.innerHTML = `
				<td>${leave['Id']}</td>
				<td>${leave['name']}</td>
				<td>${leave['leave_date']}</td>
				<td>${leave['leave_type']}</td>
				<td>${leave['reason']}</td>
				<td><p class="rejected-text">${leave['status']}</p></td>`;

			
		}
		table.appendChild(tableElement);
	});
}

async function fetchLeaves(){
	try{

	let response = await fetch(API_URL);
	
	if(response.ok){
		leaves = await response.json();
		renderLeave(leaves);

	}
	}catch(error){
		console.log(error.message);
	}

}
fetchLeaves();

async function decision(value,id){
	const response = await fetch(`${API_URL}?leaveId=${id}&status=${value}`,{
		method:"PUT"
	});
	if(response.ok){
		fetchLeaves();
	}
}


option.addEventListener('input',function(){
	let value = option.value;
	let type = leaveType.value;
	
	if(value!="all" & type!="all"){
		let pendLeave = leaves.filter(leave=>{
			const statMatch = value.toLowerCase()===leave['status'].toLowerCase();
			const typeMatch = type.toLowerCase()===leave['leave_type'].toLowerCase();
			return statMatch & typeMatch
		});

		renderLeave(pendLeave);
	}
	else if(value!="all" || type!="all"){
		let pendLeave = leaves.filter(leave=>{
			const statMatch = value.toLowerCase()===leave['status'].toLowerCase();
			const typeMatch = type.toLowerCase()===leave['leave_type'].toLowerCase();
			return statMatch || typeMatch
		});

		renderLeave(pendLeave);
	}
	else{
		renderLeave(leaves);
	}

});



leaveType.addEventListener('input',function(){
	let value = option.value;
	let type = leaveType.value;
	
		
	if(value!="all" & type!="all"){
		let pendLeave = leaves.filter(leave=>{
			const statMatch = value.toLowerCase()===leave['status'].toLowerCase();
			const typeMatch = type.toLowerCase()===leave['leave_type'].toLowerCase();
			return statMatch & typeMatch
		});

		renderLeave(pendLeave);
	}
	else if(value!="all" || type!="all"){
		let pendLeave = leaves.filter(leave=>{
			const statMatch = value.toLowerCase()===leave['status'].toLowerCase();
			const typeMatch = type.toLowerCase()===leave['leave_type'].toLowerCase();
			return statMatch || typeMatch
		});

		renderLeave(pendLeave);
	}
	else{
		renderLeave(leaves);
	}

});


