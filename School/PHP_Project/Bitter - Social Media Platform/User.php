<?php
class User {
    //private $userId;
    private $userName;
    private $password;
    private $firstName;
    private $lastName;
    private $address;
    private $province;
    private $postalCode;
    private $contactNo;
    private $email;
    //private $dateAdded;
    //private $profImage;
    private $location;
    private $description;
    private $url;
    private $hash;
    
    //getter
    public function __get($prop) {
        return $this -> $prop;
    }
    //setter
    public function __set($prop, $value) {
        $this -> $prop = $value;
    }
    //constructor
    public function __construct($userName, $password, $firstName, $lastName, $address, $province, 
            $postalCode, $contactNo, $email, $location, $description, $url, $hash) {
        $this->address = $address;
        $this->contactNo = $contactNo;
        //$this->dateAdded = $dateAdded;
        $this->description = $description;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->location = $location;
        $this->password = $password;
        $this->postalCode = $postalCode;
        //$this->profImage = $profImage;
        $this->province = $province;
        $this->url = $url;
        //$this->userId = $userId;
        $this->userName = $userName;
        $this->hash = $hash;
    }
    //destructor
    public function __destruct() {
//        echo "Object destroyed<BR>";
    }
    
    public static function InsertUser($user) {
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql_u = "SELECT screen_name FROM users WHERE screen_name='$user->userName'";
        $sql_e = "SELECT email FROM users WHERE email='$user->email'";
        $res_u = mysqli_query($con, $sql_u); $res_e = mysqli_query($con, $sql_e);
        $default = "Images/profilepics/default.jfif";

        if (mysqli_num_rows($res_u) > 0) {
              $message = "Sorry... username already taken! Please try again";
              header("location:Signup.php?message=$message"); 

            }else if(mysqli_num_rows($res_e) > 0){
              $message = "Sorry... email already taken! Please try again"; 	
              header("location:Signup.php?message=$message");
            }else{ $sql = "INSERT INTO users (first_name, last_name, screen_name, password, address, province, postal_code, contact_number"
                        . ", email, url, description, location, profile_pic) VALUES ('$user->firstName', '$user->lastName', '$user->userName', '$user->hash', '$user->address', "
                        . "'$user->province', '$user->postalCode', '$user->phone', '$user->email', '$user->url', '$user->description', '$user->location', '$default')";

            $insert = mysqli_query($con, $sql);
                if(mysqli_affected_rows($con) == 1){
                    $message = "Account created successfully";
                    header("location:login.php?message=$message");
                }else{
                    $message = "Error! Please try again!";
                    header("location:Signup.php?message=$message");}}}//end of InsertUser()
                
