<?php
namespace Icecave\Flax;
use Icecave\Chrono\DateTime;
use Icecave\Collections\Vector;
use Icecave\Flax\Serialization\Decoder;
use stdClass;

class DubboParser
{

    public function getData($data)
    {
        $decoder = new Decoder;
        $decoder->feed($this->removeHeaderForDubbo($data));
        return $decoder->finalize();
    }

    private function removeHeaderForDubbo($data)
    {
        return substr($data, 17);
    }

}