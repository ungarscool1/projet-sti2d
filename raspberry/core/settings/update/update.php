<?php
/**
 * Created by IntelliJ IDEA.
 * User: leo
 * Date: 31/03/2019
 * Time: 20:29
 */

class update
{
    private $tasksCompleted = 0;
    private $tasks = 0;

    function check() {
        //require '../core.php';
        $version = "0.0.7.15";
        $GLOBALS['need_update'] = false;
        $ch = curl_init("https://sin.ungarscool1.tk/downloads/software/version.php");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        $response = curl_exec($ch);
        $data = json_decode($response);

        if ($data->version == false || $data->version == null) {
            $GLOBALS['need_update'] = false;
            return "Pas d'internet";
        } elseif ($data->version != $version) {
            $GLOBALS['need_update'] = true;
            return $data;
        } else {
            $GLOBALS['need_update'] = false;
            return false;
        }
    }

    function download() {
        // checking
        $check = $this->check();
        $nbrPkgToDL = count($check->packages);
        if ($this->tasks == 0) $this->tasks = 3 + $nbrPkgToDL;
        if ($check == false) return;
        $this->displayProgress();
        // download
        file_put_contents(__DIR__ . "/../../../download/update.zip", fopen($check->url, 'r'));
        $this->displayProgress();
        // calculating hash
        $this->checkIntegrality(__DIR__ . "/../../../download/update.zip", $check->md5);
        $this->displayProgress();

        // Packages

        exec("sudo rm /var/cache/apt/archives/*.deb");
        foreach ($check->packages as $package) {
            exec("sudo apt install -y --download-only " . $package);
            $this->displayProgress();
        }

        echo "<script>loadDivAsync('modalupdate', 'http://127.0.0.1/core/settings/update/views/prepare2upgrade.php')</script>";

        return true;
    }

    function upgrade() {
        $packagesList = array();
        exec("ls /var/cache/apt/archives/ | grep \".deb\"", $packagesList);
        if ($this->tasks == 0) $this->tasks = 6 + (count($packagesList) * 2);
        $zip = new ZipArchive();
        $this->displayProgress();
        if ($zip->open(__DIR__ . "/../../../download/update.zip") === TRUE) {
            $this->displayProgress();
            $zip->extractTo(__DIR__ . "/../../../");
            $this->displayProgress();
            $zip->close();
            $this->displayProgress();
            $this->cleanup();

            $output = array();
            exec("sudo apt update", $output);
            var_dump($output);
            $this->displayProgress();
            foreach ($packagesList as $package) {
                system("sudo dpkg -i /var/cache/apt/archives/" . $package);
                ob_flush();
                flush();
                $this->displayProgress();
                sleep(15);
            }

            sleep(4);
            $this->displayProgress();
        } else {
            echo "Une erreur est survenue";
        }
        ob_flush();
        flush();
        echo "<script>window.location.href = 'http://127.0.0.1';</script>";
    }

    function cleanup() {
        unlink(__DIR__ . "/../../../download/update.zip");
        $this->displayProgress();
    }

    /**
     * @param String $md5
     */
    function checkIntegrality($file, $md5) {
        $hash = hash_file('md5', $file);
        if ($md5 != $hash) {
            $this->tasksCompleted = 0;
        }
    }

    function all() {
        $this->tasks = 8;
        $this->download();
        $this->upgrade();
    }

    function displayProgress() {
        $this->tasksCompleted++;
        echo "<script>document.getElementById('prog').style.width = '" . ($this->tasksCompleted / $this->tasks)*100 . "%'</script>";
        ob_flush();
        flush();
    }

}