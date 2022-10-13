<?php
// DB credentials.
//include '../config.php';

include_once 'util.php';
class Menu
{
    protected $text;
    protected $sessionId;


    function __construct()
    {
    }



    public function mainMenuRegistered($phoneNumber)
    {
        //shows initial user menu for registered users
        include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $name = $row2["fullname"];
                    $language = $row2["language"];
                }
                 if ($language == 1){
        $response = "Welcome " . $name . " Reply with\n";
        $response .= "1. Send Money\n";
        $response .= "2. Vendor\n";
        $response .= "3. Pay Loan\n";
        $response .= "4. Check Eligibilty Status\n";
        $response .= "5. Check Loan Balance\n";
        $response .= "6. Check Balance\n";
        $response .= "7. Setting\n";
        return $response;
            }elseif ($language == 2){
        $response = "Barka da zuwa " . $name . " Amsa da\n";
        $response .= "1. Aika Kudi\n";
        $response .= "2. Mai sayarwa\n";
        $response .= "3. Biyan Lamuni\n";
        $response .= "4. Duba Matsayin Cancantar\n";
        $response .= "5. Duba Ma'aunin Lamuni\n";
        $response .= "6. Duba Ma'auni\n";
        $response .= "7. Saita\n";
        return $response;
            }elseif ($language == 3){
        $response = "Kaabo " . $name . " Fesi pẹlu\n";
        $response .= "1. Fi Owo ranṣẹ\n";
        $response .= "2. Olutaja\n";
        $response .= "3. Sanwo Awin\n";
        $response .= "4. Ṣayẹwo Ipo Yiyẹ\n";
        $response .= "5. Ṣayẹwo Awin Iwontunws.funfun\n";
        $response .= "6. Ṣayẹwo Iwontunwonsi\n";
        $response .= "7. Eto\n";
        return $response;
            }elseif ($language == 4){
        $response = "Nnọọ " . $name . " Zaa ya na\n";
        $response .= "1. Zipu ego\n";
        $response .= "2. Onye na-ere ahịa\n";
        $response .= "3. Kwụọ mbinye ego\n";
        $response .= "4. Lelee ọkwa ntozu\n";
        $response .= "5. Lelee nha nha mbinye ego\n";
        $response .= "6. Lelee nha nha\n";
        $response .= "7. Ịtọ ntọala\n";
        return $response;
            }
            } else {
                 echo "CON hello".mainMenuUnRegistered($phoneNumber);
            }
           
    }




    public function mainMenuUnRegistered($phoneNumber)
    {
        //shows initial user menu for unregistered users
        $response = "CON Welcome to anjima. Reply with\n";
        $response .= "1. Register\n";
        echo $response;
    }





    public function registerMenu($textArray, $phoneNumber)
    {
        //building menu for user registration 
        $level = count($textArray);
        $response="";
        if ($level == 1) {
            echo "CON Please enter your full name:";
        } else if ($level == 2) {
            echo "CON Please enter set you PIN:";
        } else if ($level == 3) {
            echo "CON Please re-enter your PIN: \n";
        } else if ($level == 4) {
            $response .="CON Please select language: \n";
            $response .="1. English Language \n";
            $response .="2. Hausa Language \n";
            $response .="3. Yoruba Language \n";
            $response .="4. Igbo Language \n";
            echo $response;
        } else if ($level == 5) {
            $name = $textArray[1];
            $pin = $textArray[2];
            $confirmPin = $textArray[3];
            $lang = $textArray[4];
            $date=time();
            if ($pin != $confirmPin) {
                echo "END Your pins do not match. Please try again";
            } else {
                // save to database
                $hashPin = $pin;
                include 'dbconnect.php';
                $insert = $conn->query("INSERT INTO users (fullname, phone, email, pic, pwd, tpin, tier, st, date, language) VALUES ('".$name."', '".$phoneNumber."', '', 'avater.png', '123456', '".$hashPin."', '2', '0', '".$date."', '".$lang."')");
                    $sql2 = $conn->query("INSERT INTO a_wallet (owner, balance, date) VALUES ('".$phoneNumber."', '10000.00','".$date."')");
                    $sql3 = $conn->query("INSERT INTO wallet (owner, balance, date) VALUES ('".$phoneNumber."', '0.00','".$date."')");
                if ($insert === true && $sql2 === true && $sql3 === true) {
                    echo "END You have been registered";
                } else {
                    echo "END Network problem, please try again later";
                }
            }
        }
    }
    
    
    
    
    
    
    
    
     public function Vendor($textArray, $phoneNumber)
    {
        //building menu for user registration 
        $level = count($textArray);
        $response="";
        include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $language = $row2["language"];
                }
        if ($level == 1 AND $language == 1) {
            $response .="CON Select the category of what you want:\n";
            $response .="1. Textiles \n";
            $response .="2. Groceries \n";
            $response .="3. Electronics \n";
            $response .="4. Stationaries \n";
            $response .="5. Cosmetics \n";
            $response .="6. Grains \n";
            $response .="7. Furniture/ Appliance/ Equipment \n";
            $response .="8. Phamaceutical Product \n";
            $response .="9. Computers & Phone Accessories \n";
            echo $response;
        }elseif($level == 1 AND $language == 2) {
            $response .="CON Zaɓi nau'in abin da kuke so:\n";
            $response .="1. Textiles \n";
            $response .="2. Groceries \n";
            $response .="3. Electronics \n";
            $response .="4. Stationaries \n";
            $response .="5. Cosmetics \n";
            $response .="6. Grains \n";
            $response .="7. Furniture/ Appliance/ Equipment \n";
            $response .="8. Phamaceutical Product \n";
            $response .="9. Computers & Phone Accessories \n";
            echo $response;
        }elseif($level == 1 AND $language == 3) {
            $response .="CON Yan ẹka ohun ti o fẹ:\n";
            $response .="1. Textiles \n";
            $response .="2. Groceries \n";
            $response .="3. Electronics \n";
            $response .="4. Stationaries \n";
            $response .="5. Cosmetics \n";
            $response .="6. Grains \n";
            $response .="7. Furniture/ Appliance/ Equipment \n";
            $response .="8. Phamaceutical Product \n";
            $response .="9. Computers & Phone Accessories \n";
            echo $response;
        }elseif($level == 1 AND $language == 4) {
            $response .="CON Họrọ udi nke ihe ị chọrọ:\n";
            $response .="1. Textiles \n";
            $response .="2. Groceries \n";
            $response .="3. Electronics \n";
            $response .="4. Stationaries \n";
            $response .="5. Cosmetics \n";
            $response .="6. Grains \n";
            $response .="7. Furniture/ Appliance/ Equipment \n";
            $response .="8. Phamaceutical Product \n";
            $response .="9. Computers & Phone Accessories \n";
            echo $response;
        }elseif ($level == 2 AND $language == 1) {
            echo "CON Your State:";
        }elseif ($level == 2 AND $language == 2) {
            echo "CON Jihar ku:";
        }elseif ($level == 2 AND $language == 3) {
            echo "CON Ipinle rẹ:";
        }elseif ($level == 2 AND $language == 4) {
            echo "CON Obodo gị:";
        }elseif ($level == 3 AND $language == 1) {
            echo "END You would reveived an sms of the details of nearby vendors";
        }elseif ($level == 3 AND $language == 2) {
            echo "END Za ku sake dawo da sakon SMS na cikakkun bayanai na masu siyar da ke kusa";
        }elseif ($level == 3 AND $language == 3) {
            echo "END Iwọ yoo ṣe afihan SMS ti awọn alaye ti awọn olutaja nitosi";
        }elseif ($level == 3 AND $language == 4) {
            echo "END Ị ga-enwetaghachi SMS nkọwa nke ndị na-ere ahịa dị nso";
        }
    }
}












