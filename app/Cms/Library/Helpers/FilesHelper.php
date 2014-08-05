<?php namespace Cms\Library\Helpers;

use Symfony\Component\HttpFoundation\File\File;

class FilesHelper {

	public function extensionToIcon($extension) {
		if ($extension == 'pdf') {
			return 'fa-file-pdf-o';
		}
		if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
			return 'fa-file-image-o';
		}
		if ($extension == 'zip') {
			return 'fa-file-zip-o';
		}
		if ($extension == 'css' || $extension == 'js' || $extension == 'php' || $extension == 'html') {
			return 'fa-file-code-o';
		}

		return 'fa-file';
	}

	public function unzipFile($file, $to) {
		$zip = new \ZipArchive;
		$res = $zip->open($file);
		if ($res === TRUE) {
			$zip->extractTo($to);
			$zip->close();
			$this->deleteFile($file);
		} else {
			throw new \Exception('Error unzipping file', 1);
		}
	}

	public function storeFileInPath($path, File $file) {
		$filename = $file->getClientOriginalName();

		for ($i = 2; file_exists($path . $filename); $i++) {
			$filename = $i . '_' . $filename;
		}

		$file->move($path, $filename);

        return $filename;
	}

	public function filesInFolder($path) {
		if (is_dir($path)) {
			$_files = array_diff(scandir($path), array('..', '.', '.DS_Store', '__MACOSX', '.gitignore'));
			$files = [];

			foreach ($_files as $index => $file_name) {
				$file = [];
				$file['name'] = $file_name;
				$name_parts = explode('.', $file_name);
				$file['extension'] = end($name_parts);
				$files[] = $file;
			}

			return $files;
		} else {
			throw new \Exception('Path "' . $path . '" is not a directory', 1);
		}
	}

	public function deleteDirectory($dir) {
		$files = array_diff(scandir($dir), array('.','..')); 
		foreach ($files as $file) { 
			(is_dir("$dir/$file")) ? $this->deleteDirectory("$dir/$file") : unlink("$dir/$file"); 
		} 
		return rmdir($dir); 
	}

	public function deleteFile($file) {
		unlink($file); // delete file
	}

	public function deleteFilesInFolder($path) {
		if (is_dir($path)) {
			$files = glob($path . '*'); // get all file names
			foreach($files as $file) { // iterate files
			  	if(is_file($file)) {
			    	unlink($file); // delete file
			    }
			}
		} else {
			throw new \Exception('Path "' . $path . '" is not a directory', 1);
		}
	}

	public function readFile($path) {
		if (file_exists($path)) {
			if (!$handle = fopen($path, 'r')) {
		        throw new \Exception('Cannot open file', 1);
		    }
		    $content = fread($handle, filesize($path));
		    
		    fclose($handle);

		    return $content;
		} else {
			throw new \Exception('File "' . $path . '" does not exists', 1);
		}
	}

	public function overwriteFile($path, $content) {
		// Let's make sure the file exists and is writable first.
		if ((is_writable($path) && file_exists($path)) || !file_exists($path)) {

		    // In our example we're opening $filename in append mode.
		    // The file pointer is at the bottom of the file hence
		    // that's where $somecontent will go when we fwrite() it.
		    if (!$handle = fopen($path, 'w')) {
		        throw new \Exception('Cannot open file', 1);
		    }

		    // Write $somecontent to our opened file.
		    if (fwrite($handle, $content) === FALSE) {
		        throw new \Exception('Cannot write to file', 1);
		    }

		    fclose($handle);

		} else {
		    throw new \Exception('File "' . $path . '" is not writable', 1);
		}
	}

}