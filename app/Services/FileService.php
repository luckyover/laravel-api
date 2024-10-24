<?php
namespace App\Services;

use Illuminate\Support\Facades\File; // Make sure to include this

class FileService
{
    /**
     * @param $file
     * @param $folder
     * @return array
     */
    public static function uploadFile($file, $folder)
    {

        // Get the current date in YYYYMMDD format
        $dateFolder = date('Ymd'); // e.g., 20241024

        // Get the original file name and extension
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        // Generate a new filename with the current timestamp
        $timestamp = time(); // Adds the current time as a unique identifier
        $newFileName = $originalName . '_' . $timestamp . '.' . $extension;

        // Create the folder path inside the public/images directory
        $folderPath = public_path($folder . '/' . $dateFolder);

        // Check if the directory exists, and if not, create it
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true); // Creates the directory with the correct permissions
        }
        return [
            'file_name' => $newFileName, // Use a comma instead of a semicolon
            'folderPath' => $folderPath,
        ];
    }
}
