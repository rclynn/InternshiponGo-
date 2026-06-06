<?php 
include('../1connection.php');
if(isset($_POST['EXPORTALL'])){
				// Database configuration
		
		$con->set_charset("utf8");


		// Get All Table Names From the Database
		$tables = array();
		$sql = "SHOW TABLES";
		$result = con_query($con, $sql);

		while ($row = con_fetch_row($result)) {
		    $tables[] = $row[0];
		}

		$return = "";
		foreach ($tables as $table) {
		    
		    // Prepare return for creating table structure
		    $query = "SHOW CREATE TABLE $table";
		    $result = con_query($con, $query);
		    $row = con_fetch_row($result);
		    
		    $return .= "\n\n" . $row[1] . ";\n\n";
		    
		    
		    $query = "SELECT * FROM $table";
		    $result = con_query($con, $query);
		    
		    $columnCount = con_num_fields($result);
		    
		    // Prepare return for dumping data for each table
		    for ($i = 0; $i < $columnCount; $i ++) {
		        while ($row = con_fetch_row($result)) {
		            $return .= "INSERT INTO $table VALUES(";
		            for ($j = 0; $j < $columnCount; $j ++) {
		                $row[$j] = $row[$j];
		                
		                if (isset($row[$j])) {
		                    $return .= '"' . $row[$j] . '"';
		                } else {
		                    $return .= '""';
		                }
		                if ($j < ($columnCount - 1)) {
		                    $return .= ',';
		                }
		            }
		            $return .= ");\n";
		        }
		    }
		    
		    $return .= "\n"; 
		}

		if(!empty($return))
		{
		    // Save the SQL script to a backup file
		    $backup_file_name = $database_name . '_backup_' . time() . '.sql';
		    $fileHandler = fopen($backup_file_name, 'w+');
		    $number_of_lines = fwrite($fileHandler, $return);
		    fclose($fileHandler); 

		    // Download the SQL backup file to the browser
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($backup_file_name));
		    ob_clean();
		    flush();
		    readfile($backup_file_name);
		    exec('rm ' . $backup_file_name); 
		} 
}

if(isset($_POST['exportagency2'])){
	$tables = 'agency';
	 if($tables == '*') { 
        $tables = array();
        $result = $con->query("SHOW TABLES");
        while($row = $result->fetch_row()) { 
            $tables[] = $row[0];
        }
    } else { 
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }

    $return = '';

    foreach($tables as $table){
        $result = $con->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

        /* $return .= "DROP TABLE $table;"; */
        $result2 = $con->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

        $return .= "\n\n".$row2[1].";\n\n";

        for($i = 0; $i < $numColumns; $i++) { 
            while($row = $result->fetch_row()) { 
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++) { 
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = $row[$j];
                    if (isset($row[$j])) { 
                        $return .= '"'.$row[$j].'"' ;
                    } else { 
                        $return .= '""';
                    }
                    if ($j < ($numColumns-1)) {
                        $return.= ',';
                    }
                }
                $return .= ");\n";
            }
        }

        $return .= "\n\n\n";
    }

    if(!empty($return))
		{
		    // Save the SQL script to a backup file
		    $backup_file_name = $database_name . 'agency' . time() . '.sql';
		    $fileHandler = fopen($backup_file_name, 'w+');
		    $number_of_lines = fwrite($fileHandler, $return);
		    fclose($fileHandler); 

		    // Download the SQL backup file to the browser
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($backup_file_name));
		    ob_clean();
		    flush();
		    readfile($backup_file_name);
		    exec('rm ' . $backup_file_name); 
		} 		
}
if(isset($_POST['addagency']))
        { 	
        	$agencyname=$_POST['agencyname'];
        	$coordinator=$_POST['coordinator'];
        	$auth=$_POST['auth'];
        	$contact=$_POST['contact'];
        	$location=$_POST['location'];
        	
        	date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());

            if(isset($_FILES["pic"]['name'])&&$_FILES["pic"]['name']!='')
            {
                $fileName = $_FILES["pic"]['name'];
                $tmpName  = $_FILES["pic"]['tmp_name']; 
                $fileSize = $_FILES["pic"]['size'];
                $fileType = $_FILES["pic"]['type'];

                function getExtension($str)
                         {
                             $i = strrpos($str,".");
                             if (!$i) { return ""; }
                             $l = strlen($str) - $i;
                             $ext = substr($str,$i+1,$l);
                             return $ext;
                         }
                    $extension = getExtension($fileName);
                    $extension = strtolower($extension);
                    $final_filename = time().".".$extension;
                    $copied = move_uploaded_file($tmpName, "../assets/img/user/".$final_filename)or die();
            }
            else
            {
                    $final_filename='null.png';
            } 

            $INSERTSUBJECTS=mysqli_query($con,"INSERT into agency ( 
             	agencyNAME,
             	agencyPERSONEL,
             	agencyIMG,
             	agencyUSERNAME,
             	agencyPASSWORD,
             	agencyCONTACT,
             	agencyLOCATION
            ) VALUES(
             	'$agencyname',
             	'$coordinator',
             	'$final_filename',
             	'$auth',
             	'$auth',
             	'$contact',
             	'$location'
            )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('coordinator.php');alert('Succesfuly Added!');</script>";  
            }
}
if(isset($_POST['btnupdateinfo']))
        {
            $coordinatorID = $_POST['coordinatorID'];
            $number = $_POST['number'];
            $address = $_POST['address'];
            

            $update=mysqli_query($con,"UPDATE agency SET 
                    agencyCONTACT = '$number',
                    agencyLOCATION = '$address'
                WHERE 
                    agencyID ='$coordinatorID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewcoordinator.php?coordinatorID=$coordinatorID');alert('Successfully Updated!')</script>";  
                
                }
}

