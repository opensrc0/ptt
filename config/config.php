<?PHP
ini_set('memory_limit', '1G');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ALL); comment out these error reporting for production
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$hostname		=	"localhost";
$username		=	"root";
$password	    =	"s3foxintel";
$database		=	"ptt_gas_db";

$conn = mysqli_connect($hostname, $username, $password, $database);

if( mysqli_connect_error()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
mysqli_character_set_name($conn);

//printf("Initial character set: %s\n",mysqli_character_set_name($conn) );

if (!mysqli_set_charset($conn, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
    exit();
} else {
    // printf("Current character set: %s\n", mysqli_character_set_name($conn));
}

$GLOBALS['conn'] = $conn; 

define('_PROTOCOL', 'http'); /* change http or https according to port */

/* URL & Path */

 /* change root according file system  */
define('_ROOT', "/var/www/html/ptt/");
define('_URL', _PROTOCOL."://".$_SERVER['HTTP_HOST']."/");
?>

