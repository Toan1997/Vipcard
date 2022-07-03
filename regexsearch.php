<?php
// phpinfo();exit;
error_reporting(E_ALL  ^ E_NOTICE ^ E_WARNING );
echo "<h1>Regex Search</h1>";
echo "Thanks for waiting!<br />";
ob_flush();
flush();
usleep(500);

//exit;
function microtime_float(){
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
$time_start = microtime_float(); // tick count

//File Scanner

$malware_scanner = new MalwareScanner();
echo "itemprop";

$time_end = microtime_float();
$time = $time_end - $time_start;
echo '<br />Time:'.$time;
?>
<?php
/*
    Malware Scanner

*/

class MalwareScanner{
    public $root_dir;
    public $files_type = array('.csv','.phtml');
    public $directories = array();
    public $patterns;
    public $datainfected = 0;
    public $fileinfected = 0;
    public $files_infected = array();

    //File Signature
    public $malPatterns = array(
        "exkl. Steuern"
    );
    public function __construct(){
        /* File scanner */
        echo "<br /><br />FILE SCAN<br />";
        ob_flush();
        flush();
        usleep(200);
        $this->patterns = '('.implode('|', $this->malPatterns).')';
        $this->root_dir = getcwd();
        $this->directories[] = $this->root_dir;
        $dirs= $this->getBaseDir($this->root_dir);
        $this->getSubDir($dirs);
        $this->startScan($this->directories);
        $this->fileReport();
    }

    /* File Scan */

    public function getBaseDir($base_dir){
        $dirs = glob($base_dir.'/*',GLOB_ONLYDIR);
        return $dirs;
    }
    public function getSubDir($dirs){
        foreach($dirs as $dir) {
            $this->directories[] = $dir;
            $sub_dirs = $this->getBaseDir($dir);
            $this->getSubDir($sub_dirs);
        }
    }
    public function startScan(){
        $count = 1;
        foreach($this->directories as $dir){
            foreach($this->files_type as $file_type) {
                $files = glob($dir . '/*'.$file_type);
                if(!empty($files)) {
                    $this->malwareDectect($files);
                    $count++;
                }
            }
        }
        echo $count." files were scanned";
        echo "<br />".$this->fileinfected." file(s) infected <br />";

    }
    public function malwareDectect($files){
        if(is_array($files)){
            foreach($files as $file){
                // $fileTime = new DateTime(date("Y-m-d",filemtime($file)));
                // $checkTime = new DateTime('2019-06-30');
                // if($fileTime>$checkTime){
                //     $this->files_infected[] = $file;
                //     $this->fileinfected += 1;
                // }
                $file_content = file_get_contents($file);
                $numMatches = null;
                $numMatches = preg_match_all('/'.$this->patterns.'/is' , $file_content,$matches);
                if(!empty($numMatches)){
                    $this->files_infected[] = $file;
                    $this->fileinfected += 1;
                }
            }
        }
    }
    public function fileReport(){
        foreach($this->files_infected as $file){
            echo $file."<br />";
        }
    }

}

?>