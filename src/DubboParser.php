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
        $body = $this->removeHeaderForDubbo($data);
        if($body === ''){
            return null;
        }
        $decoder->feed($body);
        return $decoder->finalize();
    }

    private function removeHeaderForDubbo($data)
    {
        return substr($data, 17);
    }

}