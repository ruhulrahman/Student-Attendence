<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helper/Format.php");
?>

<?php

Class Student{
	//Variable Declaration
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insertStudnetData($name, $roll){
		$name = mysqli_real_escape_string($this->db->link, $name);
		$roll = mysqli_real_escape_string($this->db->link, $roll);

		if(empty($name) && empty($roll)){
			$msg = "<span class='alert alert-danger'>Filed must not be empty.</span>";
			return $msg;
		}else{			
			$query = "INSERT INTO student (name, roll) VALUES ('$name', '$roll')";
			$result = $this->db->insert($query);
			if($result){
				$msg = "<span class='alert alert-success'>A new student added</span>";
				return $msg;
			}
		}
	}


	public function getStudentData(){
		$query = "SELECT * FROM student";
		$result = $this->db->select($query);
		return $result;
	}




	public function inserAttendance($current_date, $attend = array()){
		$query = "SELECT DISTINCT attend_date FROM tbl_attendance";
		$getDate = $this->db->select($query);
		if($getDate->fetch_assoc() > 0){
			while($result = $getDate->fetch_assoc()){
				$db_date = $result['attend_date'];
				if($current_date == $db_date){
					$msg = "<div class='well'>
								<span class='alert alert-danger'>Attendance already taken!</span>
							</div>";
					return $msg;
				}
			}
		}

		foreach($attend as $atnKey => $atnValue){
			if($atnValue == "present"){
				$atn_query = "INSERT INTO tbl_attendance (roll, attend, attend_date) VALUES ('$atnKey','present', now())";
				$dataInsert = $this->db->insert($atn_query);
			}else if($atnValue == "absent"){
				$atn_query = "INSERT INTO tbl_attendance (roll, attend, attend_date) VALUES ('$atnKey','absent', now())";
				$dataInsert = $this->db->insert($atn_query);
			}

		}

		if($dataInsert){
			$msg = "<div class='well'>
						<span class='alert alert-success'>Attendance successfully completed</span>
					</div>";
			return $msg;
		}else{
			$msg = "<div class='well'>
						<span class='alert alert-danger'>Attendance Data is not inserted!!</span>
					</div>";
			return $msg;
		}
	}


	public function getAttendanceDate(){
		$query = "SELECT DISTINCT attend_date FROM tbl_attendance ORDER BY attend_date DESC";
		$result = $this->db->select($query);
		return $result;
	}



	public function getStudentByAttendance($dt){
		//SQL query		
		$query = "SELECT tbl_attendance.*, student.name
		FROM tbl_attendance
		INNER JOIN student
		ON tbl_attendance.roll = student.roll WHERE tbl_attendance.attend_date = '$dt'
		ORDER BY student.id ASC";		
		$result = $this->db->select($query);
		return $result;
	}


	public function updateAttendance($dt, $attend){
		foreach($attend as $atnKey => $atnValue){
			if($atnValue == "present"){
				$query = "UPDATE tbl_attendance SET attend='present' WHERE roll='".$atnKey."' AND attend_date='".$dt."'";
				$dataupdate = $this->db->update($query);
			}else if($atnValue == "absent"){
				$query = "UPDATE tbl_attendance SET attend='absent' WHERE roll='".$atnKey."' AND attend_date='".$dt."'";
				$dataupdate = $this->db->update($query);
			}
		}

		if($dataupdate){
			$msg = "<div class='well'>
						<span class='alert alert-success'>Attendance successfully updated!!</span>
					</div>";
			return $msg;
		}else{
			$msg = "<div class='well'>
						<span class='alert alert-danger'>Attendance didn't updated!</span>
					</div>";
			return $msg;
		}
	}


}