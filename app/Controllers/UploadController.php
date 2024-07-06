<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UploadController extends Controller
{
    public function serveFile($filename)
    {
        $path = WRITEPATH . 'uploads/' . $filename;

        if (!is_file($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($filename);
        }

        $mime = mime_content_type($path);
        header('Content-Type: ' . $mime);
        header('Content-Length: ' . filesize($path));

        readfile($path);
        exit;
    }
}