if(isset($_POST['exportstudents'])){
    $tables = 'student';
     if($tables == '*') { 
        $tables = array();
        $result = $con->query("SHOW TABLES");
        while($row = $result->fetch_row()) { 
            $tables[] = $row[0];
        }
    } else { 
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }

    $return = '';

    foreach($tables as $table){
        $result = $con->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

        /* $return .= "DROP TABLE $table;"; */
        $result2 = $con->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

        $return .= "\n\n".$row2[1].";\n\n";

        for($i = 0; $i < $numColumns; $i++) { 
            while($row = $result->fetch_row()) { 
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++) { 
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = $row[$j];
                    if (isset($row[$j])) { 
                        $return .= '"'.$row[$j].'"' ;
                    } else { 
                        $return .= '""';
                    }
                    if ($j < ($numColumns-1)) {
                        $return.= ',';
                    }
                }
                $return .= ");\n";
            }
        }

        $return .= "\n\n\n";
    }

    if(!empty($return))
        {
            // Save the SQL script to a backup file
            $backup_file_name = $database_name . 'students' . time() . '.sql';
            $fileHandler = fopen($backup_file_name, 'w+');
            $number_of_lines = fwrite($fileHandler, $return);
            fclose($fileHandler); 

            // Download the SQL backup file to the browser
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($backup_file_name));
            ob_clean();
            flush();
            readfile($backup_file_name);
            exec('rm ' . $backup_file_name); 
        }       
}

