<?PHP
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/database.php");

function isUsernameExist($username) {
    $query = "SELECT * FROM user WHERE username='" . $username . "'";
    global $mysqli;

    $result = $mysqli->query($query);
    error_log($result, 0);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function isEmailExist($email) {
    $query = "SELECT * FROM user WHERE email='" . $email . "'";
    global $mysqli;

    $result = $mysqli->query($query);
    error_log($result, 0);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

    if(!isset($_POST['method']) || !$method = $_POST['method']) exit;
    if(!isset($_POST['value']) || !$value = $_POST['value']) exit;
    if(!isset($_POST['target']) || !$target = $_POST['target']) exit;

    $passed = false;
    $retval = '';

    switch($method)
    {
        case 'checkUsername':
        if ($value == '') {
            
        }
        break;

        case 'checkEmail':
        // ...
        // set the $retval message, and the $passed variable to true or false
        // ...
        break;

        default: exit;
    }

    include "class.xmlresponse.php";
    $xml = new xmlResponse();
    $xml->start();

    // set the response text
    $xml->command('setcontent',
        array('target' => "rsp_$target", 'content' => htmlentities($retval))
    );

    if($passed) {
        // set the message colour to green and the checkbox to checked

        $xml->command('setstyle',
        array('target' => "rsp_$target", 'property' => 'color', 'value' => 'green')
        );
        $xml->command('setproperty',
        array('target' => "valid_$target", 'property' => 'checked', 'value' => 'true')
        );

    } else {
        // set the message colour to red, the checkbox to unchecked and focus back on the field

        $xml->command('setstyle',
        array('target' => "rsp_$target", 'property' => 'color', 'value' => 'red')
        );
        $xml->command('setproperty',
        array('target' => "valid_$target", 'property' => 'checked', 'value' => 'false')
        );
        $xml->command('focus', array('target' => $target));

    }

    $xml->end();
?>