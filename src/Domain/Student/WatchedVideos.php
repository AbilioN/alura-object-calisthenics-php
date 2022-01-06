<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Video\Video;
use DateTimeInterface;
use Ds\Map; 

class WatchedVideos implements \Countable
{
    private Map $videos;

    public function __construct(Map $videos)
    {
        $this->videos = $videos;
    }

    public function add(Video $video, \DateTimeInterface $date) : void
    {
        $this->videos->put($video, $date);
    }

    public function count(): int
    {
        return $this->videos->count();
    }

    public function dateOfFirstVideo(): DateTimeInterface
    {
        
        $this->watchedVideos->sort(fn (DateTimeInterface $dateA, DateTimeInterface $dateB) => $dateA <=> $dateB);
        /** @var DateTimeInterface $firstDate */
        $firstDate = $this->watchedVideos->first()->value;

        return $firstDate;
    }
}