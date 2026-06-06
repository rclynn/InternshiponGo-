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
             	agencyLOCATION,
                agencySTATUS
            ) VALUES(
             	'$agencyname',
             	'$coordinator',
             	'$final_filename',
             	'$auth',
             	'$auth',
             	'$contact',
             	'$location',
                'Active'
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
          

            

            $update=mysqli_query($con,"UPDATE instructor SET 
                    instructorSECTIONHANDLE = '$section'
                WHERE 
                    instructorID ='$instructorID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewinstructor.php?instructorID=$instructorID');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnupdateimageadmin']))
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
                echo"<script type='text/javascript'>window.location.replace('viewinstructor.php?instructorID=$instructorID');alert('Succesfully Image Updated!');</script>";  
            }
}
if(isset($_POST['btnupdatenameadmin']))
        {
            $instructorID=$_POST['instructorID'];
            $name = $_POST['name'];
            $update=mysqli_query($con,"UPDATE instructor SET 
                    instructorNAME = '$name'
                WHERE 
                    instructorID ='$instructorID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewinstructor.php?instructorID=$instructorID');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnsecurityquestionsadmin']))
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
                                echo"<script type='text/javascript'>window.location.replace('viewinstructor.php?instructorID=$instructorID');alert('Successfully Added Security Questions')</script>";  
                            }

            }else{
                $update=mysqli_query($con,"UPDATE securityquestions SET 
                        securityquestionsA = '$answer',
                        securityquestionsQ = '$questions'
                    WHERE 
                        securityquestionsUSERID ='$instructorID' and securityquestionsUSERTYPE = 'instructor'");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewinstructor.php?instructorID=$instructorID');alert('Successfully Updated Security Questions!')</script>";  
                    
                    }
            }   
}