public function SendMoney($textArray, $phoneNumber)
    {
        //building menu for user registration 
        $level = count($textArray);
        $response="";
        include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $language = $row2["language"];
                }
        if ($level == 1 AND $language == 1) {
            echo "CON Enter receiver's phone number:";
        }elseif($level == 1 AND $language == 2) {
            echo "CON Shigar da lambar wayar mai karɓa:";
        }elseif($level == 1 AND $language == 3) {
            echo "CON Tẹ nọmba foonu olugba wọle:";
        }elseif($level == 1 AND $language == 4) {
            echo "CON Tinye nọmba ekwentị nnata:";
        }elseif($level == 2){
            $receiver = $textArray[1];
            $receiver=ltrim($receiver, "+2340");
            $receiver="+234".$receiver;
            
            if($receiver === $phoneNumber AND $language == 1){
               echo "END You cannot send money to yourself"; 
            }elseif($receiver === $phoneNumber AND $language == 2){
               echo "END Ba za ku iya aika kuɗi zuwa kanku ba"; 
            }elseif($receiver === $phoneNumber AND $language == 3){
               echo "END O ko le fi owo ranṣẹ si ara rẹ"; 
            }elseif($receiver === $phoneNumber AND $language == 4){
               echo "END Ị nweghị ike izipu onwe gị ego"; 
            }elseif($language == 1){
                echo "CON Enter amount";
            }elseif($language == 2){
                echo "CON Shigar da adadin";
            }elseif($language == 3){
                echo "CON Tẹ iye sii";
            }elseif($language == 4){
                echo "CON Tinye ego";
            }
        }elseif($level == 3){
            $phone=$textArray[1];
            $phone=ltrim($phone, "+2340");
            $receiverMobile="+234".$phone;
            include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$receiverMobile' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $receiverName = $row2["fullname"];
                }
            }
            $user = "SELECT * FROM vendors WHERE phone='$receiverMobile' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $receiverName = $row2["fullname"];
                }
            }
            if($receiverName !== ""){
            if($language == 1){
                $response .= "CON You are about to send " . $textArray[2] . " to " . $receiverName . "\n";
                $response .= "1. Confirm\n";
                $response .= "2. Cancel\n";
                echo $response;
            }elseif($language == 2){
                $response .= "CON Kuna gab da aika " . $textArray[2] . " zuwa " . $receiverName . "\n";
                $response .= "1. Tabbatar\n";
                $response .= "2. Soke\n";
                echo $response;
            }elseif($language == 3){
                $response .= "CON O ti fẹ fi " . $textArray[2] . " ranse si " . $receiverName . "\n";
                $response .= "1. Jẹrisi\n";
                $response .= "2. Fagilee\n";
                echo $response;
            }elseif($language == 4){
                $response .= "CON Ị na-achọ iziga " . $textArray[2] . " ka " . $receiverName . "\n";
                $response .= "1. Kwenye\n";
                $response .= "2. Kagbuo\n";
                echo $response;
            }
            }elseif($language == 1){
                echo "END The reciever's phone number is not registered";
            }elseif($language == 2){
                echo "END Ba a yiwa lambar wayar mai karɓa rajista ba";
            }elseif($language == 3){
                echo "END Nọmba foonu olugba ko forukọsilẹ";
            }elseif($language == 4){
                echo "END Edebanyeghị aha nọmba ekwentị onye nnata ahụ";
            }
        }elseif($level == 4 AND $textArray[3] == 1 AND $language == 1){
            echo "CON Enter your pin";
        }elseif($level == 4 AND $textArray[3] == 1 AND $language == 2){
            echo "CON Shigar da fil ɗin ku";
        }elseif($level == 4 AND $textArray[3] == 1 AND $language == 3){
            echo "CON Tẹ PIN rẹ sii";
        }elseif($level == 4 AND $textArray[3] == 1 AND $language == 4){
            echo "CON Tinye ntụtụ gị";
        }elseif($level == 4 AND $textArray[3] == 2 AND $language == 1){
            echo "END Transfer not successful";
        }elseif($level == 4 AND $textArray[3] == 2 AND $language == 2){
            echo "END Canja wurin bai yi nasara ba";
        }elseif($level == 4 AND $textArray[3] == 2 AND $language == 3){
            echo "END Gbigbe ko ṣaṣeyọri";
        }elseif($level == 4 AND $textArray[3] == 2 AND $language == 4){
            echo "END Nyefe agaghị aga nke ọma";
        }elseif($level == 5 AND $textArray[3] == 1){
            include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $pin = $row2["tpin"];
                }
                $hash=$textArray[4];
                if ($hash !== $pin AND $language == 1){
                    echo "END Incorrect Pin";
                }elseif ($hash !== $pin AND $language == 4){
                    echo "END Ntụtụ ezighi ezi";
                }elseif ($hash !== $pin AND $language == 2){
                    echo "END Pin ɗin da ba daidai ba";
                }elseif ($hash !== $pin AND $language == 3){
                    echo "END Pin ti ko tọ";
                }else{
                   include 'dbconnect.php';            
                    $balance = "SELECT * FROM wallet WHERE owner='$phoneNumber' ";
                    $result = $conn->query($balance);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $mybal = $row["balance"];
                        }
                        if($textArray[2] > $mybal AND $language == 1){
                            echo "END Insufficient Balance";
                        }elseif($textArray[2] > $mybal AND $language == 2){
                            echo "END Rashin Isasshen Ma'auni";
                        }elseif($textArray[2] > $mybal AND $language == 3){
                            echo "END Aini iwọntunwọnsi";
                        }elseif($textArray[2] > $mybal AND $language == 4){
                            echo "END Ntụle ezughi oke";
                        }else{
                            $phone=$textArray[1];
                            $phone=ltrim($phone, "+2340");
                            $receiverMobile="+234".$phone;
                            $newsbal=$mybal-$textArray[2];
                            
                            
                            include 'dbconnect.php';            
                            $balances = "SELECT * FROM wallet WHERE owner='$receiverMobile' ";
                            $results = $conn->query($balances);
                            if ($results->num_rows > 0) {
                            while($rows = $results->fetch_assoc()) {
                            $rbal = $rows["balance"];
                        }}            
                            $details = "SELECT * FROM users WHERE phone='$receiverMobile' ";
                            $resultss = $conn->query($details);
                            if ($resultss->num_rows > 0) {
                            while($rowss = $resultss->fetch_assoc()) {
                            $rname = $rowss["fullname"];
                            }
                        }
                        $details = "SELECT * FROM vendors WHERE phone='$receiverMobile' ";
                            $resultss = $conn->query($details);
                            if ($resultss->num_rows > 0) {
                            while($rowss = $resultss->fetch_assoc()) {
                            $rname = $rowss["fullname"];
                            }
                        }
                        $newrbal=$rbal+$textArray[2];
                        $date=time();
                        $refid="T".date("Y_M_D_His_").rand(01111,99999);
                            $update = $conn->query("UPDATE wallet SET balance='$newsbal' WHERE owner='$phoneNumber' ");
                            $update2 = $conn->query("UPDATE wallet SET balance='$newrbal' WHERE owner='$receiverMobile' ");
                            $save = $conn->query("INSERT INTO transfer (tto,tfrom,tdesc,tamt,ref_id,date) VALUES ('" . $receiverMobile . "','" . $phoneNumber . "','','" . $textArray[2] . "','".$refid."','" . $date . "')");
                            if ($update === TRUE AND $update2 === TRUE && $save === TRUE AND $language == 1) {
                                echo "END You have successfully send " . $textArray[2] . " to ".$rname." ";
                            }elseif ($update === TRUE AND $update2 === TRUE && $save === TRUE AND $language == 4) {
                                echo "END izipula nke ọma " . $textArray[2] . " ka ".$rname." ";
                            }elseif ($update === TRUE AND $update2 === TRUE && $save === TRUE AND $language == 2) {
                                echo "END Kun yi nasarar aika " . $textArray[2] . " zuwa ".$rname." ";
                            }elseif ($update === TRUE AND $update2 === TRUE && $save === TRUE AND $language == 3) {
                                echo "END O ti se aṣeyọri lati fi" . $textArray[2] . " ranse si ".$rname." ";
                            }else{
                                echo "END Error";
                            }
                        }
                    }
                }
            }
        }
    }
}
    
    

    
    
  
  
  
  public function CheckBal($textArray, $phoneNumber)
    {
        include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $Name = $row2["fullname"];
                    $language = $row2['language'];
                }
        $level = count($textArray);
        $response = "";
        if ($level == 1 AND $language == 1) {
                include 'dbconnect.php';
                $query1 = "SELECT * FROM users WHERE phone='$phoneNumber'";
                $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                $count1 = mysqli_num_rows($result1);
                if ($count1 == 0) {
                echo "END This number has not been registered";
                } 
                echo "CON Enter your pin:";
                }else if ($level == 1 AND $language == 2){
                echo "CON Saka Mukulin Sirin Ka:";
                }else if ($level == 1 AND $language == 3){
                echo "CON tẹ pinni rẹ sii:";
                }else if ($level == 1 AND $language == 4){
                echo "CON Tinye ntụtụ gị:";
                } else if ($level == 2 AND $language == 1) {
            $pin = $textArray[1];
            
            include 'dbconnect.php';
            $bal = "SELECT * FROM users WHERE phone='$phoneNumber'";
            $result = $conn->query($bal);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $tpin = $row["tpin"];
                }
            }
            if($tpin !== $pin){
                echo "END Incorrect Pin";
            }else{
                
        include 'dbconnect.php';
            $bal = "SELECT * FROM wallet WHERE owner='$phoneNumber'";
            $result = $conn->query($bal);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $balance = $row["balance"];
                }
                $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                if($language == 1){
                echo "END your balance is: ",$formatter->formatCurrency($balance, 'NGN'), PHP_EOL;
                }elseif($language == 2){
                echo "END ma'aunin ku shine: ",$formatter->formatCurrency($balance, 'NGN'), PHP_EOL;
                }elseif($language == 3){
                echo "END iwontunwonsi rẹ ni: ",$formatter->formatCurrency($balance, 'NGN'), PHP_EOL;
                }elseif($language == 4){
                echo "END gị itule bụ: ",$formatter->formatCurrency($balance, 'NGN'), PHP_EOL;
                }
        }
                
            }
                
            }
    }
  
    }
    
    
    
    
    
    
    
    public function EligibilityStatus($textArray, $phoneNumber)
    {
        include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $Name = $row2["fullname"];
                    $language = $row2['language'];
                }
        $level = count($textArray);
        $response = "";
        if ($level == 1 AND $language == 1) {
                include 'dbconnect.php';
                $query1 = "SELECT * FROM users WHERE phone='$phoneNumber'";
                $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                $count1 = mysqli_num_rows($result1);
                if ($count1 == 0) {
                echo "END This number has not been registered";
                } 
                echo "CON Enter your pin:";
                }else if ($level == 1 AND $language == 2){
                echo "CON Saka Mukulin Sirin Ka:";
                }else if ($level == 1 AND $language == 3){
                echo "CON tẹ pinni rẹ sii:";
                }else if ($level == 1 AND $language == 4){
                echo "CON Tinye ntụtụ gị:";
                } else if ($level == 2 AND $language == 1) {
            $pin = $textArray[1];
            
            include 'dbconnect.php';
            $bal = "SELECT * FROM users WHERE phone='$phoneNumber'";
            $result = $conn->query($bal);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $tpin = $row["tpin"];
                }
            }
            if($tpin !== $pin){
                echo "END Incorrect Pin";
            }else{
            
            
        include 'dbconnect.php';
            $bal = "SELECT * FROM a_wallet WHERE owner='$phoneNumber'";
            $result = $conn->query($bal);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $balance = $row["balance"];
                }
                $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                echo "END your eligibility status is: ",$formatter->formatCurrency($balance, 'NGN'), PHP_EOL;
        // echo "END".money_format("Your account balance is: %i", $balance);
    }
                
            }
                
            }
    }
  
    }
    
    
    
    
    
    
    
        public function CheckLoanBal($textArray, $phoneNumber)
    {
        include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $Name = $row2["fullname"];
                    $language = $row2['language'];
                }
        $level = count($textArray);
        $response = "";
        if ($level == 1 AND $language == 1) {
                include 'dbconnect.php';
                $query1 = "SELECT * FROM users WHERE phone='$phoneNumber'";
                $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                $count1 = mysqli_num_rows($result1);
                if ($count1 == 0) {
                echo "END This number has not been registered";
                } 
                echo "CON Enter your pin:";
                }else if ($level == 1 AND $language == 2){
                echo "CON Saka Mukulin Sirin Ka:";
                }else if ($level == 1 AND $language == 3){
                echo "CON tẹ pinni rẹ sii:";
                }else if ($level == 1 AND $language == 4){
                echo "CON Tinye ntụtụ gị:";
                } else if ($level == 2 AND $language == 1) {
            $pin = $textArray[1];
            
            include 'dbconnect.php';
            $bal = "SELECT * FROM users WHERE phone='$phoneNumber'";
            $result = $conn->query($bal);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $tpin = $row["tpin"];
                }
            }
            if($tpin !== $pin AND $language == 1){
                echo "END Incorrect Pin";
            }elseif($tpin !== $pin AND $language == 2){
                echo "END Pin ɗin da ba daidai ba";
            }elseif($tpin !== $pin AND $language == 3){
                echo "END Pin ti ko tọ";
            }elseif($tpin !== $pin AND $language == 4){
                echo "END Ntụtụ ezighi ezi";
            }else{
            
            
        include 'dbconnect.php';
            $bal = "SELECT * FROM collected_loans WHERE phone='$phoneNumber'";
            $result = $conn->query($bal);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $balance = $row["amt"];
                }
                $formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);
                echo "END your loan balance is: ",$formatter->formatCurrency($balance, 'NGN'), PHP_EOL;
        // echo "END".money_format("Your account balance is: %i", $balance);
    }elseif($language == 1){
        echo "END You are not owing any loan";
    }elseif($language == 2){
        echo "END Ba ku da wani lamuni";
    }elseif($language == 3){
        echo "END O ko ni gbese eyikeyi awin";
    }elseif($language == 4){
        echo "END Ị naghị akwụ ụgwọ mbinye ego ọ bụla";
    }
                
            }
                
            }
    }
  
    }
    
    
    
    
    
    
     public function PayLoan($textArray, $phoneNumber)
    {
        include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $Name = $row2["fullname"];
                    $language = $row2['language'];
                }
        $level = count($textArray);
        $response = "";
        if ($level == 1 AND $language == 1) {
            echo "CON Enter amount";
        }
    }
  
    }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
    public function setting($textArray, $phoneNumber)
    {
        $level = count($textArray);
        $response = "";
        include 'dbconnect.php';            
            $user = "SELECT * FROM users WHERE phone='$phoneNumber' ";
            $result2 = $conn->query($user);
            if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $Name = $row2["fullname"];
                    $language = $row2['language'];
                }
        if ($level == 1 AND $language == 1){
        $response .= "CON Select Option\n";
        $response .= "1. Change Pin\n";
        $response .= "2. Change Language\n";
        echo "$response";
        }else if ($level == 1 AND $language == 2){
        $response .= "CON Zaɓi Zaɓi\n";
        $response .= "1. Canja Mukullin Sirri\n";
        $response .= "2. Canja Harshe\n";
        echo "$response";
        }else if ($level == 1 AND $language == 3){
        $response .= "CON Yan Aṣayan\n";
        $response .= "1. Parro Pinni re\n";
        $response .= "2. Yi ede pada\n";
        echo "$response";
        }else if ($level == 1 AND $language == 4){
        $response .= "CON Họrọ Nhọrọ\n";
        $response .= "1. Gbanwee pin\n";
        $response .= "2. Gbanwee Asụsụ\n";
        echo "$response";
        }else if ($level == 2 && $textArray[1] == 1 AND $language == 1 ) {
            echo "CON Enter current pin:";
        }else if ($level == 2 && $textArray[1] == 1 AND $language == 2 ) {
            echo "CON Shigar da mukullin sirri na yanzu:";
        }else if ($level == 2 && $textArray[1] == 1 AND $language == 3 ) {
            echo "CON Tẹ pinni ti isiyi sii:";
        }else if ($level == 2 && $textArray[1] == 1 AND $language == 4 ) {
            echo "CON Tinye ntụtụ ugbu a:";
        }else if ($level == 2 && $textArray[1] == 2 AND $language == 1 ) {
        $response .= "CON Select Language\n";
        $response .= "1. English Language\n";
        $response .= "2. Hausa Language\n";
        $response .= "3. Yoruba Language\n";
        $response .= "4. Igbo Language\n";
        echo "$response";
        }else if ($level == 2 && $textArray[1] == 2 AND $language == 2 ) {
        $response .= "CON Zaɓi Harshe\n";
        $response .= "1. English Language\n";
        $response .= "2. Hausa Language\n";
        $response .= "3. Yoruba Language\n";
        $response .= "4. Igbo Language\n";
        echo "$response";
        }else if ($level == 2 && $textArray[1] == 2 AND $language == 3 ) {
        $response .= "CON Yan Ede\n";
        $response .= "1. English Language\n";
        $response .= "2. Hausa Language\n";
        $response .= "3. Yoruba Language\n";
        $response .= "4. Igbo Language\n";
        echo "$response";
        }else if ($level == 2 && $textArray[1] == 2 AND $language == 4 ) {
        $response .= "CON Họrọ Asụsụ\n";
        $response .= "1. English Language\n";
        $response .= "2. Hausa Language\n";
        $response .= "3. Yoruba Language\n";
        $response .= "4. Igbo Language\n";
        echo "$response";
        }else if ($level == 3 && $textArray[1] == 1 AND $language == 1 ) {
            echo "CON Enter your new pin:";
        }else if ($level == 3 && $textArray[1] == 1 AND $language == 2 ) {
            echo "CON Shigar da sabon mukullin sirri:";
        }else if ($level == 3 && $textArray[1] == 1 AND $language == 3 ) {
            echo "CON Tẹ pinni titun sii:";
        }else if ($level == 3 && $textArray[1] == 1 AND $language == 4 ) {
            echo "CON Tinye ntụtụ ọhụrụ:";
        }else if ($level == 3 && $textArray[1] == 2 AND $language == 1 ) {
            $langs = $textArray[2];
            $update = $conn->query("UPDATE users SET language='$langs' WHERE phone='$phoneNumber'");
            if ($update === TRUE AND $language == 1) {
                    echo "END You have successfully changed your language";
                } else {
                 echo "END Network Problem, Try Again Later";   
                }
        }else if ($level == 3 && $textArray[1] == 2 AND $language == 2 ) {
            $langs = $textArray[2];
            $update = $conn->query("UPDATE users SET language='$langs' WHERE phone='$phoneNumber'");
            if ($update === TRUE AND $language == 2) {
                    echo "END Kun yi nasarar canza yaren ku";
                } else {
                 echo "END Network Problem, Try Again Later";   
                }
        }else if ($level == 3 && $textArray[1] == 2 AND $language == 3 ) {
            $langs = $textArray[2];
            $update = $conn->query("UPDATE users SET language='$langs' WHERE phone='$phoneNumber'");
            if ($update === TRUE AND $language == 3) {
                    echo "END O ti yi ede rẹ pada ni aṣeyọri";
                } else {
                 echo "END Network Problem, Try Again Later";   
                }
        }else if ($level == 3 && $textArray[1] == 2 AND $language == 4 ) {
            $langs = $textArray[2];
            $update = $conn->query("UPDATE users SET language='$langs' WHERE phone='$phoneNumber'");
            if ($update === TRUE AND $language == 4) {
                    echo "END Ịgbanwela asụsụ gị nke ọma";
                } else {
                 echo "END Network Problem, Try Again Later";   
                }
        }else if ($level == 4 && $textArray[1] == 1 AND $language == 1 ) {
            echo "CON Confirm your new pin:";
        }else if ($level == 4 && $textArray[1] == 1 AND $language == 2 ) {
            echo "CON Sake shigar da sabon mukullin sirrin:";
        }else if ($level == 4 && $textArray[1] == 1 AND $language == 3 ) {
            echo "CON Tun tẹ pinni tuntun rẹ sii:";
        }else if ($level == 4 && $textArray[1] == 1 AND $language == 4 ) {
            echo "CON tinyekwa ntụtụ ọhụrụ gị:";
        }else if ($level == 5 && $textArray[1] == 1 AND $language == 1 ) {
            $oldpin = $textArray[2];
            $pin = $textArray[3];
            $confirmPin = $textArray[4];
            if ($pin != $confirmPin AND $language == 1) {
                echo "END Your pins do not match. Please try again";  
    } else {
    include 'dbconnect.php';
    
    // check if old pin is correct

    $checkpin = $conn->query("SELECT * from users WHERE phone='$phoneNumber' AND tpin='$oldpin' ");
    if ($checkpin->num_rows > 0) {
    $hashPin = $pin;
    $update = $conn->query("UPDATE users SET tpin='$hashPin' WHERE phone='$phoneNumber'");
            if ($update === TRUE AND $language == 1) {
                    echo "END You have successfully changed your pin";
                }
    } else{
                echo "END Old pin is incorrect ";
            }
        }
    }else if ($level == 5 && $textArray[1] == 1 AND $language == 2 ) {
            $oldpin = $textArray[2];
            $pin = $textArray[3];
            $confirmPin = $textArray[4];
            if ($pin != $confirmPin AND $language == 2) {
                echo "END Mukullan sirrin ku ba su dace ba. Da fatan za a sake gwadawa";  
    } else {
    include 'dbconnect.php';
    
    // check if old pin is correct

    $checkpin = $conn->query("SELECT * from users WHERE phone='$phoneNumber' AND tpin='$oldpin' ");
    if ($checkpin->num_rows > 0) {
    $hashPin = $pin;
    $update = $conn->query("UPDATE users SET tpin='$hashPin' WHERE phone='$phoneNumber'");
            if ($update === TRUE AND $language == 2) {
                    echo "END Kun yi nasarar canza mukullin sirrin ku";
                }
    } else{
                echo "END Tsohon mukullin sirrin ba daidai ba ne ";
            }
        }
    }else if ($level == 5 && $textArray[1] == 1 AND $language == 3 ) {
            $oldpin = $textArray[2];
            $pin = $textArray[3];
            $confirmPin = $textArray[4];
            if ($pin != $confirmPin AND $language == 3) {
                echo "END Awọn pinni rẹ ko baramu. Jọwọ gbiyanju lẹẹkansi";  
    } else {
    include 'dbconnect.php';
    
    // check if old pin is correct

    $checkpin = $conn->query("SELECT * from users WHERE phone='$phoneNumber' AND tpin='$oldpin' ");
    if ($checkpin->num_rows > 0) {
    $hashPin = $pin;
    $update = $conn->query("UPDATE users SET tpin='$hashPin' WHERE phone='$phoneNumber'");
            if ($update === TRUE AND $language == 3) {
                    echo "END O ti yi pinni rẹ pada ni aṣeyọri";
                }
    } else{
                echo "END Pinni atijọ ko tọ ";
            }
        }
    }else if ($level == 5 && $textArray[1] == 1 AND $language == 4 ) {
            $oldpin = $textArray[2];
            $pin = $textArray[3];
            $confirmPin = $textArray[4];
            if ($pin != $confirmPin AND $language == 4) {
                echo "END Ntụtụ gị adabaghị, Biko nwaa ọzọ";  
    } else {
    include 'dbconnect.php';
    
    // check if old pin is correct

    $checkpin = $conn->query("SELECT * from users WHERE phone='$phoneNumber' AND tpin='$oldpin' ");
    if ($checkpin->num_rows > 0) {
    $hashPin = $pin;
    $update = $conn->query("UPDATE users SET tpin='$hashPin' WHERE phone='$phoneNumber'");
            if ($update === TRUE AND $language == 4) {
                    echo "END Ịgbanwela pin gị nke ọma";
                }
    } else{
                echo "END Ntụtụ ochie ezighi ezi ";
            }
        }
    }
}
}
    
    
    public function addCountryCodeToPhoneNumber($phone)
    {
        return Util::$COUNTRY_CODE . substr($phone, 1);
    }}
