<?php
namespace Gmedia\CoreSite\Aspect;
use Imagine\Image\ImagineInterface;
use TYPO3\Flow\Annotations as FLOW;
/**
 * @Flow\Aspect
 */
class ImagickResizeSamplingFactors {
    /**
     * @var ImagineInterface
     * @Flow\Inject(lazy = false)
     */
    protected $imagineService;
    /**
     *
     *
     * @Flow\AfterReturning("setting(TYPO3.Imagine.driver='Imagick') && setting(Gmedia.CoreSite.JpegOptimization.enabled) && method(TYPO3\Media\Domain\Model\Thumbnail->refresh())")
     */
    public function setImageSamplingFactors(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint)
    {
        /** @var \TYPO3\Media\Domain\Model\Thumbnail $thumbnail */
        $thumbnail = $joinPoint->getProxy();
        $thumbnailResource = $thumbnail->getResource();
        if (!$thumbnailResource) {
            return;
        }
        $streamMetaData = stream_get_meta_data($thumbnailResource->getStream());
        $pathAndFilename = $streamMetaData['uri'];
        $imageType = $thumbnailResource->getMediaType();
        switch ($imageType) {
            case 'image/jpeg':
                $imagineImage = $this->imagineService->open($pathAndFilename);
                $imagineImage->getImagick()->setSamplingFactors(['2x2','1x1','1x1']);
                $imagineImage->save();
            break;
        }
    }
}