if(isset($_POST['btnupdatesecurityadmin']))
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
                
                    echo"<script type='text/javascript'>window.location.replace('viewinstructor.php?instructorID=$instructorID');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnupdateimagecoor']))
        {   
           
           $agencyID=$_POST['agencyID'];
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

            $update=mysqli_query($con,"UPDATE agency set 
                agencyIMG = '$final_filename'
            WHERE 
                agencyID='$agencyID'
            ")or die(mysqli_error($con));
            
            if($update)
            {
                echo"<script type='text/javascript'>window.location.replace('viewcoordinator.php?coordinatorID=$agencyID');alert('Succesfully Image Updated!');</script>";  
            }
}
if(isset($_POST['btnupdatenamecoor']))
        {
            $agencyID=$_POST['agencyID'];
            $name = $_POST['name'];
            $update=mysqli_query($con,"UPDATE agency SET 
                    agencyPERSONEL = '$name'
                WHERE 
                    agencyID ='$agencyID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewcoordinator.php?coordinatorID=$agencyID');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnupdatesecuritycoor']))
        {
            $agencyID = $_POST['agencyID'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $change = date("F d, Y",strtotime($birthdate));

            $update=mysqli_query($con,"UPDATE agency SET 
                    agencyPASSWORD = '$password',
                    agencyUSERNAME = '$username'
                WHERE 
                    agencyID ='$agencyID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewcoordinator.php?coordinatorID=$agencyID');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnsecurityquestionscoor']))
        { 
            $questions=$_POST['questions'];
            $answer=$_POST['answer'];
            $agencyID=$_POST['agencyID'];
            date_default_timezone_set('Asia/Manila');
            $date = date('m/d/Y h:i:s a', time());

            $securityQA=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERID = '$agencyID' and securityquestionsUSERTYPE = 'agency'")or die(mysqli_error($con));
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
                    '$agencyID',
                    'agency'
                )")or die(mysqli_error($con));

                     if($add)
                            {
                                echo"<script type='text/javascript'>window.location.replace('viewcoordinator.php?coordinatorID=$agencyID');alert('Successfully Added Security Questions')</script>";  
                            }

            }else{
                $update=mysqli_query($con,"UPDATE securityquestions SET 
                        securityquestionsA = '$answer',
                        securityquestionsQ = '$questions'
                    WHERE 
                        securityquestionsUSERID ='$agencyID' and securityquestionsUSERTYPE = 'agency'");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewcoordinator.php?coordinatorID=$agencyID');alert('Successfully Updated Security Questions!')</script>";  
                    
                    }
            }   
}

if(isset($_POST['btnupdatejob']))
        {   
            $workID=$_POST['workID'];
            $name=$_POST['name'];
            $Details=$_POST['Details'];
            $Qualifications=$_POST['Qualifications'];
            $Duties=$_POST['Duties'];
            $Status=$_POST['Status'];
            $number=$_POST['number'];
            $option=$_POST['option'];
            $log=$_POST['log'];
            $chk="";  
            foreach($option as $chk1)  
               {  
                  $chk .= $chk1.",";  
               }
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE work SET 
                workNAME = '$name',
                workDETAILS= '$Details',
                workQUALIFICATIONS= '$Qualifications',
                workDUTIES='$Duties',
                workSTATUS='$Status',
                workNUMBER='$number',
                workYEAR='$date',
                workDATE='$year',
                worktags='$chk'
                where workID = '$workID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-primary'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('viewjob.php?workID=$workID');alert('Succesfuly Updated!');</script>";  
            }
}
if(isset($_POST['btndeletejob']))
        {   
            $workID=$_POST['workID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE work SET 
                workSTATUS='Deleted'
                where workID = '$workID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-danger'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('agency.php');alert('Succesfuly Deleted!');</script>";  
            }
}

if(isset($_POST['btndisabledjob']))
        {   
            $workID=$_POST['workID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE work SET 
                workSTATUS='Disabled'
                where workID = '$workID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-warning'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('viewjob.php?workID=$workID');alert('Succesfuly Disabled!');</script>";  
            }
}

if(isset($_POST['btnactivejob']))
        {   
            $workID=$_POST['workID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE work SET 
                workSTATUS='Active'
                where workID = '$workID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-success'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('viewjob.php?workID=$workID');alert('Succesfuly Activited!');</script>";  
            }
}

if(isset($_POST['btnupdateinfo']))
        {
            $studentID = $_POST['studentID'];
            $gender = $_POST['gender'];
            $number = $_POST['number'];
            $birthdate = $_POST['birthdate'];
            $address = $_POST['address'];
            $civilstatus = $_POST['civilstatus'];
            $religion = $_POST['religion'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $change = date("F d, Y",strtotime($birthdate));

            $update=mysqli_query($con,"UPDATE student SET 
                    gender = '$gender',
                    contactnumber = '$number',
                    birthdate = '$change',
                    address='$address',
                    civilstatus = '$civilstatus',
                    religion = '$religion',
                    height = '$height',
                    weight='$weight'
                WHERE 
                    StudentID ='$studentID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Updated!')</script>";  
                
                }
}

if(isset($_POST['btnupdateimage']))
        {   
           
           $studentID=$_POST['studentID'];
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

            $update=mysqli_query($con,"UPDATE student set 
                picture = '$final_filename'
            WHERE 
                studentID='$studentID'
            ")or die(mysqli_error($con));
            
            if($update)
            {
                echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Succesfully Image Updated!');</script>";  
            }
}
if(isset($_POST['btnupdatename']))
        {
            $studentID = $_POST['studentID'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $change = date("F d, Y",strtotime($birthdate));

            $update=mysqli_query($con,"UPDATE student SET 
                    firstname = '$fname',
                    middlename = '$mname',
                    lastname = '$lname'
                WHERE 
                    StudentID ='$studentID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnupdatesecurity']))
        {
            $studentID = $_POST['studentID'];
            $password = $_POST['password'];
            $change = date("F d, Y",strtotime($birthdate));

            $update=mysqli_query($con,"UPDATE student SET 
                    password = '$password'
                WHERE 
                    StudentID ='$studentID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnsecurityquestions']))
        { 
            $questions=$_POST['questions'];
            $answer=$_POST['answer'];
            $studentID=$_POST['studentID'];
            date_default_timezone_set('Asia/Manila');
            $date = date('m/d/Y h:i:s a', time());

            $securityQA=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERID = '$studentID' and securityquestionsUSERTYPE = 'student'")or die(mysqli_error($con));
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
                    '$studentID',
                    'student'
                )")or die(mysqli_error($con));

                     if($add)
                            {
                                echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Added Security Questions')</script>";  
                            }

            }else{
                $update=mysqli_query($con,"UPDATE securityquestions SET 
                        securityquestionsA = '$answer',
                        securityquestionsQ = '$questions'
                    WHERE 
                        securityquestionsUSERID ='$studentID' and securityquestionsUSERTYPE = 'student'");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Updated Security Questions!')</script>";  
                    
                    }
            }   
}
if(isset($_POST['btnWorkExperience']))
        { 
            $date=$_POST['date'];
            $employer=$_POST['employer'];
            $position=$_POST['position'];
            $studentID=$_POST['studentID'];

            $workexperience=mysqli_query($con,"SELECT * from workexperience")or die(mysqli_error($con));
            $rowworkexperience= mysqli_num_rows( $workexperience );
            $rowworkexperienceplus = $rowworkexperience+1;
            $text='workexperience'.$rowworkexperienceplus;
           
                 $add=mysqli_query($con,"INSERT into workexperience(
                    workexperienceINCLUSIVEDATE,
                    workexperienceEMPLOYER,
                    workexperiencePOSITION,
                    workexperienceSTUDENTID,
                    workexperienceACTION
                ) values(
                    '$date',
                    '$employer',
                    '$position',
                    '$studentID',
                    '$text'

                )")or die(mysqli_error($con));

                     if($add)
                            {
                                echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Added Work Experience!')</script>";  
                            }           
}
if(isset($_POST['btnupdateworkexperience'])){ 

            $date=$_POST['date'];
            $employer=$_POST['employer'];
            $position=$_POST['position'];
            $workexperienceID=$_POST['workexperienceID'];

                $update=mysqli_query($con,"UPDATE workexperience SET 
                        workexperienceINCLUSIVEDATE = '$date',
                        workexperienceEMPLOYER = '$employer',
                        workexperiencePOSITION = '$position'
                    WHERE 
                        workexperienceID ='$workexperienceID' ");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Updated Work Experience!')</script>";  
                    
                    }
             
}