    public static function Login($username, $password) {
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "SELECT user_id, first_name, last_name, password FROM users WHERE screen_name = '$username'";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) ===1) {
            $sesh = mysqli_fetch_assoc($query);
            $_SESSION["SESS_MEMBER_ID"] = $sesh["user_id"];
            $_SESSION["SESS_FIRST_NAME"] = $sesh["first_name"];
            $_SESSION["SESS_LAST_NAME"] = $sesh["last_name"];
            $pass = $sesh["password"];

            if(password_verify($password, $pass)) { 
                $message = "Login Successful. Get Trolling!";        
                header("location: index.php?message=$message");
            }else{
                $message = "Login Failed - Please Check Username and Password";
                header("location: login.php?message=$message");
            }
        }
        
    }//end of Login()
    
    public static function UploadPic($sess) {
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $file = $_FILES['pic']['tmp_name'];
        
        if(is_uploaded_file($file)) {
            move_uploaded_file($_FILES['pic']['tmp_name'], "Images/profilepics/" . $sess . ".png" );
            $_SESSION["pic"] = "Images/profilepics/" . $sess . ".png";
            $directory = "Images/profilepics/" . $sess . ".png";
            $sqlpic = "UPDATE users SET profile_pic = ('$directory') WHERE user_id = '$sess'";
            mysqli_query($con, $sqlpic);

            if(mysqli_affected_rows($con) == 1){
                   $message = "Photo successfully uploaded";
                   header("location:index.php?message=$message");
                } else {
                $message = "Profile pic has been changed!";
                header("location:index.php?message=$message");
            }   
        }
    }//end of UploadPic()
    public static function FollowUser($fromID, $toID) {
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "INSERT INTO follows (from_id, to_id) VALUES ('$fromID', '$toID')";

        mysqli_query($con, $sql);
   
        if(mysqli_affected_rows($con) == 1){

           $message = "You are now following this user";
           header("location:index.php?message=$message");
        } else {
            $message = "Error! Could not follow this user";
            header("location:index.php?message=$message");
        }
    }
    public static function FollowersYouKnow($login_id, $user_id) {
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "select user_id, first_name, last_name, screen_name, profile_pic, province, date_created from users "
                ."where users.user_id in (select user_id from follows where from_id = '$login_id'and user_id !='$login_id') "
                ."and user_id in (select user_id from follows where from_id = '$user_id' and user_id !='$user_id') ORDER BY RAND() LIMIT 3";
        
        if ($query = mysqli_query($con, $sql)) {
            while($row = mysqli_fetch_array($query)) {
                echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].
                        '&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].'"> <img class="border" src ="'.$row["profile_pic"].'" width="60" height="60">' . " " . 
                substr(($row["first_name"] . " " . $row["last_name"] . " @" . $row["screen_name"]),0,22).'</a><BR><BR>';
                }
        }
    }
    public static function UserSearch($search) {
        $sql = "SELECT * FROM users";
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
            $searchFirstName = strtolower($row['first_name']);
            $searchLastName = strtolower($row['last_name']);
            $searchScreenName = strtolower($row['screen_name']);
            $letters = $searchFirstName.$searchLastName.$searchScreenName;
            if($searchFirstName == $search || $searchLastName == $search || $searchScreenName == $search || strpos($letters, $search))  {
                echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].
                        '&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].    '"> <img class="border" src ="'.$row["profile_pic"].'" width="60" height="60"/>' . " " . 
                        $row['first_name'] . " " . $row['last_name'] . " @" . $row['screen_name'] .'</a>'
                        .'      <a href="follow_proc.php?user_id='.$row["user_id"].'"id=button class="followbutton"> FOLLOW</a>'.'<BR><BR>';
                }
            }
        }
    public static function FollowingStats($user_id){
        $following = 0;
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "SELECT * FROM follows";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
           if($row['from_id'] == $user_id){
               $following += 1;
           }
        }
        return $following;
    }
    public static function FollwerStats($user_id){
        $followers = 0;
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "SELECT * FROM follows";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
            if($row['to_id'] == $user_id) {
           $followers +=1;
            }
        }
        return $followers;
    }
    public static function TweetStats($user_id) {
        $tweets = 0;
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $tweetsql = "SELECT * FROM tweets";
        $tweetq = mysqli_query($con, $tweetsql);
        while($qrow = mysqli_fetch_array($tweetq)) {
            if($qrow['user_id'] == $user_id){
                $tweets += 1;
            }
        }
        return $tweets;
    }
    public static function PostalValidate($user) {
        
        $newline = "<br />";
        //Please include and reference in $path_to_wsdl variable.
        $path_to_wsdl = "includes/Fedex/wsdl/CountryService/CountryService_v5.wsdl";

        ini_set("soap.wsdl_cache_enabled", "0");

        $client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

        $request['WebAuthenticationDetail'] = array(
                'ParentCredential' => array(
                        'Key' => getProperty('parentkey'), 
                        'Password' => getProperty('parentpassword')
                ),
                'UserCredential' => array(
                        'Key' => getProperty('key'), 
                        'Password' => getProperty('password')
                )
        );

        $request['ClientDetail'] = array(
                'AccountNumber' => getProperty('shipaccount'), 
                'MeterNumber' => getProperty('meter')
        );
        $request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Validate Postal Code Request using PHP ***');
        $request['Version'] = array(
                'ServiceId' => 'cnty', 
                'Major' => '5', 
                'Intermediate' => '0', 
                'Minor' => '1'
        );

        $request['Address'] = array(
                'PostalCode' => $user->postalCode,
                'CountryCode' => 'CA'
        );

        $request['CarrierCode'] = 'FDXE';


        try {
                $response = $client -> validatePostal($request);

            if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
                echo "Valid Postal";
                $isProv = $response -> PostalDetail -> StateOrProvinceCode;
                echo $isProv;
                $prov = "";
                switch($user->province){
                    case "Alberta":
                        $prov = "AB";
                        break;
                    case "British Columbia":
                        $prov = "BC";
                        break;
                    case "Saskatchewan":
                        $prov = "SK";
                        break;
                    case "Manitoba":
                        $prov = "MB";
                        break;
                    case "Ontario":
                        $prov = "ON";
                        break;
                    case "Quebec":
                        $prov = "QC";
                        break;
                    case "New Brunswick":
                        $prov = "NB";
                        break;
                    case "Prince Edward Island":
                        $prov = "PE";
                        break;
                    case "Nova Scotia":
                        $prov = "NS";
                        break;
                    case "Newfoundland":
                        $prov = "NF";
                        break;
                    case "Northwest Territories":
                        $prov = "NT";
                        break;
                    case "Nunavut":
                        $prov = "NT";
                        break;
                    case "Yukon":
                        $prov = "YT";
                        break; 
                }
                    if($prov == $isProv ){
                        User::InsertUser($user);
                    }
                    else{
                        header("location:Signup.php?message=Province and postal code mismatch, please try again!"); 
                    }
                }else{
                header("location:Signup.php?message=Invalid postal code, please try again!");  
            } 

            writeToLog($client);    // Write to log file   
        } catch (SoapFault $exception) {
           printFault($exception, $client);        
        }

        function printString($spacer, $key, $value){
                if(is_bool($value)){
                        if($value)$value='true';
                        else $value='false';
                }
                echo '<tr><td>'.$spacer. $key .'</td><td>'.$value.'</td></tr>';
        }

        function printPostalDetails($details, $spacer){
                foreach($details as $key => $value){
                        if(is_array($value) || is_object($value)){
                        $newSpacer = $spacer. '&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo '<tr><td>'. $spacer . $key.'</td><td>&nbsp;</td></tr>';
                        printPostalDetails($value, $newSpacer);
                }elseif(empty($value)){
                                printString($spacer, $key, $value);
                }else{
                        printString($spacer, $key, $value);
                }
            }
        }
    }
    public static function GetAllMessages($userID) {
        require_once ("connect.php");
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $query = "SELECT messages.from_id, messages.to_id, messages.message_text, messages.date_sent, users.user_id, users.first_name, users.last_name, users.screen_name, "
                . "users.province, users.date_created, users.profile_pic FROM messages INNER JOIN users ON users.user_id = messages.from_id WHERE to_id = '$userID'";
        $now = new DateTime();
        if($result = mysqli_query($con, $query)) {
            while($row = mysqli_fetch_array($result)) {
                $dateTweeted = $row['date_sent'];
                $tweetTime = new DateTime($dateTweeted);
                $interval = $tweetTime->diff($now);
                echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].'&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].'">'.$row['first_name'] . " " . $row['last_name'] . " @" . $row['screen_name'] . "</a> " ;
                    if ($interval->y > 1) echo $interval->format('%y years') . " ago"; 
                    elseif ($interval->y > 0) echo $interval->format('%y year') . " ago"; 
                    elseif ($interval->m > 1) echo $interval->format('%m months') . " ago"; 
                    elseif ($interval->m > 0) echo $interval->format('%m month') . " ago"; 
                    elseif ($interval->d > 1) echo $interval->format('%d days') . " ago"; 
                    elseif ($interval->d > 0) echo $interval->format('%d day') . " ago"; 
                    elseif ($interval->h > 1) echo $interval->format('%h hours') . " ago"; 
                    elseif ($interval->h > 0) echo $interval->format('%h hour') . " ago"; 
                    elseif ($interval->i > 1) echo $interval->format('%i minutes') . " ago"; 
                    elseif ($interval->i > 0) echo $interval->format('%i minute') . " ago"; 
                    elseif ($interval->s > 1) echo $interval->format('%s seconds') . " ago"; 
                    elseif ($interval->s > 0) echo $interval->format('%s second') . " ago";
                    echo '<BR>'. $row['message_text']. "<BR><BR><HR>";
            }
        }
    }
}//end of User class
    