if(isset($_POST['exportinstructor'])){
    $tables = 'instructor';
     if($tables == '*') { 
        $tables = array();
        $result = $con->query("SHOW TABLES");
        while($row = $result->fetch_row()) { 
            $tables[] = $row[0];
        }
    } else { 
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }

    $return = '';

    foreach($tables as $table){
        $result = $con->query("SELECT * FROM $table");
        $numColumns = $result->field_count;

        /* $return .= "DROP TABLE $table;"; */
        $result2 = $con->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();

        $return .= "\n\n".$row2[1].";\n\n";

        for($i = 0; $i < $numColumns; $i++) { 
            while($row = $result->fetch_row()) { 
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++) { 
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = $row[$j];
                    if (isset($row[$j])) { 
                        $return .= '"'.$row[$j].'"' ;
                    } else { 
                        $return .= '""';
                    }
                    if ($j < ($numColumns-1)) {
                        $return.= ',';
                    }
                }
                $return .= ");\n";
            }
        }

        $return .= "\n\n\n";
    }

    if(!empty($return))
        {
            // Save the SQL script to a backup file
            $backup_file_name = $database_name . 'instructor' . time() . '.sql';
            $fileHandler = fopen($backup_file_name, 'w+');
            $number_of_lines = fwrite($fileHandler, $return);
            fclose($fileHandler); 

            // Download the SQL backup file to the browser
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($backup_file_name));
            ob_clean();
            flush();
            readfile($backup_file_name);
            exec('rm ' . $backup_file_name); 
        }       
}
if(isset($_POST['addinstructor']))
        {   
            $name=$_POST['name'];
            $school=$_POST['school'];
            $auth=$_POST['auth'];
            $contact=$_POST['contact'];
            $course=$_POST['course'];
            
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());

            if(isset($_FILES["pic"]['name'])&&$_FILES["pic"]['name']!='')
            {
                $fileName = $_FILES["pic"]['name'];
                $tmpName  = $_FILES["pic"]['tmp_name']; 
                $fileSize = $_FILES["pic"]['size'];
                $fileType = $_FILES["pic"]['type'];

                function getExtension($str)
                         {
                             $i = strrpos($str,".");
                             if (!$i) { return ""; }
                             $l = strlen($str) - $i;
                             $ext = substr($str,$i+1,$l);
                             return $ext;
                         }
                    $extension = getExtension($fileName);
                    $extension = strtolower($extension);
                    $final_filename = time().".".$extension;
                    $copied = move_uploaded_file($tmpName, "../assets/img/user/".$final_filename)or die();
            }
            else
            {
                    $final_filename='null.png';
            } 

            $INSERTSUBJECTS=mysqli_query($con,"INSERT into instructor ( 
                instructorNAME,
                instructorUSERNAME,
                instructorPASSWORD,
                instructorNUMBER,
                instructorCOURSE,
                instructorSCHOOL,
                instructorIMG,
                instructorDATEADDED
            ) VALUES(
                '$name',
                '$auth',
                '$auth',
                '$contact',
                '$course',
                '$school',
                '$final_filename',
                '$date'
            )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('Instructor.php');alert('Succesfuly Added!');</script>";  
            }
}
if(isset($_POST['updateinstructor']))
        {
            $instructorID = $_POST['instructorID'];
            $section = $_POST['section'];
            $number = $_POST['number'];


            

            $update=mysqli_query($con,"UPDATE instructor SET 
                    instructorSECTIONHANDLE = '$section',
                    instructorNUMBER='$number'
                WHERE 
                    instructorID ='$instructorID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['addstudent']))
        {   
            $studentID=$_POST['studentID'];
            $course=$_POST['course'];
            $school=$_POST['school'];
            
            
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y', time());

            $INSERTSUBJECTS=mysqli_query($con,"INSERT into student ( 
                studentnumber,
                department,
                colleges,
                firstname,
                middlename,
                lastname,
                address,
                picture,
                password,
                classyear,
                status   
            ) VALUES(
                '$studentID',
                '$course',
                '$school',
                'firstname',
                'lastname',
                'middlename',
                'address',
                'null.png',
                '$studentID',
                '$year',
                'active'
            )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('students.php');alert('Succesfuly Added!');</script>";  
            }
}

if(isset($_POST['addonr']))
        {   
            $studentID=$_POST['studentID'];
            $points=$_POST['points'];

            $onr=mysqli_query($con,"SELECT * from ojtnarrativereport where OJTNarrativeReportIDSTUDENTID = '$studentID'")or die(mysqli_error($con));
            $rowonr=mysqli_fetch_object($onr);

            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y', time());

            if (empty($rowonr)) {

                 $INSERTSUBJECTS=mysqli_query($con,"INSERT into ojtnarrativereport ( 
                OJTNarrativeReportIDSTUDENTID,
                OJTNarrativeReportIDPOINTS  
                ) VALUES(
                    '$studentID',
                    '$points'
                )")or die(mysqli_error($con));

                if($INSERTSUBJECTS)
                {
                    echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Succesfuly Added Points!');</script>";  
                }
            }else{

                $delll=mysqli_query($con,"UPDATE ojtnarrativereport SET OJTNarrativeReportIDPOINTS = '$points' WHERE OJTNarrativeReportIDSTUDENTID ='$studentID'");
                if($delll)
                {
                    echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Succesfuly Updated Points!');</script>";  
                }    
            }

           
}
if(isset($_POST['addps']))
        {   
            $studentID=$_POST['studentID'];
            $points=$_POST['points'];

            $onr=mysqli_query($con,"SELECT * from attendanceparticipation where AttendanceParticipationSTUDENTID = '$studentID'")or die(mysqli_error($con));
            $rowonr=mysqli_fetch_object($onr);

            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y', time());

            if (empty($rowonr)) {

                 $INSERTSUBJECTS=mysqli_query($con,"INSERT into attendanceparticipation ( 
                AttendanceParticipationSTUDENTID,
                AttendanceParticipationPOINTS  
                ) VALUES(
                    '$studentID',
                    '$points'
                )")or die(mysqli_error($con));

                if($INSERTSUBJECTS)
                {
                    echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Succesfuly Added Points!');</script>";  
                }
            }else{

                $delll=mysqli_query($con,"UPDATE attendanceparticipation SET AttendanceParticipationPOINTS = '$points' WHERE AttendanceParticipationSTUDENTID ='$studentID'");
                if($delll)
                {
                    echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Succesfuly Updated Points!');</script>";  
                }    
            }

           
}
if(isset($_POST['btnupdateimage']))
        {   
           
           $instructorID=$_POST['instructorID'];
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            if(isset($_FILES["pic"]['name'])&&$_FILES["pic"]['name']!='')
            {
                $fileName = $_FILES["pic"]['name'];
                $tmpName  = $_FILES["pic"]['tmp_name']; 
                $fileSize = $_FILES["pic"]['size'];
                $fileType = $_FILES["pic"]['type'];

                function getExtension($str)
                         {
                             $i = strrpos($str,".");
                             if (!$i) { return ""; }
                             $l = strlen($str) - $i;
                             $ext = substr($str,$i+1,$l);
                             return $ext;
                         }
                    $extension = getExtension($fileName);
                    $extension = strtolower($extension);
                    $final_filename = time().".".$extension;
                    $copied = move_uploaded_file($tmpName, "../assets/img/user/".$final_filename)or die();
            }
            else
            {
                    $final_filename=$_POST['picturea'];
            } 

            $update=mysqli_query($con,"UPDATE instructor set 
                instructorIMG = '$final_filename'
            WHERE 
                instructorID='$instructorID'
            ")or die(mysqli_error($con));
            
            if($update)
            {
                echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Succesfully Image Updated!');</script>";  
            }
}
if(isset($_POST['btnupdatename']))
        {
            $instructorID=$_POST['instructorID'];
            $name = $_POST['name'];
            $update=mysqli_query($con,"UPDATE instructor SET 
                    instructorNAME = '$name'
                WHERE 
                    instructorID ='$instructorID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnsecurityquestions']))
        { 
            $questions=$_POST['questions'];
            $answer=$_POST['answer'];
            $instructorID=$_POST['instructorID'];
            date_default_timezone_set('Asia/Manila');
            $date = date('m/d/Y h:i:s a', time());

            $securityQA=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERID = '$instructorID' and securityquestionsUSERTYPE = 'instructor'")or die(mysqli_error($con));
            $rowsecurityQA=mysqli_fetch_object($securityQA);

            if (empty($rowsecurityQA)) {
                 $add=mysqli_query($con,"INSERT into securityquestions(
                    securityquestionsA,
                    securityquestionsQ,
                    securityquestionsUSERID,
                    securityquestionsUSERTYPE
                ) values(
                    '$answer',
                    '$questions',
                    '$instructorID',
                    'instructor'
                )")or die(mysqli_error($con));

                     if($add)
                            {
                                echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Added Security Questions')</script>";  
                            }

            }else{
                $update=mysqli_query($con,"UPDATE securityquestions SET 
                        securityquestionsA = '$answer',
                        securityquestionsQ = '$questions'
                    WHERE 
                        securityquestionsUSERID ='$instructorID' and securityquestionsUSERTYPE = 'instructor'");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Updated Security Questions!')</script>";  
                    
                    }
            }   
}

if(isset($_POST['btnupdatesecurity']))
        {
            $instructorID = $_POST['instructorID'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $update=mysqli_query($con,"UPDATE instructor SET 
                    instructorUSERNAME = '$password',
                    instructorPASSWORD = '$username'
                WHERE 
                    instructorID ='$instructorID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['forgotpass'])){ 
            $number=$_POST['number'];

            if (!empty($number)) {
                
                echo"<script type='text/javascript'>window.location.replace('forgotpassword.php?number=$number');</script>";
            }else{

                echo"<script type='text/javascript'>window.location.replace('login.php');alert('Error!')</script>";
            }
              
}
if(isset($_POST['resetme'])){ 
            $number=$_POST['number'];
            $answer=$_POST['answer'];
            $instructorID=$_POST['instructorID'];

            $qa=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERTYPE = 'instructor' and securityquestionsUSERID = '$instructorID'")or die(mysqli_error($con));
            $rowqa=mysqli_fetch_object($qa);
            $code=rand();

            if (!empty($rowqa)) {

                if ($rowqa->securityquestionsA == $answer) {

                  $update=mysqli_query($con,"UPDATE instructor SET 
                        code = '$code'
                    WHERE 
                        instructorID ='$instructorID' ");
                    
                 echo"<script type='text/javascript'>window.location.replace('resetpassword.php?instructorID=$instructorID&code=$code');alert('correct!');</script>";

                }else{
                 echo"<script type='text/javascript'>window.location.replace('forgotpassword.php?number=$number');alert('Error!');</script>";   
                }
                
                
            }else{

                echo"<script type='text/javascript'>window.location.replace('forgotpassword.php?number=$number');alert('Error!');</script>";
            }
              
}

if(isset($_POST['resetme2'])){ 
            $pass=$_POST['pass'];
            $code=$_POST['code'];
            $instructorID=$_POST['instructorID'];

          
            if (!empty($pass) || !empty($code)||!empty($instructorID)) {

              

                  $update=mysqli_query($con,"UPDATE instructor SET 
                        password = '$pass'
                    WHERE 
                        instructorID ='$instructorID' and code='$code' ");
                    
                 echo"<script type='text/javascript'>window.location.replace('login.php');alert('Reset Successfully!');</script>";
  
                
            }else{

                echo"<script type='text/javascript'>window.location.replace('login.php');alert('Error!');</script>";
            }
              
}
if(isset($_POST['btnsearch'])){ 
            $Keyword=$_POST['Keyword'];
           

          
            if (!empty($Keyword)) {

                echo"<script type='text/javascript'>window.location.replace('workplacesearch.php?search=$Keyword');</script>";
            }
              
}
if(isset($_POST['btndownload']))
        {
             
            $formID = $_POST['btndownload'];
            
            $sql1 = "SELECT * FROM formupload WHERE formID=$formID";
            $result1 = mysqli_query($con, $sql1);

            $file = mysqli_fetch_assoc($result1);
            $filepath = '../Form/admin/'. $file['formname'];

            if (file_exists($filepath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($filepath));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize('../Form/admin/' . $file['formname']));
                readfile('../Form/admin/' . $file['formname']);

            }

     
         header("location:download.php");
 }

if (isset($_POST['btnupload'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    $name2 = $_POST['name2'];
    $status = $_POST['status'];

    // destination of the file on the server
    $destination = '../Form/admin/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO formupload (formname, size, downloads, details, status) VALUES ('$filename', $size, '0', '$name2','$status')";
            if (mysqli_query($con, $sql)) {
                echo"<script type='text/javascript'>window.location.replace('download.php');alert('Successfully Upload!');</script>";
            }
        } else {
            echo"<script type='text/javascript'>window.location.replace('download.php');alert('Error Found!');</script>";
        }
    }
}
if(isset($_POST['btndelete']))
        {
             
            $formID = $_POST['delete'];
             $sql1=mysqli_query($con,"DELETE FROM formupload WHERE formID='$formID'");
             if ($sql1) {
                echo"<script type='text/javascript'>window.location.replace('download.php');alert('Successfully Delated!');</script>";
            } else {
                echo"<script type='text/javascript'>window.location.replace('download.php');alert('Error Found!');</script>";
        }
            
 }
 if(isset($_POST['btnaddsection']))
        { 
            $name2=$_POST['name2'];
            date_default_timezone_set('Asia/Manila');
            $date = date('m/d/Y h:i:s a', time());

            $section=mysqli_query($con,"SELECT * from section where sectionDes = '$name2'")or die(mysqli_error($con));
            $rowsection=mysqli_fetch_object($section);

            if (empty($rowsection)) {
                 $add=mysqli_query($con,"INSERT into section(
                    sectionDes
                ) values(
                    '$name2'
                )")or die(mysqli_error($con));

                     if($add)
                            {
                                echo"<script type='text/javascript'>window.location.replace('section.php');alert('Successfully Added!')</script>";  
                            }

            }else{
                
                     echo"<script type='text/javascript'>window.location.replace('section.php');alert('Error!, Letter should be capitalize and it should not have any duplicate!')</script>"; 
            }   
}
?>