let API_URL = "http://localhost/attendance/config/attendanceServer.php";

let table = document.getElementById('attendance_table');
let searchInput = document.getElementById("serch_date");
const currentDateUTC = new Date().toISOString().slice(0, 10);


searchInput.addEventListener("input",function(){

	console.log(searchInput.value);

	if(searchInput.value.trim()){
		fetchAttendance(searchInput.value);

	}else{
		fetchAttendance(currentDateUTC);
	}
})

function renderAttendance(attendance){

	table.innerHTML=`<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Department</th>
						<th>Role</th>
						<th>Date</th>
					</tr>`;

	if(attendance.length>0){
		attendance.forEach(atten=>{
			const tableElement = document.createElement('tr');

			tableElement.innerHTML=`<tr>
										<td>${atten['id']}</td>
										<td>${atten['name']}</td>
										<td>${atten['department']}</td>
										<td>${atten['role']}</td>
										<td>${atten['date']}</td>
									</tr>`;

			table.appendChild(tableElement);
			});
	}
}

async function fetchAttendance(date){
	let response = await fetch(`${API_URL}?date=${date}`);

	if(response.ok){
		console.log(response);
		let attendance =  await response.json();

		console.log(attendance);

		renderAttendance(attendance);
	}
}

fetchAttendance(currentDateUTC);




