const API_URL = "http://localhost/attendance/config/leaveServer.php";
let table = document.getElementById('leave_table');


function renderLeave(leaveList){

	table.innerHTML=`<tr>
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
		
		tableElement.innerHTML = `
			<td>${leave['name']}</td>
			<td>${leave['leave_date']}</td>
			<td>${leave['leave_type']}</td>
			<td>${leave['reason']}</td>
			<td>${leave['status']}</td>
			<td><button class="emp-button" id="approve-btn" 
			onclick="" >Approve</button>
			<br><button class="emp-button" id="delete-btn" onclick="">Reject</button></td>
		`;
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