if(isset($_POST['btndeleteworkexperience'])){ 


            $workexperienceID=$_POST['workexperienceID'];

                $update=mysqli_query($con,"DELETE FROM workexperience
                    WHERE 
                        workexperienceID ='$workexperienceID' ");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Deleted Work Experience!')</script>";  
                    
                    }
             
}

if(isset($_POST['btntrainings']))
        { 
            $date=$_POST['date'];
            $title=$_POST['title'];
            $studentID=$_POST['studentID'];

            $trainingscount=mysqli_query($con,"SELECT * from trainings")or die(mysqli_error($con));
            $rowtrainingscount= mysqli_num_rows( $trainingscount );
            $rowtrainingscountplus = $rowtrainingscount+1;
            $text='trainings'.$rowtrainingscountplus;
           
                 $add=mysqli_query($con,"INSERT into trainings(
                    trainingsINCLUSIVEDATE,
                    trainingsTITLE,
                    trainingsSTUDENTID,
                    trainingsACTION
                ) values(
                    '$date',
                    '$title',
                    '$studentID',
                    '$text'

                )")or die(mysqli_error($con));

                     if($add)
                            {
                                echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Added Trainings & Seminar!')</script>";  
                            }           
}
if(isset($_POST['btnupdatetrainings']))
        { 
            $date=$_POST['date'];
            $title=$_POST['title'];
            $trainingsID=$_POST['trainingsID'];

                $update=mysqli_query($con,"UPDATE trainings SET 
                        trainingsINCLUSIVEDATE = '$date',
                        trainingsTITLE = '$title'
                    WHERE 
                        trainingsID ='$trainingsID' ");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Updated Trainings & Seminar!')</script>";  
                    
                    }
                    
} 

