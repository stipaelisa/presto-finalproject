<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $width;
    private $height;
    private $path;
    private $fileName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($_filePath, $_width, $_height)
    {
        $this->width = $_width;
        $this->height = $_height;
        $this->path = dirname($_filePath);
        $this->fileName = basename($_filePath);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $width = $this->width;
        $height = $this->height;

        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$width}x{$height}_" . $this->fileName;

        $croppedImage = Image::load($srcPath)->crop(Manipulations::CROP_CENTER, $width, $height)->watermark(base_path('/resources/img/watermark1.png'))
        ->watermarkOpacity(50)->watermarkHeight(10, Manipulations::UNIT_PERCENT)
        ->watermarkWidth(30, Manipulations::UNIT_PERCENT)->save($destPath) ;
    }
}
