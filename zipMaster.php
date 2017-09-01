<?php

class zipMaster
{
    /**
     * @var ZipArchive
     */
    private $zip;
    /**
     * @var string
     */
    private $folder;
    private $excludes = [];

    /**
     * zipMaster constructor.
     * @param string $output
     * @param string $folder
     * @param array $excludes
     * @throws Exception
     */
    public function __construct(string $output, string $folder, array $excludes = [])
    {
        if (empty($output) || empty($folder)) {
            throw new Exception('Output and folder can not be empty string!');
        }
        $this->folder = $folder;
        $this->excludes = $excludes;
        $this->zip = new ZipArchive;
        try {
            $this->zip->open($output, ZipArchive::CREATE);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Opens the folder and reads all files and directories under the folder.
     * If there is directory, it calls itself again.
     *
     * @param string $folder
     * @param string $dir
     */
    private function archiveFolder(string $folder, string $dir = 'archive')
    {
        if ($handle = opendir($folder)) {
            // Read all files and directories
            while (false !== ($entry = readdir($handle))) {
                // If file or directory isn't in excludes
                if ($entry != "." && $entry != ".." && !in_array($entry, $this->excludes)) {
                    if (is_dir($entry)) {
                        // If it's directory, call archiveFolder funcion again
                        $this->archiveFolder($entry, $dir . '/' . $entry);
                    } else {
                        // Add all files inside the directory
                        $this->zip->addFile($entry, $dir . '/' . $entry);
                    }
                }
            }
            closedir($handle);
        }
    }

    /**
     * Archive the folder
     */
    public function archive()
    {
        $this->archiveFolder($this->folder);
        $this->zip->close();
    }
}