if(isset($_POST['btndeletetrainings'])){ 


            $trainingsID=$_POST['trainingsID'];

                $update=mysqli_query($con,"DELETE FROM trainings
                    WHERE 
                        trainingsID ='$trainingsID' ");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Deleted Trainings & Seminar!')</script>";  
                    
                    }
             
} 
if(isset($_POST['btneducationalbackground']))
        { 
            $elevel=$_POST['elevel'];
            $edate=$_POST['edate'];
            $eschool=$_POST['eschool'];
            $hlevel=$_POST['hlevel'];
            $hdate=$_POST['hdate'];
            $hschool=$_POST['hschool'];
            $clevel=$_POST['clevel'];
            $cdate=$_POST['cdate'];
            $cschool=$_POST['cschool'];
            $extra=$_POST['extra'];
            $studentID=$_POST['studentID'];
            date_default_timezone_set('Asia/Manila');
            $date = date('m/d/Y h:i:s a', time());

            $securityQA=mysqli_query($con,"SELECT * from educationalbackground where studentID = '$studentID'")or die(mysqli_error($con));
            $rowsecurityQA=mysqli_fetch_object($securityQA);

            if (empty($rowsecurityQA)) {
                 $add=mysqli_query($con,"INSERT into educationalbackground(
                    elementaryLEVEL,
                    elementarySCHOOL,
                    elementaryDATE,
                    hightschoolLEVEL,
                    hightschoolSCHOOL,
                    hightschoolDATE,
                    collegeLEVEL,
                    collegeSCHOOL,
                    collegeDATE,
                    studentID,
                    extracirricular
                ) values(
                    '$elevel',
                    '$eschool',
                    '$edate',
                    '$hlevel',
                    '$hschool',
                    '$hdate',
                    '$clevel',
                    '$cschool',
                    '$cdate',
                    '$studentID',
                    '$extra'
                )")or die(mysqli_error($con));

                     if($add)
                            {
                                echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Added Educational Background!')</script>";  
                            }

            }else{
                $update=mysqli_query($con,"UPDATE educationalbackground SET 
                        elementaryLEVEL = '$elevel',
                        elementarySCHOOL= '$eschool',
                        elementaryDATE= '$edate',
                        hightschoolLEVEL= '$hlevel',
                        hightschoolSCHOOL= '$hschool',
                        hightschoolDATE= '$hdate',
                        collegeLEVEL= '$clevel',
                        collegeSCHOOL= '$cschool',
                        collegeDATE= '$cdate',
                        extracirricular= '$extra'
                    WHERE 
                        studentID ='$studentID' ");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Successfully Updated Educational Background!')</script>";  
                    
                    }
            }   
} 

if(isset($_POST['btndeleteagency']))
        {   
            $agencyID=$_POST['agencyID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE agency SET 
                agencySTATUS='Deleted'
                where agencyID = '$agencyID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-danger'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('coordinator.php');alert('Succesfuly Deleted!');</script>";  
            }
}

if(isset($_POST['btndisabledagency']))
        {   
             $agencyID=$_POST['agencyID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE agency SET 
                agencySTATUS='Disabled'
                where agencyID = '$agencyID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-warning'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('viewcoordinator.php?coordinatorID=$agencyID');alert('Succesfuly Disabled!');</script>";  
            }
}
if(isset($_POST['btnactiveagency']))
        {   
             $agencyID=$_POST['agencyID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE agency SET 
                agencySTATUS='Active'
                where agencyID = '$agencyID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-success'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('viewcoordinator.php?coordinatorID=$agencyID');alert('Succesfuly Activiting!');</script>";  
            }
}

if(isset($_POST['btndeletestudent']))
        {   
            $studentID=$_POST['StudentID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE student SET 
                status='Deleted'
                where StudentID = '$studentID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-danger'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('students.php');alert('Succesfuly Deleted!');</script>";  
            }
}

