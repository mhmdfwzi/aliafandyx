<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait UploadImageTrait
{
    public function ProcessImage(Request $request, $file_name, $folder_name, $currentImage = null)
    {
        // Check if a new image file has been uploaded
        if ($request->hasFile($file_name)) {
            $request->validate([
                    $file_name => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            ]);

            $image = $request->file($file_name);
            $newImageName =  time() . '.' . $image->getClientOriginalExtension();

            $thumbnailPath = public_path('../storage/app/uploads/thumbnail/'.$folder_name);
            $uploadPath = public_path('../storage/app/uploads/'.$folder_name);

            // Ensure the thumbnail and upload directories exist
            if (!file_exists($thumbnailPath)) {
                mkdir($thumbnailPath, 0755, true);
            }

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $imgFile = Image::make($image->getRealPath());
            
            $imgFile->resize(500, 500, 
            
            function ($constraint) {
                $constraint->aspectRatio();
            })->save($uploadPath . '/' . $newImageName);



            $imgFile = Image::make($image->getRealPath());
            
            $imgFile->resize(250, 250, 
            
            function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnailPath . '/' . $newImageName);



            
            
           // $image->move($uploadPath, $newImageName);



            // If updating, delete the old image
            if ($currentImage) {
                $this->deleteImage($currentImage, $folder_name);
            }
			$newImageName = $folder_name.'/'.$newImageName;
            return $newImageName;
        }

        // If no new image is uploaded, return the current image
        return $currentImage;
    }

    public function deleteImage($imagePath, $folder_name)
    {
        // Delete the image file from the storage directory
        $thumbnailPath = public_path('../storage/app/uploads/thumbnail/') . '/' . $folder_name . '/' . $imagePath;
        $uploadPath = public_path('../storage/app/uploads/') . '/' . $folder_name  . '/' . $imagePath;

        if (file_exists($thumbnailPath)) {
            unlink($thumbnailPath);
        }

        if (file_exists($uploadPath)) {
            unlink($uploadPath);
        }
    }
}