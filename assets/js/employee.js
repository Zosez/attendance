let API_URL = "http://localhost/attendance/config/server.php";

let table = document.getElementById('employee_table');
let searchInput = document.getElementById("serch_emp");
let form=document.getElementById("edit-form");

function renderEmployee(employeeList){

	table.innerHTML=`<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Department</th>
						<th>Role</th>
						<th>Joined At</th>
					</tr>`;
	if (employeeList.length === 0) {
		table.innerHTML = '<p>No employees found matching your criteria.</p>';
		return;
	}
	employeeList.forEach(employee => {
		const tableElement = document.createElement('tr');
		
		tableElement.innerHTML = `
			<td>${employee['ID']}</td>
			<td>${employee['name']}</td>
			<td>${employee['email']}</td>
			<td>${employee['dept']}</td>
			<td>${employee['role']}</td>
			<td>${employee['joined_at']}</td>
			<td><button class="emp-button" id="edit-btn" 
			onclick="showEditForm(${employee['ID']},'${employee['name']}','${employee['email']}','${employee['dept']}')" >Edit</button>
			<br><button class="emp-button" id="delete-btn" onclick="deleteEmp(${employee['ID']})">Delete</button></td>
		`;
		table.appendChild(tableElement);
	});
}

async function fetchEmployee(){
	try{

	let response = await fetch(API_URL);
	if(response.ok){
		employees = await response.json();
		renderEmployee(employees);

	}
	}catch(error){
		console.log(error.message);
	}

}
fetchEmployee();

searchInput.addEventListener("input",function(){
	const searchTerm=searchInput.value.toLowerCase();
	const filteredEmp = employees.filter(emp => {
		const nameMatch = emp['name'].toLowerCase().includes(searchTerm);
		const departmentMatch = emp['dept'].toLowerCase().includes(searchTerm);
		const roleMatch = emp['role'].toLowerCase().includes(searchTerm);
		return nameMatch || departmentMatch || roleMatch;
		});
	renderEmployee(filteredEmp);

});


function showEditForm(id,name,email,dept){
	
	form.style.display="Block";
	document.getElementById("edit-id").value=id;
	document.getElementById("edit-name").value=name;
	document.getElementById("edit-email").value=email;
	document.getElementById("edit-department").value=dept;

}


function editBtn(){
	let name = document.getElementById("edit-name").value.trim();
	let email = document.getElementById("edit-email").value.trim();
	let dept = document.getElementById("edit-department").value.trim();
	let role = document.getElementById("edit-role").value;
	

	if(name!="" & email!="" & dept != ""){
		const emp = {
		name: name,
		email: email,
		department: dept,
		role:role
		}

		updateEmployee(document.getElementById("edit-id").value,emp);

	}else{
		alert("Fields cannot be empty");
	}
}


async function updateEmployee(id,update){
	let response = await fetch(`${API_URL}?empId=${id}`,{
		method:"PUT",
		headers:{'Content-Type':'application/json'},
		body: JSON.stringify(update)
	});
	if(response.ok){
		
		form.style.display='None';

		fetchEmployee();
		alert("Edited Succesfully");
		
	}
	
}

async function deleteEmp(id){

	let response = await fetch(`${API_URL}?empId=${id}`,{
		method:"DELETE"
	});

	if (response.ok) {
		fetchEmployee();
		alert("Employee removed succesfully");
	}


}

