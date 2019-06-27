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
        $obj = $decoder->finalize();
        return $this->recursive($obj);
    }

    private function removeHeaderForDubbo($data)
    {
        return substr($data, 17);
    }

    private function recursive($data)
    {
        if ($data instanceof Vector)
        {
            return $this->recursive($data->elements());
        }

        if ($data instanceof DateTime)
        {
            return date('Y-m-d H:i:s', $data->unixTime());
        }

        if ($data instanceof stdClass)
        {
            foreach ($data as $key => $value)
            {
                $data->$key = $this->recursive($value);
            }
        }

        if (is_array($data))
        {
            foreach ($data as $key => $value)
            {
                $data[$key] = $this->recursive($value);
            }
        }

        return $data;
    }

}