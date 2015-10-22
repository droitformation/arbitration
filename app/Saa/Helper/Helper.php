<?php namespace App\Saa\Helper;

use Carbon\Carbon;

class Helper {

	/*
	 * Dates functions
	*/

	// localized date format
    public static function formatDate($date) {
    
        $instance   = Carbon::createFromFormat('Y-m-d', $date); 
		setlocale(LC_TIME, 'fr_FR'); 							                   
		$formatDate = $instance->formatLocalized('%d %B %Y');
	
        return $formatDate;
    }
    
    //created_at field in DB
	public function getCreatedAtAttribute($value) { 
        //return $carbonDate = Carbon::createFromFormat('Y-m-d H:i:s', $value);	
        return $carbonDate = date("d/m/Y", strtotime($value)); 
        //return $value;
    }

    function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    
    /*
	 * Files functions
	*/
    
	public function fileExistFormatLink( $path , $user , $event , $view , $name , $class = NULL){
		
		$link = $path.$user.'/'.$view.'_'.$event.'-'.$user.'.pdf';
		$url  = getcwd().'/'.$link;

		$add  = '';
		
		if ( \File::exists($url) )
		{
			$asset = asset($link);

			if($class){
				$add = ' class="'.$class.'" ';
			}
			
			return '<a target="_blank" href="'.$asset.'"'.$add.'>'.$name.'</a>';	
		}
		
		return '';
	}
	
	/* Get mime-type of file */
	public function getMimeType($filename)
	{
	    $mimetype = false;
	    
	    if(function_exists('finfo_fopen')) 
	    {
	       $mimetype = finfo_fopen($filename);
	    } 
	    elseif(function_exists('getimagesize')) 
	    {
	       $mimetype = getimagesize($filename);
	    } 
	    elseif(function_exists('exif_imagetype')) 
	    {
	       $mimetype = exif_imagetype($filename);
	    } 
	    elseif(function_exists('mime_content_type')) 
	    {
	       $mimetype = mime_content_type($filename);
	    }
	    
	    return $mimetype['mime'];
	}

    
	public function fileExistFormatImage( $path , $width ){
		
		$url  = getcwd().$path;		
		$add  = '';
		
		$ext = array('jpg','JPG','jpeg','JPEG','png','PNG','gif','GIF');
		
		if ( \File::exists($url) ){
			
			$extension = \File::extension($url);
			
			if ( in_array( $extension , $ext )  )
			{
				$asset = asset($path);
				
				return '<img src="'.$asset.'" alt="" width="'.$width.'px" />';	
			}	
		}
	}
	
	/*
	 * Misc functions
	*/

    public function listOnlyFolders($dir){

        $keys = array();

        foreach(glob($dir.'/*',GLOB_ONLYDIR) as $image)
        {
            $keys[] = $image;
            if (is_dir($image))
            {
                $keys = array_merge($keys, $this->listOnlyFolders($image) );
            }
        }
        return $keys;
    }


    public function ListFolder($path, $directory_class = NULL, $link = FALSE)
    {
        //using the opendir function
        $dir_handle = @opendir($path) or die("Unable to open $path");

        //Leave only the lastest folder name
        $dirname = end(explode("/", $path));

        while (false !== ($file = readdir($dir_handle)))
        {
            if($file!="." && $file!=".." && $file!=".DS_Store")
            {
                if (is_dir($path."/".$file))
                {
                    //Display a list of sub folders.
                    $this->ListFolder($path."/".$file , $directory_class);
                }

            }
        }

        //closing the directory
        closedir($dir_handle);
    }

    public function ListFolderFiles($dir)
    {

        foreach(glob($dir.'/*',GLOB_ONLYDIR) as $id => $image)
        {
            $all = glob($image.'/*.{jpg,gif,png,csv,pdf,txt,docx,doc,xls,xlsx,ppt,pptx}', GLOB_BRACE);
            $dirid = str_replace('/','',$image);
            $dirid = str_replace(' ','',$dirid);

            echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">
                        <a href="#'.$dirid.'" data-toggle="collapse"><span class="glyphicon glyphicon-folder-close"></span>&nbsp;<strong>'.$image.'</strong></a><span class="badge pull-right">'.count($all).'</span>';
                echo '</div>';
                echo '<div class="panel-body collapse" id="'.$dirid.'">';
                    echo '<div class="list-group">';
                    if(!empty($all))
                    {
                        foreach($all as $file)
                        {
                            if( !empty($file) && $file != '')
                            {
                                echo '<div class="list-group-item">';
                                    $ext = explode('/', $file);
                                    $ext = end($ext);
                                    echo '<span class="glyphicon glyphicon-paperclip"></span>&nbsp;'.$ext;
                                    echo '<a target="_blank" href="'.url($file).'" class="btn btn-info btn-xs pull-right" href="#">download</a>';
                                echo '</div>';
                            }
                        }
                    }
                    echo '</div>';

                $this->ListFolderFiles($image);

                echo '</div>';
            echo '</div>';
        }
    }

    public function directory_map($source_dir, $directory_depth = 0, $hidden = FALSE)
    {
        if ($fp = @opendir($source_dir))
        {
            $filedata	= array();
            $new_depth	= $directory_depth - 1;
            $source_dir	= rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

            while (FALSE !== ($file = readdir($fp)))
            {
                // Remove '.', '..', and hidden files [optional]
                if ( ! trim($file, '.') OR ($hidden == FALSE && $file[0] == '.'))
                {
                    continue;
                }

                if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir.$file))
                {
                    $filedata[$file] = $this->directory_map($source_dir.$file.DIRECTORY_SEPARATOR, $new_depth, $hidden);
                }
                else
                {
                    $filedata[] = $file;
                }
            }

            closedir($fp);

            return $filedata;
        }

        return FALSE;
    }

}