if(isset($_POST['btndisabledstudent']))
        {   
             $studentID=$_POST['StudentID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE student SET 
                status='Disabled'
                where StudentID = '$studentID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-warning'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Succesfuly Disabled!');</script>";  
            }
}
if(isset($_POST['btnactivestudent']))
        {   
             $studentID=$_POST['StudentID'];
            $log=$_POST['log'];
           
            date_default_timezone_set('Asia/Manila');
            $date = date('F d, Y', time());
            $year = date('Y');

            $INSERTSUBJECTS=mysqli_query($con,"UPDATE student SET 
                status='Active'
                where StudentID = '$studentID'    
            ")or die(mysqli_error($con));

            $add=mysqli_query($con,"INSERT into historylog(
                    historylogINFO,
                    historylogDATE,
                    loghistoryCOLOR
                ) values(
                    '$log',
                    '$date',
                    'text-success'
                )")or die(mysqli_error($con));

            if($INSERTSUBJECTS)
            {
                echo"<script type='text/javascript'>window.location.replace('viewstudents.php?studentID=$studentID');alert('Succesfuly Activiting!');</script>";  
            }
}
if(isset($_POST['btnupdatemyimage']))
        {   
           
           $adminID=$_POST['adminID'];
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

            $update=mysqli_query($con,"UPDATE admin set 
                adminIMG = '$final_filename'
            WHERE 
                adminID='$adminID'
            ")or die(mysqli_error($con));
            
            if($update)
            {
                echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Succesfully Image Updated!');</script>";  
            }
}
if(isset($_POST['btnupdatemyname']))
        {
            $adminID=$_POST['adminID'];
            $name = $_POST['name'];
            $update=mysqli_query($con,"UPDATE admin SET 
                    adminNAME = '$name'
                WHERE 
                    adminID ='$adminID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Updated!')</script>";  
                
                }
}
if(isset($_POST['btnmysecurityquestions']))
        { 
            $questions=$_POST['questions'];
            $answer=$_POST['answer'];
            $adminID=$_POST['adminID'];
            date_default_timezone_set('Asia/Manila');
            $date = date('m/d/Y h:i:s a', time());

            $securityQA=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERID = '$adminID' and securityquestionsUSERTYPE = 'admin'")or die(mysqli_error($con));
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
                    '$adminID',
                    'admin'
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
                        securityquestionsUSERID ='$adminID' and securityquestionsUSERTYPE = 'admin'");

                if($update)
                    {
                    
                        echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Updated Security Questions!')</script>";  
                    
                    }
            }   
}

if(isset($_POST['btnupdatemysecurity']))
        {
            $adminID = $_POST['adminID'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $change = date("F d, Y",strtotime($birthdate));

            $update=mysqli_query($con,"UPDATE admin SET 
                    adminUSERNAME = '$username',
                    adminPASSWORD = '$password'
                WHERE 
                    adminID ='$adminID'  ");

            if($update)
                {
                
                    echo"<script type='text/javascript'>window.location.replace('viewprofile.php');alert('Successfully Updated!')</script>";  
                
                }
}

if(isset($_POST['updatemyinfo']))
        {
            $adminID = $_POST['adminID'];
            $email = $_POST['email'];
            $number = $_POST['number'];


            

            $update=mysqli_query($con,"UPDATE admin SET 
                    adminNUMBER = '$number',
                    adminEMAIL='$email'
                WHERE 
                    adminID ='$adminID'  ");

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
            $adminID=$_POST['adminID'];

            $qa=mysqli_query($con,"SELECT * from securityquestions where securityquestionsUSERTYPE = 'admin' and securityquestionsUSERID = '$adminID'")or die(mysqli_error($con));
            $rowqa=mysqli_fetch_object($qa);
            $code=rand();

            if (!empty($rowqa)) {

                if ($rowqa->securityquestionsA == $answer) {

                  $update=mysqli_query($con,"UPDATE admin SET 
                        code = '$code'
                    WHERE 
                        adminID ='$adminID' ");
                    
                 echo"<script type='text/javascript'>window.location.replace('resetpassword.php?adminID=$adminID&code=$code');alert('correct!');</script>";

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
            $adminID=$_POST['adminID'];

          
            if (!empty($pass) || !empty($code)||!empty($adminID)) {

              

                  $update=mysqli_query($con,"UPDATE admin SET 
                        agencyPASSWORD = '$pass'
                    WHERE 
                        adminID ='$adminID' and code='$code' ");
                    
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
?>
