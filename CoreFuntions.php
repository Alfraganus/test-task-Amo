<?php

class CoreFunctions {

    CONST DIRECTORY_FROM = 'directory1';
    CONST DIRECTORY_TO = 'directory2';
    CONST FILE_TO_DOWNLOAD_FROM = 'file_to_download';
    CONST FILE_TO_DOWNLOAD_TO = 'files';


    public function __construct()
    {
        if(!is_dir(self::DIRECTORY_FROM)) {
            mkdir(self::DIRECTORY_FROM);
        }
        if(!is_dir(self::DIRECTORY_TO)) {
            mkdir(self::DIRECTORY_TO);
        }
        if(!is_dir(self::FILE_TO_DOWNLOAD_FROM)) {
            mkdir(self::FILE_TO_DOWNLOAD_FROM);
        }
    }


    public function moveFiles() : void
    {
        $files = array_diff(scandir(self::DIRECTORY_FROM), array('.', '..'));
        foreach($files as $file){
            rename(
                self::DIRECTORY_FROM."/$file",
                self::DIRECTORY_TO."/$file"
            );
        }
    }

    public function saveAndDownloadFile($file)
    {
            $url = self::FILE_TO_DOWNLOAD_FROM . DIRECTORY_SEPARATOR . $file;
            $file_name = basename($url);
            try {
                if(file_exists($url)) {
                    file_put_contents( self::FILE_TO_DOWNLOAD_TO.'/'.$file_name,file_get_contents($url));
                    $this->downloadFile(self::FILE_TO_DOWNLOAD_FROM.'/'.$file_name);
                    $this->notification(
                        'Operation has been successful',
                        'The file has been saved to the root folder',
                        '#28a745',
                    );

                    $this->preventFormResubmission();

                    return [
                        'success'=>true,
                        'url'=>$url
                    ];
                } else {
                    $this->notification(
                        'Operation has been failed!',
                        'The request file has not been found!',
                        '#dc3545',
                    );
                    $this->preventFormResubmission();
                    return [
                        'success'=>false,
                    ];
                }

            } catch (Exception $e) {
                $this->notification(
                    'Operation has been failed',
                    $e->getMessage(),
                    '#dc3545',
                );
                $this->preventFormResubmission();
            }
    }

    public function getFileContent($url)
    {
        $contents = explode("\n", file_get_contents($url));

        $stringLength = strlen(file_get_contents($url));
        $result='';
        $result .= "<h2>The amount of characters is $stringLength </h2>";
        foreach ($contents as $content) {
            $result .=$content;
            $result .= '<br>';
        }
        return $result;
    }


    public function downloadFile($url)
    {
        $script = "<script>
             var anchor=document.createElement('a');
                anchor.setAttribute('href',`$url`);
                anchor.setAttribute('download','');
                document.body.appendChild(anchor);
                anchor.click();
                anchor.parentNode.removeChild(anchor);
                console.log(`$url`)
        </script>";

        echo $script;
    }



    private function notification($title,$message,$color)
    {
        $script = "<script>
        Swal.fire({
            title: `$title`,
            text: `$message`,
            position: 'bottom',
            background: `$color`,
            color:'white',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            showConfirmButton: false,
            showCancelButton: false,
            timer: 2000
                 });
          </script>";

        echo $script;
    }

    private function preventFormResubmission()
    {
        $script = "
            <script>
                if (window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>";

        echo $script;
    }
}


?>