<?

include_once "../lib/Snoopy.class.php";

$snoopy = new Snoopy;

$snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)";
$snoopy->referer = "http://www.kissinfo.co.kr/";
$snoopy->rawHeaders['Content-Type'] = "application/x-www-form-urlencoded";
$snoopy->httpmethod = "POST";

$loginurl = "http://kissinfo.co.kr/bbs/login_check.php";
$logininfo['mb_id'] = "honginfo";
$logininfo['mb_password'] = "0103hh";


$snoopy->submit( $loginurl, $logininfo );
$snoopy->setcookies();


$param   = urldecode($_GET['param']);
$listurl = "http://www.kissinfo.co.kr".$param;


$snoopy->fetch( $listurl );
// $txt = iconv("euc-kr", "utf-8", $snoopy->results );

echo $snoopy->results;

?>