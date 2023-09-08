<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KategoriResource extends JsonResource
{
    //define properti
    public $id;
    public $nama;

    /**
     * __construct
     *
     * @param  mixed $id
     * @param  mixed $nama
     * @param  mixed $resource
     * @return void
     */
    public function __construct($id, $nama, $resource)
    {
        parent::__construct($resource);
        $this->id  = $id;
        $this->nama = $nama;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'nama'   => $this->nama,
            'data'      => $this->resource
        ];
    }
}
