<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadImageTrait
{
    
    // public function ProcessImage(Request $request, $file_name, $folder_name, $currentImage = null)
        // {
        //     // Check if a new image file has been uploaded
        //     if ($request->hasFile($file_name)) {
        //         $request->validate([
        //                 $file_name => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        //         ]);

        //         $image = $request->file($file_name);
        //         $newImageName = time() . '.' . $image->getClientOriginalExtension();

        //         $thumbnailPath = public_path('thumbnail/'.$folder_name);
        //         $uploadPath = public_path('uploads/'.$folder_name);

        //         // Ensure the thumbnail and upload directories exist
        //         if (!file_exists($thumbnailPath)) {
        //             mkdir($thumbnailPath, 0755, true);
        //         }

        //         if (!file_exists($uploadPath)) {
        //             mkdir($uploadPath, 0755, true);
        //         }

        //         $imgFile = Image::make($image->getRealPath());
        //         $imgFile->resize(300, 300, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($thumbnailPath . '/' . $newImageName);

        //         $image->move($uploadPath, $newImageName);

        //         // If updating, delete the old image
        //         if ($currentImage) {
        //             $this->deleteImage($currentImage, $folder_name);
        //         }

        //         return $newImageName;
        //     }

        //     // If no new image is uploaded, return the current image
        //     return $currentImage;
    // }

    // public function deleteImage($imagePath, $folder_name)
        // {
        //     // Delete the image file from the storage directory
        //     $thumbnailPath = public_path('/thumbnail') . '/' . $folder_name . '/' . $imagePath;
        //     $uploadPath = public_path('/uploads') . '/' . $folder_name  . '/' . $imagePath;

        //     if (file_exists($thumbnailPath)) {
        //         unlink($thumbnailPath);
        //     }

        //     if (file_exists($uploadPath)) {
        //         unlink($uploadPath);
        //     }
    // }

    ////////////////////////////////////////////////////////////////////////////////////

    public function ProcessImage(
        Request $request, $file_name, $folder_name,$width=null,$height=null ,$currentImage = null)
        {
            if ($request->hasFile($file_name)) {
                $request->validate([
                    $file_name => 'required|image|mimes:jpg,jpeg,png,gif,svg',
                ]);

                $image = $request->file($file_name);
                $newImageName = time() . '.' . $image->getClientOriginalExtension();

                $thumbnailPath = 'thumbnail/' . $folder_name;
                $uploadPath = 'uploads/' . $folder_name;

                // Store the image in the storage directory
                $imgFile = Image::make($image->getRealPath());
                if($width != null & $height != null){
                    $imgFile->resize($width, $height, function ($constraint) {
                        // $constraint->aspectRatio();
                    });
                }else {
                    $imgFile->resize(300, 300, function ($constraint) {
                        // $constraint->aspectRatio();
                    });
                }
               

                // Store the thumbnail image in storage
                Storage::put('uploads/'.$thumbnailPath . '/' . $newImageName, $imgFile->encode());

                // Store the original image in storage
                Storage::put('uploads/'.$uploadPath . '/' . $newImageName, file_get_contents($image));

                // If updating, delete the old image
                if ($currentImage) {
                    $this->deleteImage($currentImage, $folder_name);
                }

                return $newImageName;
            }

            return $currentImage;
    }

    public function deleteImage($imagePath, $folder_name)
        {
            // Delete the image file from the storage directory
            $thumbnailPath = 'uploads/thumbnail/' . $folder_name . '/' . $imagePath;
            $uploadPath = 'uploads/uploads/' . $folder_name . '/' . $imagePath;

            // Delete the thumbnail image
            if (Storage::exists($thumbnailPath)) {
                Storage::delete($thumbnailPath);
            }

            // Delete the original image
            if (Storage::exists($uploadPath)) {
                Storage::delete($uploadPath);
            }
    }



    ////////////////////////////////////////////////////////////////////////////////////
    

    // public function ProcessImage(Request $request, $file_name, $folder_name, $currentImage = null)
    // {
    // // Check if a new image file has been uploaded
    // if ($request->hasFile($file_name)) {
    //     $request->validate([
    //         $file_name => 'required|image|mimes:jpg,jpeg,png,gif,svg',
    //     ]);

    //     $image = $request->file($file_name);

    //     // Store the image on the 'upload' disk using the store method
    //     $thumbnailPath = $image->store('thumbnail/' . $folder_name, 'uploads');
    //     //  $thumbnailPath = storage/app/uploads/thumbnail/
    //     $uploadPath = $image->store('uploads/' . $folder_name, 'uploads');
    //     // $uploadPath = storage/app/uploads/uploads/

    //     // If updating, delete the old images
    //     if ($currentImage) {
    //         $this->deleteImage($currentImage, $folder_name);
    //     }

    //     return $thumbnailPath;
    //     // return basename('thumbnail/'.$folder_name.$thumbnailPath); // Return the stored filename
    // }

    // // If no new image is uploaded, return the current image
    // return $currentImage;
    // }


    // public function deleteImage($currentImage, $folder_name)
    // {
    //     if ($currentImage) {
    //         // Split the current image path into parts
    //         $pathParts = pathinfo($currentImage);

    //         // Delete the image files from the 'upload' disk
    //         $thumbnailPath = 'thumbnail/' . $folder_name . '/' . $pathParts['basename'];
    //         $uploadPath = 'uploads/' . $folder_name . '/' . $pathParts['basename'];

    //         Storage::disk('uploads')->delete($thumbnailPath);
    //         Storage::disk('uploads')->delete($uploadPath);
    //     }
    // }


    
}