<?php

namespace App\Util\Image;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as InterventionImage;

class Image 
{
    protected $data;
    protected $image;
    protected $imageFolder = "storage/images";
    protected $name;
    
    public function __construct($folder, $data = null, $intervention = true)
    {
        $this->imageFolder = public_path($this->imageFolder . '/' . $folder);

        if (!is_null($data)) {
            $this->data = $data;

            $this->build($intervention);
        }
    }

    public function name()
    {
        return $this->name;
    }

    public function crop(array $size)
    {
        $this->image->crop(
            (int) $this->data->width,
            (int) $this->data->height,
            (int) $this->data->x,
            (int) $this->data->y
        );

        $this->image->backup();
        $this->image->resize($size[0], $size[1]);

        $this->save();

        $this->image->reset();

        return $this;
    }

    public function storeOriginal($folder = '')
    {
        $this->data->image->move($this->directory($folder), $this->name());
    }

    // public function createThumbnail()
    // {
    //     $this->image->resize(null, 200, function ($constrait) {
    //         $constrait->aspectRatio();
    //     });

    //     $this->save('thumbnail/');

    //     $this->image->reset();

    //     return $this;
    // }

    public function medium(array $size)
    {
        $this->image->fit($size[0], $size[1]);

        $this->save('medium/');

        $this->image->reset();

        return $this;
    }

    public function small(array $size)
    {
        $this->image->fit($size[0], $size[1]);

        $this->save('small/');

        $this->image->reset();

        return $this;
    }

    public function delete($image)
    {
        File::delete($this->imageFolder . '/' . $image);
        File::delete($this->imageFolder . '/' . 'small/' . $image);
        File::delete($this->imageFolder . '/' . 'medium/' . $image);
    }

    protected function save($folder = '', $prefix = '')
    {
        $this->image->save($this->directory($folder) . $prefix . $this->name);
    }

    protected function directory($folder)
    {
        $dir = $this->imageFolder . '/' . $folder;

        if(! File::exists(public_path('storage/images'))) {
            File::makeDirectory(public_path('storage/images'));
        }

        if (! File::exists($this->imageFolder)) {
            File::makeDirectory($this->imageFolder);
        }

        if (! File::exists($dir)) {
            File::makeDirectory($dir);
        }

        return $dir;
    }

    protected function build($intervention)
    {
        if ($intervention == true) {
            $image = $this->data->image->getRealPath();
    
            $this->image = InterventionImage::make($image);

            $this->image->backup();
        }

        $this->generateImageName();
    }

    protected function generateImageName()
    {
        $this->name = Str::random(40) . '.' . $this->data->image->getClientOriginalExtension();
    }
}